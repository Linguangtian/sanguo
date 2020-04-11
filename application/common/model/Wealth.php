<?php
/*
'''''''''''''''''''''''''''''''''''''''''''''''''''''''''
源码来自108源码网分享 rc108.com
''''''''''''''''''''''''''''''''''''''''''''''''''''''''''
 */
namespace app\common\model;

use think\Model;
use think\Db;
class Wealth extends Model
{
    protected $table = 'wym_money_log';
    public function getCurrencyAttr($value)
    {
        $currency = [
            //'money'=>'现金币',
            'pay_points' => '粮草',
            'share_integral' => '推广收益',
            'contract_revenue' => '智能合约',
            'wia' => 'WIA币',
            'doge'=>'DOGE币'
        ];
        return $currency[$value];
    }


}