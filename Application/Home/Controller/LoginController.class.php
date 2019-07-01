<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/10 0010
 * Time: 下午 3:14
 */

namespace Home\Controller;


use Home\Model\admininfoModel;
use Home\Model\productinfoModel;
use Home\Model\ptypeinfoModel;
use Think\Controller;
class LoginController extends CommandController
{
    public function index(){
        $this->display();
    }
    public function adminLogin(){
        $this->display();
    }
    public function loginver(){
        $username=I('post.acount');
        $pwd=I('post.adminpwd');
        $man=new admininfoModel();
        $data=$man->verify($username,$pwd);
        if($data==true)
        {
            $_SESSION['username']=$username;
            $logintime=date('Y-m-d H:i');
            $man->updatetime($username,$logintime);
            $this->redirect('Index');
        }
        else
        {
            $this->error('登录错误');
        }
    }
    public function admin_list(){
        $man=new admininfoModel();
        $data=$man->selectall();
        $this->assign('manager',$data);
        $this->display();
    }
    public function top(){
        $name=$_SESSION['username'];
        $admin=new admininfoModel();
        $data=$admin->selectbyname($name);
        $this->assign('admin',$data);
        $this->display();
    }
    public function revise(){
        $id=I('get.adminid');
        $this->assign('id',$id);
        if($id!=0)
        {
            $admin=new admininfoModel();
            $data=$admin->selectbyid($id);
            $this->assign('admin',$data);
        }
        $this->display();
    }
    public function pwdon(){
        $pwd=I('get.pwd');
        $acount=I('get.name');
            $man=new admininfoModel();
            $da=$man->verify($acount,$pwd);
            if($da==true)
            {
               return;
            }
            else
            {
                echo '原密码错误';
            }
    }
    public function acounton(){
        $username=I('get.name');
        if($username)
        {
            $man=M('admininfo');
            $da=$man->where('acount="'.$username.'"')->find();
            if(count($da)>0)
            {
                echo '此账号已被注册';
            }
        }

    }
    public function admininsert(){
        $admin=M('admininfo');
        $data['acount']=I('acount');
        $data['adminqq']=I('adminqq');
        $data['adminpwd']=I('adminpwd');
        $data['ltime']=$data['jtime']=date('Y-m-d H:i:s');
        $res=$admin->add($data);
        if($res==true)
        {
            $this->redirect('admin_list');
        }
        else
        {
            $this->error('添加失败');
        }
    }
    public function updatepwd(){
        $admin=new admininfoModel();
        $user=I('acount');
        $pwd=I('adminpwd');
        $qq=I('adminqq');
        $data=$admin->updatepwd($pwd,$qq,$user);
        if($data==true)
        {
            $this->redirect('admin_list');
        }
        else
        {
            $this->error('修改错误');
        }
    }
    public function deleteadmin(){
        $admin=new admininfoModel();
        $id=I('get.adminid');
        $data=$admin->deleteid($id);
        if($data==true)
        {
            $this->redirect('admin_list');
        }
        else
        {
            $this->error('删除错误');
        }

    }
    public function destroy(){
        session_start();
        /*** 删除所有的session变量..也可用unset($_SESSION[xxx])逐个删除。****/
        $_SESSION = array();
        /***删除sessin id.由于session默认是基于cookie的，所以使用setcookie删除包含session id的cookie.***/
        if (isset($_COOKIE[session_name()])) {
            setcookie(session_name(), '', time()-42000, '/');
        }
        // 最后彻底销毁session.
        session_destroy();
        $this->redirect('adminLogin');
    }
    public function addtype(){
        $newtype=new ptypeinfoModel();
        $data=$newtype->addtype();
        if($data==true)
        {
            $this->redirect('product_category');
        }
        else
        {
            $this->error('新增错误');
        }
    }
    public function typename(){
        $typename=I('get.name');
        if($typename)
        {
           $type=new ptypeinfoModel();
           $da=$type->selectbyname($typename);
            if(count($da)>0)
            {
                echo '此类别已存在';
            }
        }
    }
    public function product_category(){
        $doc=M('ptypeinfo');
        $count=$doc->count();
        $page=$this->getpage($count,10);
        $show=$page->show();
        $this->assign('page',$show);
        $doc_list = $doc->limit($page->firstRow.','.$page->listRows)->select();
        $this->assign('type',$doc_list);
        $this->display();
    }
    public function deletetype(){
        $ptid=I('get.id');
        $type=new ptypeinfoModel();
        $data=$type->deleteid($ptid);
        if($data==true)
        {
            $this->redirect('product_category');
        }
        else{
            $this->error('删除错误');
        }
    }
    public function deletes(){
        $ptid=I('ptids');
        $pt=join(',',$ptid);
        $type=new ptypeinfoModel();
        $data=$type->deleteids($pt);
        if($data==true)
        {
            $this->redirect('product_category');
        }
        else{
            $this->error('删除错误');
        }
    }
    public function edit_product(){
        $type=new ptypeinfoModel();
        $data=$type->selectall();
        if($data==true)
        {
            $this->assign('type',$data);
        }
        $this->display();
    }
    public function product(){
        $pid=I('get.pid');
        $this->assign('pid',$pid);
        if($pid!='0')
        {
            $product=new productinfoModel();
            $res=$product->selectbyid($pid);
            $this->assign('product',$res);
        }
        $type=new ptypeinfoModel();
        $data=$type->selectall();
        if($data==true)
        {
            $this->assign('type',$data);
        }
        $this->display();
    }

    public function productname(){
            $typename=I('get.name');
            $type=new productinfoModel();
            $da=$type->goodselectbyname($typename);
            if(count($da)>0)
            {
                echo '此商品已存在';
            }

    }
    public function productname2(){
        $pname=I('get.name');
        $oldname=I('get.oldname');
        if($pname!=$oldname)
        {
            $type=new productinfoModel();
            $da=$type->goodselectbyname($pname);
            if(count($da)>0)
            {
                echo '此商品已存在';
            }
        }

    }
    public function goodinsert(){
        $upload=new \Think\Upload();
        $upload->savePath='./';
        $upload->rootPath='public/uploads';
        $upload->subName=false;
        $info   =   $upload->uploadOne($_FILES['pimg']);
        if(!$info) {// 上传错误提示错误信息
            echo ($upload->getError());
        }else{// 上传成功
            $img='/Shop/Public/Uploads/'.$info['rootpath'].$info['savename'];
        }
       $gt=M('productinfo');
        if(I('post.pisxin')=='on')
        {
            $arr['pisxin']=1;
        }
        else
        {
            $arr['pisxin']=0;
        }
        if(I('post.pisjing')=='on')
        {
            $arr['pisjing']=1;
        }
        else
        {
            $arr['pisjing']=0;
        }
        if(I('post.pisre')=='on')
        {
            $arr['pisre']=1;
        }
        else
        {
            $arr['pisre']=0;
        }
        $arr['pname']=I('post.pname');
        $arr['ptid']=I('post.ptid');
        $arr['pprice']=I('post.pprice');
        $arr['pimg']="$img";
        $arr['pnote']=I('pnote');
        $arr['pdetial']=I('post.pdetail');
        $arr['pcount']=I('post.pcount');
        $data=$gt->add($arr);
        if($data==true)
        {
            $this->redirect('product_list');
        }
        else{
            $this->error('新增失败');
        }
    }
    public function getpage($count,$listrows){
        $page = new \Think\Page($count,$listrows);
        $page->setConfig('header', '<li class="rows">共<b>%TOTAL_ROW%</b>条记录&nbsp;第<b>%NOW_PAGE%</b>页/共<b>%TOTAL_PAGE%</b>页</li>');
        $page->setConfig('prev', '上一页');
        $page->setConfig('next', '下一页');
        $page->setConfig('last', '末页');
        $page->setConfig('first', '首页');
        $page->lastSuffix = false;
        return $page;
    }
    public function product_list(){
//        if(I('pname')==''||I('pname')==null)
//        {
//            $doc = M('productinfo');
//            //调用count方法查询要显示的数据总记录数
//            $count = $doc->count();
//            //echo $count;die;
//            $page = $this->getpage($count,2);
//            // 分页显示输出
//            $show = $page->show();
//            $this->assign('page',$show);
//            // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
//            $doc_list = $doc->limit($page->firstRow.','.$page->listRows)->select();
//            $this->assign('product',$doc_list);
//        }
//        else
//        {
            $datemin=isset($_POST['pname'])?$_POST['pname']:$_SESSION['pname2'];
            $_SESSION['pname2']=$datemin;
            if(IS_POST||$_SESSION['pname2']!=''||$_SESSION['pname2']!=null){
                $where='pname like "%'.$_SESSION['pname2'].'%"';
            }
            else{
                $where='';
            }
            $doc = M('productinfo');
            $count=count($doc->where($where)->select());
            $page = $this->getpage($count,5);
            // 分页显示输出
            $show = $page->show();
            $this->assign('page',$show);
            // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
            $doc_list = $doc->field(true)->where($where)->limit($page->firstRow.','.$page->listRows)->select();
            $this->assign('product',$doc_list);
            $this->display();
            unset($_SESSION['pname2']);
//        $product=new productinfoModel();
//        if(I('pname')==''||I('pname')==null)
//        {
//
//            $res=$product->goodtselect();
//
//        }
//        else
//        {
//            $pname=I('pname');
//            $res=$product->selectbyname($pname);
//        }
//        $this->assign('product',$res);
//        $this->display();
    }
    public function deletepro(){
        $product=new productinfoModel();
        $pid=I('get.pid');
        $res=$product->gooddelete($pid);
        if($res==true)
        {
            $this->redirect('product_list');
        }
        else
        {
            $this->error('删除错误');
        }
    }
    public function deletepros(){
        $product=new productinfoModel();
        $pid=I('pids');
        $data=join(',',$pid);
        $res=$product->gooddelete($data);
        if($res==true)
        {
            $this->redirect('product_list');
        }
        else
        {
            $this->error('删除错误');
        }

    }
    public function updatepro(){
        $pid=I('pid');
        $upload=new \Think\Upload();
        $upload->savePath='./';
        $upload->rootPath='public/uploads';
        $upload->subName=false;
        $info   =   $upload->uploadOne($_FILES['pimg']);
        if(!$info) {// 上传错误提示错误信息
            echo ($upload->getError());
        }else{// 上传成功
            $img='/Shop/Public/Uploads/'.$info['rootpath'].$info['savename'];
        }
        $gt=M('productinfo');
        if(I('post.pisxin')=='on')
        {
            $arr['pisxin']=1;
        }
        else
        {
            $arr['pisxin']=0;
        }
        if(I('post.pisjing')=='on')
        {
            $arr['pisjing']=1;
        }
        else
        {
            $arr['pisjing']=0;
        }
        if(I('post.pisre')=='on')
        {
            $arr['pisre']=1;
        }
        else
        {
            $arr['pisre']=0;
        }
        $arr['pname']=I('post.pname');
        $arr['ptid']=I('post.ptid');
        $arr['pprice']=I('post.pprice');
        $arr['pimg']="$img";
        $arr['pnote']=I('pnote');
        $arr['pdetial']=I('post.pdetail');
        $arr['pcount']=I('post.pcount');
        $data=$gt->where('pid='.$pid)->save($arr);
        if($data==true)
        {
            $this->redirect('product_list');
        }
        else{
            $this->error('修改失败');
        }
    }
    public function order_list(){
        $oradd=M('oradd');
        $result=$oradd->select();
        $this->assign('res',$result);
        $this->display();
    }
    public function order_detail(){
        $oid=I('get.oid');
        $oradd=M('oradd');
        $result=$oradd->where('Orderid='.$oid)->find();
        $this->assign('res',$result);
        $poview=M('poview');
        $data=$poview->where('Orderid='.$oid)->select();
        $this->assign('data',$data);
        $this->display();
    }
    public function addvert(){
        $upload=new \Think\Upload();
        $upload->savePath='./';
        $upload->rootPath='public/uploads';
        $upload->subName=false;
        $info   =   $upload->uploadOne($_FILES['advert']);
        if(!$info) {// 上传错误提示错误信息
            echo ($upload->getError());
        }else{// 上传成功
            $img='/Shop/Public/Uploads/'.$info['rootpath'].$info['savename'];
        }
        echo $img;
    }
}