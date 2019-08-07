<?php
namespace app\admin\controller;

use app\admin\model\AuthGroup as AuthGroupModel;

class AuthGroup extends Base
{
    public function lst(){
        $authGroupRes=AuthGroupModel::order('id asc')->paginate(6);
        $this->assign('authGroupRes',$authGroupRes);
        return $this->fetch();
    }

    public function add(){
        if(request()->isPost()){
            $data=input('post.');
            if($data['rules']){
                $data['rules']=implode(',', $data['rules']);
            }
            $data['time']=date('y-m-d h:i:s',time());
            $add=db('auth_group')->insert($data);
            if($add){
                $this->success('添加用户组成功！',url('/auth_group/lst'));
            }else{
                $this->error('添加用户组失败！');
            }
        }
        $authRule=new \app\admin\model\AuthRule();
        $authRuleRes=$authRule->authRuleTree();
        $this->assign('authRuleRes',$authRuleRes);
        return $this->fetch();
    }

    public function edit(){
        if(request()->isPost()){
            $data=input('post.');
            if($data['rules']){
                $data['rules']=implode(',', $data['rules']);
            }
            $_data=array();
            foreach ($data as $k => $v) {
                $_data[]=$k;
            }
            if(!in_array('status', $_data)){
                $data['status']=0;
            }
            $data['time']=date('y-m-d h:i:s',time());
            $save=db('auth_group')->update($data);
            if($save!==false){
                $this->success('修改用户组成功！',url('/auth_group/lst'));
            }else{
                $this->error('修改用户组失败！');
            }
        }
        $authgroups=db('auth_group')->find(input('id'));
        $this->assign('authgroups',$authgroups);
        $authRule=new \app\admin\model\AuthRule();
        $authRuleRes=$authRule->authRuleTree();
        $this->assign('authRuleRes',$authRuleRes);
        return $this->fetch();
    }

    public function del(){
        $del=db('auth_group')->delete(input('id'));
        if($del){
            $this->success('删除用户组成功！',url('/auth_group/lst'));
        }else{
            $this->error('删除用户组失败！');
        }
        return $this->fetch();
    }


    
    




   

	












}
