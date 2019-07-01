<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/11 0011
 * Time: 下午 2:57
 */

namespace Home\Model;


use Think\Model;

class productinfoModel extends Model
{
    public function goodtselect(){
        $gt=M('productinfo');
        $result=$gt->select();
        return $result;
    }
    public function goodselectbyname($name){
        $gt=M('productinfo');
        $result=$gt->where('pname="'.$name.'"')->find();
        return $result;
    }
    public function selectbyname($name){
        $gt=M('productinfo');
        $result=$gt->where('pname like "%'.$name.'%"')->select();
        return $result;
    }
    public function selectbyid($id){
        $gt=M('productinfo');
        $result=$gt->where('pid='.$id)->find();
        return $result;
    }
    public function selectbyids($pid){
        $gt=M('productinfo');
        $result=$gt->where('pid in('.$pid.')')->select();
        return $result;
    }
    public function gooddelete($pid){
        $gt=M('productinfo');
        $result=$gt->where('pid in("'.$pid.'")')->delete();
        return $result;
    }
    public function goodtinsert(){
        $gt=M('productinfo');
        $gt->create();
        $result=$gt->add();
        return $result;
    }
    public function goodtupdate(){
        $gt=M('productinfo');
        $gt->create();
        $result=$gt->save();
        return $result;
    }
    public function selectby($name){
        $gt=M('productinfo');
        $result=$gt->where("$name=1")->limit(0,5)->select();
        return $result;
    }
}