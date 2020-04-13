<?php
namespace app\common\model;
header("Content-type:text/html; charset=UTF-8");

/* *
 * 类名：ChuanglanSmsApi
 * 功能：云信接口请求类
 * 详细：构造云信短信接口请求，获取远程HTTP数据
 * 版本：1.3
 * 日期：2017-04-12
 * 说明：
 * 以下代码只是为了方便客户测试而提供的样例代码，客户可以根据自己网站的需要，按照技术文档自行编写,并非一定要使用该代码。
 * 该代码仅供学习和研究云信接口使用，只是提供一个参考。
 */

use think\Model;
use think\Db;
class YunxinSmsApi  extends Model{

    var $yunxin_config=array();

    function __construct(){

        $config=unserialize(Db::name('system')->where('name','site_config')->value('value'));


        //云信接口URL, 请求地址请参考云信互联云通讯自助通平台查看或者询问您的商务负责人获取
        $this->yunxin_config['api_send_url'] = 'https://u.smsyun.cc/sms-partner/access/'.$config['api_account'].'/sendsms';

        //云信账号 替换成你自己的账号
        $this->yunxin_config['api_account']	= $config['api_account'];

        //云信密码 替换成你自己的密码
        $this->yunxin_config['api_password']	= md5($config['api_password']);
    }
    /**
     * 发送短信
     *
     * @param string $mobile 		手机号码
     * @param string $msg 			短信内容
     * @param string $needstatus 	是否需要状态报告
     */
    public function sendSMS( $mobile, $msg ) {
        //云信接口参数
        $postArr = array (
            'smstype' =>'4',//短信发送发送
            'clientid'  =>  $this->yunxin_config['api_account'],
            'password' => $this->yunxin_config['api_password'],
            'mobile' => $mobile,
            'content' => $msg ,
            'sendtime'=>date('Y-m-d H:i:s'),
            'extend'=>'00',
            'uid'=>'00'
        );


        $result = $this->curlPost( $this->yunxin_config['api_send_url'] , $postArr);
        return $result;
    }





    /**
     * 通过CURL发送HTTP请求
     * @param string $url  //请求URL
     * @param array $postFields //请求参数
     * @return mixed
     */
    private function curlPost($url,$postFields){

        $postFields = json_encode($postFields);

        $ch = curl_init ();
        curl_setopt( $ch, CURLOPT_URL, $url );
        curl_setopt( $ch, CURLOPT_HTTPHEADER, array(
                'Accept-Encoding: identity',
                'Content-Length: ' . strlen($postFields),
                'Accept:application/json',
                'Content-Type: application/json; charset=utf-8'   //json版本需要填写  Content-Type: application/json;
            )
        );

        //curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4); //若果报错 name lookup timed out 报错时添加这一行代码
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );
        curl_setopt( $ch, CURLOPT_POST, 1 );
        curl_setopt( $ch, CURLOPT_POSTFIELDS, $postFields);
        curl_setopt( $ch, CURLOPT_TIMEOUT,60);
        curl_setopt( $ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, 0);
        $ret = curl_exec ( $ch );




        if (false == $ret) {
            $result = curl_error(  $ch);
        } else {
            $rsp = curl_getinfo( $ch, CURLINFO_HTTP_CODE);

            if (200 != $rsp) {
                $result = "请求状态 ". $rsp . " " . curl_error($ch);
            } else {
                $result = $ret;
            }
        }
        return $result;
    }

}