<?php
namespace app\admin\controller;

use app\admin\model\AuthRule as AuthRuleModel;

class AuthRule extends Base
{

    public function lst(){
        $authRule=new AuthRuleModel();
        if(request()->isPost()){
            $sorts=input('post.');
            foreach ($sorts as $k => $v) {
                $authRule->update(['id'=>$k,'sort'=>$v]);
            }
            $this->success('更新排序成功！',url('/auth_rule/lst'));
        }
        $authRuleRes=$authRule->authRuleTree();
        $this->assign('authRuleRes',$authRuleRes);
        return $this->fetch();
    }

    public function add(){
        if(request()->isPost()){
            $data=input('post.');
            $plevel=db('auth_rule')->where('id',$data['pid'])->field('level')->find();
            if($plevel){
                $data['level']=$plevel['level']+1;
            }else{
               $data['level']=0; 
            }
            $data['time']=date('y-m-d h:i:s',time());
            $add=db('auth_rule')->insert($data);
            if($add){
                $this->success('添加权限成功！',url('/auth_rule/lst'));
            }else{
                $this->error('添加权限失败！');
            }
        }
        $authRule=new AuthRuleModel();
        $authRuleRes=$authRule->authRuleTree();
        $this->assign('authRuleRes',$authRuleRes);
        return $this->fetch();
    }

    public function edit(){
        if(request()->isPost()){
            $data=input('post.');
            $plevel=db('auth_rule')->where('id',$data['pid'])->field('level')->find();
            if($plevel){
                $data['level']=$plevel['level']+1;
            }else{
               $data['level']=0; 
            }
            $data['time']=date('y-m-d h:i:s',time());
            if($data['id']==$data['pid']){
                $this->error('上级权限和当前权限不能相同！');
            }
            $save=db('auth_rule')->update($data);
            if($save!==false){
                $this->success('修改权限成功！',url('/auth_rule/lst'));
            }else{
                $this->error('修改权限失败！');
            }
        }
        $authRule=new AuthRuleModel();
        $authRuleRes=$authRule->authRuleTree();
        $authRules=$authRule->find(input('id'));
        $this->assign(array(
            'authRuleRes'=>$authRuleRes,
            'authRules'=>$authRules,
            ));
        return $this->fetch();
    }


    public function del(){
        $authRule=new AuthRuleModel();
        $authRule->getparentid(input('id'));
        $authRuleIds=$authRule->getchilrenid(input('id'));
        $authRuleIds[]=input('id');
        $del= AuthRuleModel::destroy($authRuleIds);
        if($del){
            $this->success('删除权限成功！',url('/auth_rule/lst'));
        }else{
            $this->error('删除权限失败！');
        }
        return $this->fetch();
    }



    
    




   

	












}
