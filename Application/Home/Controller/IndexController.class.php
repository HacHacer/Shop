<?php
namespace Home\Controller;
use Home\Model\addressModel;
use Home\Model\orderinfoModel;
use Home\Model\pptModel;
use Home\Model\productinfoModel;
use Home\Model\ptypeinfoModel;
use Home\Model\userinfoModel;
use Think\Controller;
class IndexController extends ComController {
    ///
    /// 首页展示数据
    ///
    public function index(){
        $type=new ptypeinfoModel();
        $product=new productinfoModel();
        $res=$type->selectall();
        $this->assign('type',$res);
        $xin=$product->selectby('pisxin');
        $this->assign('xin',$xin);
        $jing=$product->selectby('pisjing');
        $this->assign('jing',$jing);
        $re=$product->selectby('pisre');
        $this->assign('re',$re);
        $this->assign('num',count($_SESSION['car']));
        $this->display();
    }
    ///
    /// 物品搜索展示数据
    ///
    public function product(){
        $ptid=I('get.ptid');
        $this->assign('num',count($_SESSION['car']));
        $search=I('search');
        if($ptid!=''||$ptid!=null)
        {
            $product=new pptModel();
            $ptype=new ptypeinfoModel();
            $data=$ptype->selectbyid($ptid);
            $id=$data['ptname'];
            $res=$product->selectbytype($ptid);
            $count=count($res);
        }
        else if($search!=''||$search!=null)
        {
            $product=new pptModel();
            $id=$search;
            $res=$product->selectbyname($search);
            $count=count($res);
        }
        else
        {
            $product=new pptModel();
            $id='全部商品';
            $res=$product->selectall();
            $count=count($res);
        }
        $this->assign('val',$id);
        $this->assign('count',$count);
        $this->assign('product',$res);
        $this->display();
    }
    ///
    /// 添加购物车动作
    ///
    public function addtocar(){
        if(I('get.count')!=''||I('get.count')!=null)
        {
            $count=I('get.count');
        }
        else
        {
            $count=1;
        }
        session_start();
        if(isset($_SESSION['car']))
        {
            $car=$_SESSION['car'];
        }
        else
        {
            $car=array();
        }
        if(count($car)==0)
        {
            $product=array('pid'=>I('get.pid'),'count'=>$count);
            array_push($car,$product);
        }
        else{
            $flag=false;
            for($i=0;$i<count($car);$i++)
            {
                $data=$car[$i];
                if($data['pid']==I('get.pid'))
                {
                    $flag=true;
                    break;
                }
            }
            if($flag)
            {
                $car[$i]['count']=$data['count']+$count;
            }
            else
            {
                $product=array('pid'=>I('get.pid'),'count'=>$count);
                array_push($car,$product);
            }

        }
        $_SESSION['car']=$car;
        $this->success('添加成功');
    }
    public function carsplice(){
        $car=$_SESSION['car'];
        $pid=I('get.pid');
        array_splice($car,$pid,1);
        $_SESSION['car']=$car;
        $this->redirect('shopcar');
    }
    public function contact(){
        $this->display();
    }
    ///
    /// 提取购物车数据
    ///
    public function showcar(){
        $car=$_SESSION['car'];
        $product=array();
        $data=array();
        for($i=0;$i<count($car);$i++)
        {
            $product[]=$car[$i]['pid'];
        }
        $string=join(',',$product);
        if($string!='') {
            $a = new pptModel();
            $data = $a->selectin($string);
        }
        for($j=0;$j<count($data);$j++)
        {
            for($k=0;$k<count($car);$k++)
            {

                if($data[$j]['pid']==$car[$k]['pid'])
                {
                    $data[$j]['xj']=$car[$k]['count']*$data[$j]['pprice'];
                    $data[$j]['count']=$car[$k]['count'];
                }
            }
        }
        $result=json_encode($data);
        echo $result;
    }
    public function shopcar(){
        $car=$_SESSION['car'];
        $product=array();
        $data=array();
        for($i=0;$i<count($car);$i++)
        {
            $product[]=$car[$i]['pid'];
        }
        $string=join(',',$product);
        if($string!='') {
            $a = new pptModel();
            $data = $a->selectin($string);
        }
        for($j=0;$j<count($data);$j++)
        {
            for($k=0;$k<count($car);$k++)
            {

                if($data[$j]['pid']==$car[$k]['pid'])
                {
                    $data[$j]['xj']=$car[$k]['count']*$data[$j]['pprice'];
                    $data[$j]['count']=$car[$k]['count'];
                }
            }
        }
        $this->assign('view',$data);
        $this->display();
    }
    ///
    ///
    /// 登录和注册
    ///
    public function login(){
        $username=I('get.username');
        $pwd=I('get.userpwd');
        $user=new userinfoModel();
        $res=$user->verify($username,$pwd);
        if($res==true)
        {
            $_SESSION['customer']=$username;
            $_SESSION['userid']=$res['Userid'];
            echo $username;
        }
        else
        {
            echo 0;
        }

    }
    public function loginout(){
        unset($_SESSION['customer']);
        unset($_SESSION['userid']);
        unset($_SESSION['car']);
        $this->redirect('index');
    }
    ///
    /// 商品详情
    ///
    ///
    public function preview(){
        $this->assign('num',count($_SESSION['car']));
        $pid=I('get.pid');
        $product=new pptModel();
        $p=new productinfoModel();
        $re=$p->selectby('pisre');
        $this->assign('re',$re);
        $pro=$product->selectbyid($pid);
        $typeid=$pro['ptid'];
        $samepr=$product->selectbytype($typeid);
        $this->assign('product',$pro);
        $this->assign('samepro',$samepr);
        $this->display();
    }
    ////
    /// 读取地址
    ///
    public function getorder(){
        if(isset($_SESSION['pid']))
        {
            $pid=$_SESSION['pid'];
        }
        else
        {
            $pid=I('productid');
            $_SESSION['pid']=$pid;
        }
         if($pid!=null)
            {
                $add=new addressModel();
                $res=$add->selectall();
                $this->assign('address',$res);
                $a=$_SESSION['car'];
                $order['orderid']=time();
                $order['orderdate']=date('Y-m-d H:i:s');
                $order['ordermoney']=I('post.ordermoney');
                $order['userid']=$_SESSION['uid'];
                $order['productnum']=count($pid);
                $order['orderstate']='0';
                $this->assign('order',$order);
                $od=array();
                $pids=array();
                $pro=new productinfoModel();
                for($i=0;$i<count($pid);$i++)
                {
                    $orderdetail['productid']=$a[$i]['pid'];
                    $pids[]=$a[$i]['pid'];
                    $orderdetail['buycount']=$a[$i]['count'];
                    $orderdetail['orderid']=$order['orderid'];
                    $od[]=$orderdetail;
                }
                $pps=join(',',$pids);
                $arr=$pro->selectbyids($pps);
                for($j=0;$j<count($arr);$j++)
                {
                    $arr[$j]['count']=$a[$j]['count'];
                    $arr[$j]['xj']=$a[$j]['count']*$arr[$j]['pprice'];
                }
                $this->assign('product',$arr);
                $this->assign('od',$od);
                $this->display();
            }
            else{
                $this->error('没有选择商品');
            }
    }

    public function addver(){
        $add=new addressModel();
        $res=$add->adds();
        if($res==true) {
            $this->redirect('getorder');
        }
        else
        {
            $this->error('失败');
        }
    }
    public function postorder(){
        $order['Orderid']=I('post.orderid');
        $ord=new orderinfoModel();
        $data2=$ord->ver( $order['Orderid']);
        $order['Orderdate']=I('post.orderdate');
        $order['Ordermoney']=I('post.ordermoney');
        $order['Userid']=I('post.userid');
        $order['Orderstate']=I('post.orderstate');
        $order['Productnum']=I('post.productnum');
        $order['Addressid']=I('aid');
        $a=I('post.Orderid');
        $b=I('post.Productid');
        $c=I('buyCount');
        if($data2==true)
        {
            $add=new addressModel();
            $data=$add->selectbyid(I('aid'));
            $this->assign('add',$data);
            $this->assign('oid',$order);
        }
        else
        {
            $add=new addressModel();
            $data=$add->selectbyid(I('aid'));
            $this->assign('add',$data);
            $this->assign('oid',$order);
            $or=M('orderinfo');
            $or->add($order);
            $od=M('orderdetail');
            for($i=0;$i<count(I('post.Orderid'));$i++)
            {
                $arr['Orderid']=$a[$i];
                $arr['Productid']=$b[$i];
                $arr['buyCount']=$c[$i];
                $od->add($arr);
            }

        }
        $this->display();

    }
    public function sucss(){
        $this->display();
    }
    public function map(){
        $add=I('get.add');
        $this->assign('add',$add);
        $this->display();
    }
    public function getit(){
        $add=I('add');
        $_SESSION['add']=$add;
    }
    public function showit(){
        echo $_SESSION['add'];
    }
}
