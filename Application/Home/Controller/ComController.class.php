<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/13 0013
 * Time: 下午 6:47
 */

namespace Home\Controller;


use Home\Model\userinfoModel;
use Think\Controller;

class ComController extends Controller
{
    public function _initialize(){
        if(ACTION_NAME=='addtocar')
        {
            if(!isset($_SESSION['customer']))
            {
                $this->redirect('contact');
            }

        }
        if(ACTION_NAME=='shopcar')
        {
            unset($_SESSION['pid']);
        }
            if(isset($_SESSION['customer'])&&$_SESSION['customer']!=null)
            {
                $status=1;
                $this->assign('username',$_SESSION['customer']);
                $user=new userinfoModel();
                $usename=$_SESSION['customer'];
                $data=$user->selectid($usename);
                $_SESSION['uid']=$data['userid'];
                $this->assign('uid',$data['userid']);
            }
            else
            {
                $status=0;
            }
            $this->assign('status',$status);

    }
}