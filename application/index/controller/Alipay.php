<?php

namespace app\index\controller;

use think\Controller;
use think\Request;
use think\facade\Env;
use Log;
use app\index\model\Order_info;

class Alipay extends Controller
{
    //异步通知
    public function notify(){
      
        $config = config('alipay.');
        require_once Env::get('extend_path').'alipay/pagepay/service/AlipayTradeService.php';

        $arr=$_POST;
        
        \Log::write(var_export($_POST,true),'notice');
        $alipaySevice = new \AlipayTradeService($config); 
        $alipaySevice->writeLog(var_export($_POST,true));
        $result = $alipaySevice->check($arr);
        \Log::write('支付宝异步验签通知:'.$result,'notice');
        /* 实际验证过程建议商户添加以下校验。
        1、商户需要验证该通知数据中的out_trade_no是否为商户系统中创建的订单号，
        2、判断total_amount是否确实为该订单的实际金额（即商户订单创建时的金额），
        3、校验通知中的seller_id（或者seller_email) 是否为out_trade_no这笔单据的对应的操作方（有的时候，一个商户可能有多个seller_id/seller_email）
        4、验证app_id是否为该商户本身。
        */
        if($result) {//验证成功
                /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                //请在这里加上商户的业务逻辑程序代


                //——请根据您的业务逻辑来编写程序（以下代码仅作参考）——

            //获取支付宝的通知返回参数，可参考技术文档中服务器异步通知参数列表

                //商户订单号

                $out_trade_no = $_POST['out_trade_no'];

                //支付宝交易号

                $trade_no = $_POST['trade_no'];

                //交易状态
                $trade_status = $_POST['trade_status'];


            if($_POST['trade_status'] == 'TRADE_FINISHED') {

                        //判断该笔订单是否在商户网站中已经做过处理
                                //如果没有做过处理，根据订单号（out_trade_no）在商户网站的订单系统中查到该笔订单的详细，并执行商户的业务程序
                                //请务必判断请求时的total_amount与通知时获取的total_fee为一致的
                                //如果有做过处理，不执行商户的业务程序

                        //注意：
                        //退款日期超过可退款期限后（如三个月可退款），支付宝系统发送该交易状态通知
            }
            else if ($_POST['trade_status'] == 'TRADE_SUCCESS') {
                        
                //商户订单号
                $where['order_sn'] = $out_trade_no;
                $where['order_amount'] = htmlspecialchars($_POST['total_amount']);
                 //支付宝交易号
                $trade_no = htmlspecialchars($_POST['trade_no']);
                //验证1、2
                $count =  Order_info::where($where)->count();
//                dump($count);
                if(!$count){
                   $error = "根据订单号:".$where['order_sn']."和订单金额".$where['order_amount']."没有查询到此订单，验证失败！支付宝交易号：".$trade_no;
                   \Log::write('支付宝异步通知:'.$error,'notice');die;
                    
                }
                //验证3
                if( config('alipay.seller_id') !=htmlspecialchars($_POST['seller_id'])){
                    $error = "商户id不匹配，验证失败！支付宝交易号：".$trade_no;
                    \Log::write('支付宝异步通知:'.$error,'notice');die; 
                }

               //验证4
                if( config('alipay.app_id') !=htmlspecialchars($_POST['app_id'])){
                    $error =  "app_id不匹配，验证失败！支付宝交易号：".$trade_no;
                    \Log::write('支付宝异步通知:'.$error,'notice');die; 
                }
                
                //更改订单状态、支付状态、库存
                $data = [
                    'order_status'=>1,
                    'pay_status'=>2,
                ];
                $res = Order_info::where('order_sn',$out_trade_no)->update($data);
                if( !$res ){
                    $error =  "更改支付状态失败！订单号：".$out_trade_no;
                    \Log::write('支付宝异步通知:'.$error,'notice');die; 
                }
                //更改库存
                $sql = "select b.goods_id,b.buy_number FROM shop_order_info as a INNER JOIN shop_order_goods as b ON a.order_id=b.order_id where  a.order_sn='$out_trade_no' ";
                $res = \Db::query($sql);
                if( $res ){
                   foreach( $res as $key=>$v){
                       $oldnumber = \Db::name('goods')->where('goods_id', $v['goods_id'])->value('goods_number');
                       \Db::name('goods')->where('goods_id', $v['goods_id'])->update(['goods_number'=>$oldnumber-$v['buy_number']]);
                   } 
                }
                \Log::write('支付宝异步通知:订单号：'.$out_trade_no.'支付宝交易号：'.$trade_no.'成功','notice');die; 
            }
                //——请根据您的业务逻辑来编写程序（以上代码仅作参考）——
                echo "success";	//请不要修改或删除
        }else {
            //验证失败
            echo "fail";

        }
        
        
        
    }

}
