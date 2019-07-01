<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/13 0013
 * Time: 下午 6:01
 */

namespace Home\Model;


use Think\Model;

class pptModel extends Model
{
    public function selectbytype($id){
        $gt=M('ppt');
        $result=$gt->where('ptid='.$id)->select();
        return $result;
    }
    public function selectbyname($name){
        $gt=M('ppt');
        $result=$gt->where('pname like "%'.$name.'%"')->select();
        return $result;
    }
    public function selectall(){
        $gt=M('ppt');
        $result=$gt->select();
        return $result;
    }
    public function selectbyid($id){
        $gt=M('ppt');
        $result=$gt->where('pid='.$id)->find();
        return $result;
    }
    public function selectin($string){
        $gt=M('ppt');
        $result=$gt->where('pid in('.$string.')')->select();
        return $result;
    }
}