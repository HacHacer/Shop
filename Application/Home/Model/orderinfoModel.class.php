<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/16 0016
 * Time: 下午 2:33
 */

namespace Home\Model;


use Think\Model;

class orderinfoModel extends Model
{
    public function ver($id){
        $or=M('orderinfo');
        $res=$or->where('Orderid='.$id)->find();
        if($res==true)
        {
            return true;

        }
        else
        {
            return false;
        }
    }
}