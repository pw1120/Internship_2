<?php
namespace app\admin\controller;

use app\admin\model\Cate as CateModel;

class Recruitment extends Base
{
    public function ind_lst()
    {
        $indexes=db('recruitment_indexes')->order('id asc')->paginate(3);
        $this->assign('lst',$indexes);
        return $this->fetch();
    }

    public function ind_add(){
        if(request()->isPost()){
            $data=[
                'type'=>input('type'),
            ];
            $data['time']=date('y-m-d h:i:s',time());
            if(db('recruitment_indexes')->insert($data)){
                $this->success('恭喜添加成功！','/recruitment/ind_lst');
            }else{
                $this->error('添加失败，请重试！');
            }
        }
        return $this->fetch();
    }

    public function ind_edit(){
        $id=input('id');
        $solution=db('recruitment_indexes')->find($id);
        if(request()->isPost()){
            $data=[
                'type'=>input('type'),
            ];
            $data['time']=date('y-m-d h:i:s',time());
            $a=db('recruitment_indexes')->where('id',$id)->update($data);
            if($a!==false){
                $this->success('恭喜修改成功！','/recruitment/ind_lst');
            }else{
                $this->error('修改失败，请重试！');
            }
        }
        $this->assign('solution',$solution);
        return $this->fetch();
    }

    public function ind_del(){
        $id=input('id');
        if(db('recruitment_indexes')->delete(input('id'))){
            $this->success('删除成功！','/recruitment/ind_lst');
        }else{
            $this->error('删除失败！');
        }
        return $this->fetch();
    }

    public function thi_lst()
    {
        $indexes=db('recruitment_list')->order('id asc')->paginate(3);
        $this->assign('lst',$indexes);
        return $this->fetch();
    }

    public function thi_add(){
        $indexes=db('recruitment_indexes')->select();
        $this->assign('indexes',$indexes);
        if(request()->isPost()){
            $data=[
                'work'=>input('work'),
                'salary'=>input('salary'),
                'experience'=>input('experience'),
                'education'=>input('education'),
                'url'=>input('url'),
                'type'=>input('type'),
                'data'=>date('y-m-d',time()),
            ];
            if(input('panduan')=='是'){
                $data['apply']='申请兼职';
            }else{
                $data['apply']='';
            }
            if($data['type']=="请选择"){
                $data['type']="";
            }
            $data['time']=date('y-m-d h:i:s',time());
            if(db('recruitment_list')->insert($data)){
                $da=db('recruitment_list')->order('id desc')->limit(1)->find();
                $pid=$da['id'];
                db('recruitment_show')->insert(array('time'=>$data['time'],'pid'=>$pid,));
                $this->success('恭喜添加成功！','/recruitment/thi_lst');
            }else{
                $this->error('添加失败，请重试！');
            }
        }
        return $this->fetch();
    }

    public function thi_edit(){
        $indexes=db('recruitment_indexes')->select();
        $this->assign('indexes',$indexes);
        $id=input('id');
        $solution=db('recruitment_list')->find($id);
        if(request()->isPost()){
            $data=[
                'work'=>input('work'),
                'salary'=>input('salary'),
                'experience'=>input('experience'),
                'education'=>input('education'),
                'url'=>input('url'),
                'type'=>input('type'),
                'data'=>date('y-m-d',time()),
            ];
            if(input('panduan')=='是'){
                $data['apply']='申请兼职';
            }else{
                $data['apply']='';
            }
            if($data['type']=="请选择"){
                $data['type']="";
            }
            $data['time']=date('y-m-d h:i:s',time());
            $a=db('recruitment_list')->where('id',$id)->update($data);
            if($a!==false){
                db('recruitment_show')->where('pid',$id)->update(array('time'=>$data['time'],));
                $this->success('恭喜修改成功！','/recruitment/thi_lst');
            }else{
                $this->error('修改失败，请重试！');
            }
        }
        $this->assign('solution',$solution);
        return $this->fetch();
    }

    public function thi_del(){
        $id=input('id');
        if(db('recruitment_list')->where('id',$id)->delete()){
            db('recruitment_show')->where('pid',$id)->delete();
            $this->success('删除成功！','/recruitment/thi_lst');
        }else{
            $this->error('删除失败！');
        }
        return $this->fetch();
    }

    public function mess(){
        $id=input('id');
        $show=db('recruitment_show')->where('pid',$id)->find();
        $this->assign('show',$show);
        if(request()->isPost()){
            $data=[
                'treatment'=>input('content1'),
                'require'=>input('content2'),
            ];
            $data['time']=date('y-m-d h:i:s',time());
            $a=db('recruitment_show')->where('pid',$id)->update($data);
            if($a!==false){
                $this->success('恭喜修改成功！','/recruitment/thi_lst');
            }else{
                $this->error('修改失败，请重试！');
            }
        }
        return $this->fetch();
    }

}
