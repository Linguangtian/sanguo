<?php
/*
'''''''''''''''''''''''''''''''''''''''''''''''''''''''''
源码来自108源码网分享 rc108.com
''''''''''''''''''''''''''''''''''''''''''''''''''''''''''
 */
namespace app\index\controller;

use app\common\controller\IndexBase;
use think\Cache;
use think\Controller;
use think\Db;
use My\DataReturn;

class Index extends IndexBase
{
    //首页
    public function index()
    {
        $map=[];
        $piglist = Db::name('task_config')->where('is_integral_goods != \'on\'')->select();

        $nowtime = date('H:i');
        $nowday = date('Y-m-d ');
        $time = time();

        foreach ($piglist as $key=>$val) {
            //dump($val);
            //dump($nowtime<$val['start_time'] || $nowtime>$val['end_time']);
            if ($nowtime<$val['start_time'] || $nowtime>$val['end_time']) {
                //echo 'yuyue';
                if (!$this->isYuyue($val['id'])) {
                    $piglist[$key]['game_status'] =1; //预约
                } else {
                    $piglist[$key]['game_status'] =2; //已预约
                }

            }elseif ($nowtime>=$val['start_time']) {
              //  echo 'open';
                if ($val['is_open'] == 0 && $this->isYuyue($val['id'])) {
                    $piglist[$key]['game_status'] = 4;//开奖中
                }else if($nowtime<$val['end_time']){
                    $piglist[$key]['game_status'] = 4;//抢购
                }else{
                    $piglist[$key]['game_status'] = 4;//开奖中
                }
            } else {
            //echo '00';
                $piglist[$key]['game_status']=0;
            }
          $res =  Db::name('user_pigs')->where('pig_id', $val['id'])->select();
            if(count($res)>0){
                $piglist[$key]['game_status'] = 5;//已拥有
            }


        }
        $config=unserialize(Db::name('system')->where('name','site_config')->value('value'));
        //dump($piglist);die;
        return view()->assign(['piglist'=>$piglist,'nowday'=>$nowday,'nowtime'=>$time,'config'=>$config]);
    }
    public function isYuyue($pig_id)
    {
        $map = [];
        $map['uid'] = $this->user_id;
        $map['pig_id'] = $pig_id;
        $map['status'] = 0;
        $insertData['buy_type'] = ['<>', 1];
        $res = Db::name('yuyue')->where($map)->find();
        return $res ? 1 : 0;
    }
    public function checkGame(){
        $game = model('Game');
        $time = $game->excute_time();
        $now_game_time = strtotime($game->gaming_model['start_time']);
        $now_end_time = strtotime($game->gaming_model['end_time']);
        //dump($game);
        //前端显示开奖剩余时间
        $plus_time = $game->excute_time() - $game->openaward;
        //id 游戏ID  time 游戏时间  openaward 开奖冷却时间
        DataReturn::returnJson(200,'',['id'=>$game->game_id,'end_time'=> $now_end_time,'openaward'=>$game->openaward,'cool_time'=>$game->getCoolTime() + 1,'start_time'=>$now_game_time,'stage'=>$game->gameTimeArea($now_game_time)]);

    }
    public function yuyue()
    {
        $data = $this->request->param();
        //dump($data);
        $pig_id = $data['id'];
        $pigInfo =  Db::name('task_config')->where('id',$pig_id)->find();
        $nowTime = date('H:i');
        if ($nowTime>$pigInfo['start_time'] && $nowTime<$pigInfo['end_time'])
        {
            $this->error('不是预约时间');
        }
        //是否实名通过
        $authMap = [];
        $authMap['uid'] = $this->user_id;
        $authMap['status'] = 1;
        if (!Db::name('identity_auth')->where($authMap)->find()) $this->error('请先实名');

        $hasYuyue = $this->isYuyue($pig_id);
        if ($hasYuyue) $this->error('已预约');
        //粮草

        if ($this->user['pay_points']<$pigInfo['pay_points']){
            $this->error('粮草不足,请充值');
        }
        $insertData = [];

        $insertData['uid'] = $this->user_id;
        $insertData['pig_id'] = $pig_id;
        $insertData['create_time'] = time();
        $insertData['user_sort'] = $this->user['trade_order'];
        $insertData['credit_score'] = $this->user['credit_score'];
        $insertData['buy_type'] = 0;

        $insertData['pay_points'] = $pigInfo['pay_points'];
        $re = Db::name('yuyue')->insert($insertData);
        if ($re) {
            //减少粮草
            moneyLog($this->user_id,0,'pay_points',-$pigInfo['pay_points'],3,'预约武将');
            $this->success('预约成功');

        }else {
            $this->error('预约失败');
        }

    }
    public function yuyueStatus()
    {
        $id = $this->request->param('id');
        $map = [];
        $map['uid'] = $this->user_id;
        $map['pig_id'] = $id;
        $map['status'] = 0;
        $res = Db::name('yuyue')->where($map)->find();

        $code = $res ? 1 : 0;
        return json(['code'=>$code]);

    }
    public function checkOpen()
    {
       $id = $this->request->param('id');
//         dump(Cache::get('is_open'.$id));
        //dump($id);
        $is_open = Cache::get('is_open'.$id);
        //dump(Cache::clear());die;
        if (!$is_open) {
            return json(['code'=>0,'msg'=>'未开奖']);
        } else {
            $luckyUsers = Cache::get('buy_'.date('Ymd').$id);
            //dump($luckyUsers);die;

            $uid = $this->user_id;
            if (!empty($luckyUsers)) {
                if (in_array($uid,$luckyUsers)) {
                    return json(['code'=>1,'msg'=>'恭喜']);
                } else {
                    return json(['code'=>2,'msg'=>'很遗憾']);
                }
            }else{
                return json(['code'=>2,'msg'=>'很遗憾']);
            }

        }

    }


    public function flash_buy()
    {
        $data = $this->request->param();
        //dump($data);
        $pig_id = $data['id'];
        $pigInfo =  Db::name('task_config')->where('id',$pig_id)->find();
        $nowTime = date('H:i');
        if ($nowTime<$pigInfo['start_time'] || $nowTime>$pigInfo['end_time'])
        {
            $this->error('不是开抢时间');
        }
        //是否实名通过
        $authMap = [];
        $authMap['uid'] = $this->user_id;
        $authMap['status'] = 1;
        if (!Db::name('identity_auth')->where($authMap)->find()) $this->error('请先实名');

        //粮草
        if ($this->user['pay_points']<$pigInfo['qiang_points']){
            $this->error('粮草不足,请充值');
        }

        $map = [];
        $map['uid'] = $this->user_id;
        $map['pig_id'] = $pig_id;
        $map['status'] = 0;
        $insertData['buy_type'] = 1;
        $res = Db::name('yuyue')->where($map)->find();

        if(!$res){
            $insertData = [];

            $insertData['uid'] = $this->user_id;
            $insertData['pig_id'] = $pig_id;
            $insertData['create_time'] = time();
            $insertData['user_sort'] = $this->user['trade_order'];
            $insertData['credit_score'] = $this->user['credit_score'];
            $insertData['buy_type'] = 1;
            $insertData['pay_points'] = $pigInfo['qiang_points'];
            $re = Db::name('yuyue')->insert($insertData);
            if ($re) {
                //减少粮草
                moneyLog($this->user_id,0,'pay_points',-$pigInfo['qiang_points'],3,'抢购武将');
                $this->success('进入抢购成功');

            }else {
                $this->error('抢购失败');
            }
        }else if($this->isYuyue($pig_id)){
            $baseConfig = unserialize(Db::name('system')->where('name','base_config')->value('value'));
            $uid = $this->user_id;
            $zMap = [];
            $zMap['uid'] = $uid;
            $zMap['status'] = 1;
            $user_pigs = Db::name('user_pigs')->where($zMap)->sum('price');  //总资产
            $user_pigs = round($user_pigs,2);
            $user_pigs = $this->user->user_total_money ? round($this->user->user_total_money,2) + $user_pigs : $user_pigs;

            if( $baseConfig['limit_total_sell_num']>0 && $this->user->share_integral <$baseConfig['limit_total_sell_num']  ){
                $this->error('抢购失败,推广收益未达到'.$baseConfig['limit_total_sell_num']);
            }
            if( $baseConfig['limit_total_money']>0 && $user_pigs <$baseConfig['limit_total_money']  ){
                        $this->error('抢购失败,总资产未到达标准'.$baseConfig['limit_total_money']);
            }

            if( $this->user->doge<=0 &&  $this->user->doge<$pigInfo['max_price'] ){
                $this->error('EOS币不足');
            }
            if($pigInfo['selled_stock']>=$pigInfo['max_stock']){
                $this->error('库存不足');
            }


            $pig_price=rand($pigInfo['min_price'],$pigInfo['max_price']);
            $saveDate = [];
            $saveDate['uid'] = $this->user_id;
            $saveDate['pig_id'] = $pigInfo['id'];
            $saveDate['pig_name'] = $pigInfo['name'];
            $saveDate['price'] = $pig_price;
            $saveDate['contract_revenue'] = $pigInfo['contract_revenue'];
            $saveDate['cycle'] = $pigInfo['cycle'];
            $saveDate['doge'] = $pigInfo['doge'];
            $saveDate['pig_no'] = create_trade_no();
            $saveDate['status'] = 1;
            $saveDate['create_time'] = time();
            $saveDate['end_time'] = time()+$pigInfo['cycle']*24*3600;
            $sell_id = Db::name('user_pigs')->insertGetId($saveDate);
            $sellOrder = [];
            $sellOrder['order_no'] = create_trade_no();
            $sellOrder['uid'] = $this->user_id;
            $sellOrder['pig_id'] = $pigInfo['id'];
            $sellOrder['source_price'] = $pigInfo['max_price'];
            $sellOrder['price'] = $pig_price;
            $sellOrder['pig_name'] = $pigInfo['name'];
            $sellOrder['create_time'] = time();
            $sellOrder['sell_id'] = 0;
            $order_id = Db::name('PigOrder')->insertGetId($sellOrder);
            if ($sell_id && $order_id) {
                //扣減库存
                model('Pig')->where(['id'=>['eq',$pigInfo['id']], 'selled_stock'=>['lt', $pigInfo['max_stock']]])->setInc('selled_stock');
                //更新用户猪对应的订单号
                Db::name('user_pigs')->where('id',$sell_id)->update(['order_id'=>$order_id,'end_time'=>time()]);
                //扣除eos
                moneyLog($this->user_id,$this->user_id,'doge',-$pig_price,77,'兑换英雄订单：'. $sellOrder['order_no']);
                $this->success('兑换成功');
            }

        /*    var_dump($this->user);exit;*/
            $map = [];
            $map['id'] = $pig_id;

            DoeLog($this->user_id,0,'pay_points',-$pigInfo['qiang_points'],3,'抢购武将');
            $map = [];
            $map['uid'] = $this->user_id;

            $map['status'] = 0;
            $insertData['buy_type'] = ['<>', 1];
            //已经预约的，修改bug_type为2
            $re = Db::name('yuyue')->insert($insertData);
            Db::name('yuyue')->where($map)->update(['buy_type'=>2]);
            $this->success('进入抢购成功');
        }else{
            $this->success('进入抢购成功');
        }
    }

    public function checkFlushOpen()
    {
        $id = $this->request->param('id');
        $endtime = $this->request->param('endtime');
        $uid = $this->user_id;
        $nowTime = date('H:i:s',time()-180);
        $is_open = Cache::get('is_open'.$id);
        if (!$is_open && $nowTime<=$endtime) {
            return json(['code'=>0,'msg'=>'未开奖']);
        } else {
            $luckyUsers = Cache::get('buy_'.date('Ymd'). $id);
            //dump($luckyUsers);die;

            if (!empty($luckyUsers)) {
                if (in_array($uid,$luckyUsers)) {
                    return json(['code'=>1,'msg'=>'恭喜']);
                } else {
                    return json(['code'=>2,'msg'=>'很遗憾']);
                }
            }else{
                return json(['code'=>2,'msg'=>'很遗憾']);
            }

        }

    }


    //积分商城
    public function Integral_shop(){
        $piglist = Db::name('task_config')->where('is_integral_goods','on')->select();

        $nowtime = date('H:i');
        $nowday = date('Y-m-d ');
        $time = time();
        foreach ($piglist as $key=>$val) {
            $res =  Db::name('user_pigs')->where('pig_id', $val['id'])->select();

            if(count($res)>0){

                $piglist[$key]['game_status'] = 5;//已拥有
            }else{
                $piglist[$key]['game_status'] = 4;
            }
        }
        $config=unserialize(Db::name('system')->where('name','site_config')->value('value'));
        return view()->assign(['piglist'=>$piglist,'nowday'=>$nowday,'nowtime'=>$time,'config'=>$config]);

    }

    //积分购买
    public function integral_buy(){
        $data = $this->request->param();
        //dump($data);
        $pig_id = $data['id'];
        $pigInfo =  Db::name('task_config')->where('id',$pig_id)->find();
        $nowTime = date('H:i');
        if ($nowTime<$pigInfo['start_time'] || $nowTime>$pigInfo['end_time'])
        {
            $this->error('不是兑换时间');
        }
        //是否实名通过
        $authMap = [];
        $authMap['uid'] = $this->user_id;
        $authMap['status'] = 1;
        if (!Db::name('identity_auth')->where($authMap)->find()) $this->error('请先实名');

        if ($pigInfo['is_integral_goods'] !='on')
        {
            $this->error('非积分商城宠物');
        }

        $salf=round($pigInfo['integral_price']/2,2);


            if( $this->user->pig <$salf  ){
                $this->error('幸运币不足,兑换需'.$salf);
            }

            if( $this->user->share_integral <$salf  ){
                $this->error('推广收益不足,兑换需'.$salf);
            }


            if($pigInfo['selled_stock']>=$pigInfo['max_stock']){
                $this->error('库存不足');
            }

            $pig_price=rand($pigInfo['min_price'],$pigInfo['max_price']);
            $saveDate = [];
            $saveDate['uid'] = $this->user_id;
            $saveDate['pig_id'] = $pigInfo['id'];
            $saveDate['pig_name'] = $pigInfo['name'];
            $saveDate['price'] = $pig_price;
            $saveDate['contract_revenue'] = $pigInfo['contract_revenue'];
            $saveDate['cycle'] = $pigInfo['cycle'];
            $saveDate['doge'] = $pigInfo['doge'];
            $saveDate['pig_no'] = create_trade_no();
            $saveDate['status'] = 1;
            $saveDate['create_time'] = time();
            $saveDate['end_time'] = time()+$pigInfo['cycle']*24*3600;
            $sell_id = Db::name('user_pigs')->insertGetId($saveDate);
            $sellOrder = [];
            $sellOrder['order_no'] = create_trade_no();
            $sellOrder['uid'] = $this->user_id;
            $sellOrder['pig_id'] = $pigInfo['id'];
            $sellOrder['source_price'] = $pigInfo['max_price'];
            $sellOrder['price'] = $pig_price;
            $sellOrder['pig_name'] = $pigInfo['name'];
            $sellOrder['create_time'] = time();
            $sellOrder['sell_id'] = 0;
            $order_id = Db::name('PigOrder')->insertGetId($sellOrder);
            if ($sell_id && $order_id) {
                //扣減库存
                model('Pig')->where(['id'=>['eq',$pigInfo['id']], 'selled_stock'=>['lt', $pigInfo['max_stock']]])->setInc('selled_stock');
                //更新用户猪对应的订单号
                Db::name('user_pigs')->where('id',$sell_id)->update(['order_id'=>$order_id,'end_time'=>time()]);
                //扣除eos
                moneyLog($this->user_id,$this->user_id,'total_share_integral',-$salf,77,'兑换积分英雄订单：'. $sellOrder['order_no']);
                moneyLog($this->user_id,$this->user_id,'pig',-$salf,77,'兑换积分英雄订单：'. $sellOrder['order_no']);
                $this->success('兑换成功');
            }else{
                $this->error('失败');
            }




    }


}
