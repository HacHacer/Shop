<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/11 0011
 * Time: 下午 1:50
 */

namespace Home\Model;


use Think\Model;

class ptypeinfoModel extends Model
{
    public function selectall(){
        $ptyppe=M('ptypeinfo');
        $result=$ptyppe->select();
        return $result;
    }
    public function addtype(){
        $ptyppe=M('ptypeinfo');
        $ptyppe->create();
        $data=$ptyppe->add();
        return $data;
    }
    public function selectbyname($adminname){
        $admin=M('ptypeinfo');
        $result=$admin->where("ptname='".$adminname."'")->find();
        return $result;
    }
    public function selectbyid($id){
        $admin=M('ptypeinfo');
        $result=$admin->where("ptid=".$id)->find();
        return $result;
    }
    public function deleteid($typeid){
        $man=M('ptypeinfo');
        $res=$man->where('ptid='.$typeid)->delete();
        return $res;
    }
    public function deleteids($ids){
        $type=M('ptypeinfo');
        $res=$type->where( 'ptid in('."$ids".')')->delete();
        return $res;
    }

}