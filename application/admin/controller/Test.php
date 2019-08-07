<?php
namespace app\admin\controller;

use app\admin\model\Test as TestModel;

class Test extends Base
{

    public function lst(){
        $authRule=new TestModel();
        $authRuleRes=$authRule->treelst();
        $this->assign('authRuleRes',$authRuleRes);
        return $this->fetch();
    }

    public function add(){
        if(request()->isPost()){
            $data=input('post.');
            $plevel=db('test')->where('id',$data['pid'])->field('level')->find();
            if($plevel){
                $data['level']=$plevel['level']+1;
            }else{
                $data['level']=0;
            }
            $data['time']=date('y-m-d h:i:s',time());
            $add=db('test')->insert($data);
            if($add){
                $this->success('添加权限成功！',url('/test/lst'));
            }else{
                $this->error('添加权限失败！');
            }
        }
        $authRule=new TestModel();
        $authRuleRes=$authRule->treelst();
        $this->assign('authRuleRes',$authRuleRes);
        return $this->fetch();
    }

    public function edit(){
        if(request()->isPost()){
            $data=input('post.');
            $plevel=db('test')->where('id',$data['pid'])->field('level')->find();
            if($plevel){
                $data['level']=$plevel['level']+1;
            }else{
                $data['level']=0;
            }
            $data['time']=date('y-m-d h:i:s',time());
            if($data['id']==$data['pid']){
                $this->error('上级权限和当前权限不能相同！');
            }
            $save=db('test')->update($data);
            if($save!==false){
                $this->success('修改权限成功！',url('/test/lst'));
            }else{
                $this->error('修改权限失败！');
            }
        }
        $authRule=new TestModel();
        $authRuleRes=$authRule->treelst();
        $authRules=$authRule->find(input('id'));
        $this->assign(array(
            'authRuleRes'=>$authRuleRes,
            'authRules'=>$authRules,
        ));
        return $this->fetch();
    }

    public function del(){
        $authRule=new TestModel();
        $authRule->getparentid(input('id'));
        $authRuleIds=$authRule->getchilrenid(input('id'));
        $authRuleIds[]=input('id');
        $del= TestModel::destroy($authRuleIds);
        if($del){
            $this->success('删除权限成功！',url('/test/lst'));
        }else{
            $this->error('删除权限失败！');
        }
        return $this->fetch();
    }

}