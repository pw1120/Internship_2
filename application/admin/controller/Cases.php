<?php
namespace app\admin\controller;

use app\admin\model\Cate as CateModel;
use think\paginator\driver\Bootstrap;

class Cases extends Base
{
    public function ind_lst()
    {
        $head=db('solution')->where('pid',0)->select();
        $this->assign('head', $head);
        $pid=input('id');
        if($pid){
            $indexes=db('solution')->where('pid',$pid);
        } else{
            $indexes=db('solution')->where('pid','>','0');
        }
        $indexes=$indexes->paginate(10);
        $this->assign('lst', $indexes);
        return $this->fetch();
    }

    public function ind_add(){
        if(request()->isPost()){
            $data=[
                'title'=>input('title'),
                'pid'=>input('pid'),
            ];
            $data['time']=date('y-m-d h:i:s',time());
            if(input('pid')!=1&&input('pid')!=2&&input('pid')!=3){
                $this->error('添加失败，请按要求填写！');
            }
            if(db('solution')->insert($data)){
                $this->success('恭喜添加成功！','/cases/ind_lst');
            }else{
                $this->error('添加失败，请重试！');
            }
        }
        return $this->fetch();
    }

    public function ind_edit(){
        $id=input('id');
        $solution=db('solution')->find($id);
        if(request()->isPost()){
            $data=[
                'title'=>input('title'),
                'pid'=>input('pid'),
            ];
            $data['time']=date('y-m-d h:i:s',time());
            if(input('pid')!=1&&input('pid')!=2&&input('pid')!=3){
                $this->error('添加失败，请按要求填写！');
            }
            $a=db('solution')->where('id',$id)->update($data);
            if($a!==false){
                $this->success('恭喜修改成功！','/cases/ind_lst');
            }else{
                $this->error('修改失败，请重试！');
            }
        }
        $this->assign('solution',$solution);
        return $this->fetch();
    }

    public function ind_del(){
        if(db('solution')->delete(input('id'))){
            $this->success('删除成功！','/cases/ind_lst');
        }else{
            $this->error('删除失败！');
        }
        return $this->fetch();
    }

    public function thi_lst()
    {
        $select=input('select');
        $tt=input('tt');
        if($select=='应用'){
            $indexes=db('solution_list')->where('app',$tt);
        }elseif ($select=='行业'){
            $indexes=db('solution_list')->where('industry',$tt);
        }elseif ($select=='品牌'){
            $indexes=db('solution_list')->where('brand',$tt);
        } elseif($tt!=''){
            $indexes=db('solution_list')->whereOr('app','like',$tt.'%')->whereOr('industry','like',$tt.'%')->whereOr('brand','like',$tt.'%');
        }else{
            $indexes=db('solution_list');
        }
        $indexes=$indexes->paginate(10,false,['query'=>request()->param()]);
        $this->assign('lst', $indexes);
        $this->assign('index', $select);
        $this->assign('tt', $tt);
        return $this->fetch();
    }

    public function thi_add(){
        $indexes=db('solution_list')->select();
        $this->assign('indexes',$indexes);
        if(request()->isPost()){
            $data=[
                'title'=>input('title'),
                'url'=>input('url'),
                'industry'=>input('industry'),
                'brand'=>input('brand'),
                'app'=>input('app'),
            ];
            $data['time']=date('y-m-d h:i:s',time());
            $data=CateModel::filesave($data,'img');
            if(db('solution_list')->insert($data)){
                $this->success('恭喜添加成功！','/cases/thi_lst');
            }else{
                $this->error('添加失败，请重试！');
            }
        }
        return $this->fetch();
    }

    public function thi_edit(){
        $id=input('id');
        $solution=db('solution_list')->find($id);
        if(request()->isPost()){
            $data=[
                'title'=>input('title'),
                'url'=>input('url'),
                'industry'=>input('industry'),
                'brand'=>input('brand'),
                'app'=>input('app'),
            ];
            $data['time']=date('y-m-d h:i:s',time());
            $data=CateModel::filechange($data,'img',$solution);
            $a=db('solution_list')->where('id',$id)->update($data);
            if($a!==false){
                $this->success('恭喜修改成功！','/cases/thi_lst');
            }else{
                $this->error('修改失败，请重试！');
            }
        }
        $this->assign('solution',$solution);
        return $this->fetch();
    }

    public function thi_del(){
        $id=input('id');
        $solution=db('solution_list')->find($id);
        CateModel::filedel($solution,'img');
        if(db('solution_list')->where('id',$id)->delete()){
            $this->success('删除成功！','/cases/thi_lst');
        }else{
            $this->error('删除失败！');
        }
        return $this->fetch();
    }

    public function mess_lst(){
        $show=db('solution_comment')->paginate(3);
        $this->assign('lst',$show);
        return $this->fetch();
    }

    public function mess_del(){
        $id=input('id');
        if(db('solution_comment')->where('id',$id)->delete()){
            db('solution_video')->where('id',1)->setInc('comment',-1);
            $this->success('删除成功！','/cases/mess_lst');
        }else{
            $this->error('删除失败！');
        }
        return $this->fetch();
    }

    public function page(){
        $honor=db('solution_video')->find();
        $this->assign('honor',$honor);
        $hon=db('solution_img')->find();
        $this->assign('hon',$hon);
        if(request()->isPost()){
            $data1=[
                'poster'=>input('poster'),
                'mp4'=>input('mp4'),
                'flv'=>input('flv'),
            ];
            $data1['time']=date('y-m-d h:i:s',time());
            $a=db('solution_video')->where('id',1)->update($data1);
            $data2=[
                'content1'=>input('content1'),
                'content2'=>input('content2'),
            ];
            $data2['time']=date('y-m-d h:i:s',time());
            $data2=CateModel::filechange($data2,'img_1',$hon);
            $data2=CateModel::filechange($data2,'img_2',$hon);
            $b=db('solution_img')->where('id',1)->update($data2);
            if($a!==false&&$b!==false){
                $this->success('恭喜修改成功！','/cases/page');
            }else{
                $this->error('修改失败，请重试！');
            }
        }
        return $this->fetch();
    }

}
