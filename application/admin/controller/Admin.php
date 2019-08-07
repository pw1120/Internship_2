<?php
namespace app\admin\controller;

use app\admin\model\Admin as AdminModel;

class Admin extends Base
{

    public function lst()
    {
        $auth=new Auth();
        $admin=new AdminModel();
        $adminres=$admin->getadmin();
        foreach ($adminres as $k => $v) {
            $_groupTitle=$auth->getGroups($v['id']);
            if(isset($_groupTitle[0]["title"])){
                $groupTitle=$_groupTitle[0]["title"];
            }
            $v['groupTitle']=$groupTitle;
        }
        $this->assign('adminres',$adminres);
        return $this->fetch();
    }

    public function add()
    {
        if(request()->isPost()){
            $data=input('post.');
            $validate = \think\Loader::validate('Admin');
            if(!$validate->scene('add')->check($data)){
                $this->error($validate->getError());
            }
            $admin=new AdminModel();
            if($admin->addadmin($data)){
                $this->success('添加管理员成功！',url('/admin/lst'));
            }else{
                $this->error('添加管理员失败！');
            }
        }
        $authGroupRes=db('auth_group')->select();
        $this->assign('authGroupRes',$authGroupRes);
        return $this->fetch();
    }

    public function edit($id)
    {
        $admins=db('admin')->find($id);
        if(request()->isPost()){
            $data=input('post.');
            $validate = \think\Loader::validate('Admin');
            if(!$validate->scene('edit')->check($data)){
                $this->error($validate->getError());
            }
            $admin=new AdminModel();
            $savenum=$admin->saveadmin($data,$admins);
            if($savenum == '2'){
                $this->error('管理员用户名不得为空！');
            }
            if($savenum !== false){
                $this->success('修改成功！',url('/admin/lst'));
            }else{
                $this->error('修改失败！');
            }
        }
        $authGroupAccess=db('auth_group_access')->where(array('uid'=>$id))->find();
        $authGroupRes=db('auth_group')->select();
        $this->assign('authGroupRes',$authGroupRes);
        $this->assign('admin',$admins);
        $this->assign('groupId',$authGroupAccess['group_id']);
        return $this->fetch();
    }

    public function user_edit()
    {
        $id=input('id');
        $admins=db('admin')->find($id);
        if(request()->isPost()){
            $data=input('post.');
            $validate = \think\Loader::validate('Admin');
            if(!$validate->scene('user_edit')->check($data)){
                $this->error($validate->getError());
            }
            $admin=new AdminModel();
            $savenum=$admin->editadmin($data,$admins);
            if($savenum == '2'){
                $this->error('管理员用户名不得为空！');
            }
            if($savenum == '3'){
                $this->error('旧密码和原始密码不符！');
            }
            if($savenum == '4'){
                $this->error('新密码不能和旧密码相同！');
            }
            if($savenum !== false){
                session('username',$data['username']);
                $this->success('修改成功！',url('/admin'));
            }else{
                $this->error('修改失败！');
            }
        }
        if(!$admins){
            $this->error('该管理员不存在');
        }
        $authGroupAccess=db('auth_group_access')->where(array('uid'=>$id))->find();
        $authGroupRes=db('auth_group')->select();
        $this->assign('authGroupRes',$authGroupRes);
        $this->assign('admin',$admins);
        $this->assign('groupId',$authGroupAccess['group_id']);
        return $this->fetch();
    }

    public function del($id){
        $admin=new AdminModel();
        $delnum=$admin->deladmin($id);
        if($delnum == '1'){
            db('auth_group_access')->where('uid',$id)->delete();
            $this->success('删除管理员成功！',url('/admin/lst'));
        }else{
            $this->error('删除管理员失败！');
        }
        return $this->fetch();
    }

    public function logout(){
        session(null);
        $this->success('退出系统成功！',url('/login'));
    }

}