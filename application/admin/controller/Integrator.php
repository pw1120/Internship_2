<?php
namespace app\admin\controller;

use app\admin\model\Cate as CateModel;

class Integrator extends Base
{
    public function ind_lst()
    {
        $indexes=db('product_indexes')->order('id asc')->paginate(3);
        $this->assign('lst',$indexes);
        return $this->fetch();
    }

    public function ind_add(){
        if(request()->isPost()){
            $data=[
                'type'=>input('type'),
            ];
            $data['time']=date('y-m-d h:i:s',time());
            if(db('product_indexes')->insert($data)){
                $this->success('恭喜添加成功！','/integrator/ind_lst');
            }else{
                $this->error('添加失败，请重试！');
            }
        }
        return $this->fetch();
    }

    public function ind_edit(){
        $id=input('id');
        $solution=db('product_indexes')->find($id);
        if(request()->isPost()){
            $data=[
                'type'=>input('type'),
            ];
            $data['time']=date('y-m-d h:i:s',time());
            $a=db('product_indexes')->where('id',$id)->update($data);
            if($a!==false){
                $this->success('恭喜修改成功！','/integrator/ind_lst');
            }else{
                $this->error('修改失败，请重试！');
            }
        }
        $this->assign('solution',$solution);
        return $this->fetch();
    }

    public function ind_del(){
        $id=input('id');
        if(db('product_indexes')->delete(input('id'))){
            $this->success('删除成功！','/integrator/ind_lst');
        }else{
            $this->error('删除失败！');
        }
        return $this->fetch();
    }

    public function thi_lst()
    {
        $indexes=db('product_list')->order('id asc')->paginate(3);
        $this->assign('lst',$indexes);
        return $this->fetch();
    }

    public function thi_add(){
        $indexes=db('product_indexes')->select();
        $this->assign('indexes',$indexes);
        if(request()->isPost()){
            $data=[
                'title'=>input('title'),
                'url'=>input('url'),
                'type'=>input('type'),
            ];
            if($data['type']=="请选择"){
                $data['type']="";
            }
            $data['time']=date('y-m-d h:i:s',time());
            $data=CateModel::filesave($data,'img');
            if(db('product_list')->insert($data)){
                $da=db('product_list')->order('id desc')->limit(1)->find();
                $pid=$da['id'];
                db('product_show')->insert(array('time'=>$data['time'],'pid'=>$pid,));
                $this->success('恭喜添加成功！','/integrator/thi_lst');
            }else{
                $this->error('添加失败，请重试！');
            }
        }
        return $this->fetch();
    }

    public function thi_edit(){
        $indexes=db('product_indexes')->select();
        $this->assign('indexes',$indexes);
        $id=input('id');
        $solution=db('product_list')->find($id);
        if(request()->isPost()){
            $data=[
                'title'=>input('title'),
                'url'=>input('url'),
                'type'=>input('type'),
            ];
            if($data['type']=="请选择"){
                $data['type']="";
            }
            $data['time']=date('y-m-d h:i:s',time());
            $data=CateModel::filechange($data,'img',$solution);
            $a=db('product_list')->where('id',$id)->update($data);
            if($a!==false){
                db('product_show')->where('pid',$id)->update(array('time'=>$data['time'],));
                $this->success('恭喜修改成功！','/integrator/thi_lst');
            }else{
                $this->error('修改失败，请重试！');
            }
        }
        $this->assign('solution',$solution);
        return $this->fetch();
    }

    public function thi_del(){
        $id=input('id');
        $solution=db('product_list')->find($id);
        CateModel::filedel($solution,'img');
        if(db('product_list')->where('id',$id)->delete()){
            db('product_show')->where('pid',$id)->delete();
            $this->success('删除成功！','/integrator/thi_lst');
        }else{
            $this->error('删除失败！');
        }
        return $this->fetch();
    }

    public function mess(){
        $id=input('id');
        $show=db('product_show')->where('pid',$id)->find();
        $this->assign('show',$show);
        if(request()->isPost()){
            $data=[
                'tab'=>input('content1'),
                'content'=>input('content2'),
            ];
            $data['time']=date('y-m-d h:i:s',time());
            $a=db('product_show')->where('pid',$id)->update($data);
            if($a!==false){
                $this->success('恭喜修改成功！','/integrator/thi_lst');
            }else{
                $this->error('修改失败，请重试！');
            }
        }
        return $this->fetch();
    }

}
