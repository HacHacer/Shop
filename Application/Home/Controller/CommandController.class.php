<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/12 0012
 * Time: 上午 10:33
 */

namespace Home\Controller;


use Think\Controller;
use Think\Auth;
class CommandController extends Controller
{
    public function _initialize(){
        if(ACTION_NAME!='adminLogin'&&ACTION_NAME!='loginver')
        {
            if(!isset($_SESSION['username']))
            {
                $this->redirect('adminLogin');
            }
        }
    }
}