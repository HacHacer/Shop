<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/13 0013
 * Time: 下午 7:31
 */

namespace Home\Model;


use Think\Model;

class userinfoModel extends Model
{
    public function verify($username,$pwd){
        $manager=M('userinfo');
        $res=$manager->where('username="'.$username.'" and userpwd="'.$pwd.'"')->find();
        return $res;
    }
    public function selectid($username){
        $manager=M('userinfo');
        $res=$manager->where('username="'.$username.'"')->find();
        return $res;
    }
}