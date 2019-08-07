<?php
namespace app\admin\controller;
use think\Controller;
use think\Request;

class Base extends Controller
{
    public function _initialize(){
        if(!session('username')){
            $this->error('请先登录系统！','/login');
        }
        $auth=new Auth();
        $request=Request::instance();
        $con=$request->controller();
        $action=$request->action();
        $name=$con.'/'.$action;
        $notCheck=array('Index/index','Admin/lst','Admin/logout','Admin/user_edit');
        $da=db('auth_group_access')->where('uid',session('uid'))->find();
        $daes=db('auth_group')->where('id',$da['group_id'])->find();
        if(session('uid')!=1){
            if(!in_array($name, $notCheck)){
                if($daes['status']==1){
                    if(!$auth->check($name,session('uid'))){
                        $this->error('对不起，您没有操作权限！',url('/index'));
                    }
                }else{
                    $this->error('对不起，您没有操作权限！',url('/index'));
                }
            }
        }
    }


}
