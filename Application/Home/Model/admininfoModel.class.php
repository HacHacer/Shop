<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/10 0010
 * Time: 下午 6:56
 */

namespace Home\Model;

use Think\Model;

class admininfoModel extends Model
{
    public function selectall(){
        $admin=M('admininfo');
        $result=$admin->select();
        return $result;
    }
    public function selectbyname($adminname){
        $admin=M('admininfo');
        $result=$admin->where("acount='".$adminname."'")->find();
        return $result;
    }
    public function selectbyid($adminid)
    {
        $admin=M('admininfo');
        $result=$admin->where("adminid='".$adminid."'")->find();
        return $result;
    }
    public function updatetime($username,$time){
        $manager=M('admininfo');
        $manager->ltime=$time;
        $res=$manager->where('acount="'.$username.'"')->save();
        return $res;
    }
    public function updatepwd($pwd,$qq,$username){
        $manager=M('admininfo');
        $manager->adminpwd=$pwd;
        $manager->adminqq=$qq;
        $res=$manager->where('acount="'.$username.'"')->save();
        return $res;
    }
    public function verify($username,$pwd){
        $manager=M('admininfo');
        $res=$manager->where('acount="'.$username.'" and adminpwd="'.$pwd.'"')->find();
        return $res;
    }
    public function deleteid($adminid){
        $man=M('admininfo');
        $res=$man->where('adminid='.$adminid)->delete();
        return $res;
    }

}