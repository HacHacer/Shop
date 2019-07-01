<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/15 0015
 * Time: 下午 5:12
 */

namespace Home\Model;


use Think\Model;

class addressModel extends Model
{
    public function adds(){
        $address=M('address');
        $address->create();
        $res=$address->add();
        return $res;
    }
    public function selectall(){
        $address=M('address');
        $res=$address->select();
        return $res;
    }
    public function selectbyid($aid){
        $add=M('address');
        $re=$add->where('aid='.$aid)->find();
        return $re;
    }
}