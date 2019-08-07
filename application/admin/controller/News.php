<?php
namespace app\admin\controller;

use app\admin\model\Cate as CateModel;

class News extends Base
{
    public function ind_lst()
    {
        $indexes=db('news_indexes')->order('id asc')->paginate(3);
        $this->assign('lst',$indexes);
        return $this->fetch();
    }

    public function ind_add(){
        if(request()->isPost()){
            $data=[
                'type'=>input('type'),
            ];
            $data['time']=date('y-m-d h:i:s',time());
            if(db('news_indexes')->insert($data)){
                $this->success('恭喜添加成功！','/news/ind_lst');
            }else{
                $this->error('添加失败，请重试！');
            }
        }
        return $this->fetch();
    }

    public function ind_edit(){
        $id=input('id');
        $solution=db('news_indexes')->find($id);
        if(request()->isPost()){
            $data=[
                'type'=>input('type'),
            ];
            $data['time']=date('y-m-d h:i:s',time());
            $a=db('news_indexes')->where('id',$id)->update($data);
            if($a!==false){
                $this->success('恭喜修改成功！','/news/ind_lst');
            }else{
                $this->error('修改失败，请重试！');
            }
        }
        $this->assign('solution',$solution);
        return $this->fetch();
    }

    public function ind_del(){
        $id=input('id');
        if(db('news_indexes')->delete(input('id'))){
            $this->success('删除成功！','/news/ind_lst');
        }else{
            $this->error('删除失败！');
        }
        return $this->fetch();
    }

    public function thi_lst()
    {
        $indexes=db('news_list')->order('id asc')->paginate(3);
        $this->assign('lst',$indexes);
        return $this->fetch();
    }

    public function thi_add(){
        $indexes=db('news_indexes')->select();
        $this->assign('indexes',$indexes);
        if(request()->isPost()){
            $data=[
                'title'=>input('title'),
                'url'=>input('url'),
                'type'=>input('type'),
                'content'=>input('content'),
                'data'=>date('Y-m-d',time()),
            ];
            if($data['type']=="请选择"){
                $data['type']="";
            }
            $data['time']=date('y-m-d h:i:s',time());
            $data=CateModel::filesave($data,'img');
            $last=db('news_list')->order('id desc')->limit(1)->find();
            $first=db('news_list')->order('id asc')->limit(1)->find();
            if(db('news_list')->insert($data)){
                db('news_show')->where('pid',$first['id'])->update(array('time'=>$data['time'],'before'=>$data['title'],));
                db('news_show')->where('pid',$last['id'])->update(array('time'=>$data['time'],'last'=>$data['title'],));
                $la=db('news_list')->order('id desc')->limit(1)->find();
                db('news_show')->insert(array('pid'=>$la['id'],'before'=>$last['title'],'last'=>$first['title'],'time'=>$data['time'],));
                $this->success('恭喜添加成功！','/news/thi_lst');
            }else{
                $this->error('添加失败，请重试！');
            }
        }
        return $this->fetch();
    }

    public function thi_edit(){
        $indexes=db('news_indexes')->select();
        $this->assign('indexes',$indexes);
        $id=input('id');
        $solution=db('news_list')->find($id);
        if(request()->isPost()){
            $data=[
                'title'=>input('title'),
                'url'=>input('url'),
                'type'=>input('type'),
                'content'=>input('content'),
                'data'=>input('data'),
            ];
            if($data['type']=="请选择"){
                $data['type']="";
            }
            $data['time']=date('y-m-d h:i:s',time());
            $data=CateModel::filechange($data,'img',$solution);
            $a=db('news_list')->where('id',$id)->update($data);
            if($a!==false){
                $last=db('news_list')->order('id desc')->limit(1)->find();
                $first=db('news_list')->order('id asc')->limit(1)->find();
                $las_id=$last['id'];
                $fir_id=$first['id'];
                if($id==$fir_id){
                    $firsts=db('news_show')->order('pid asc')->limit(1,1)->select();
                    db('news_show')->where('pid',$firsts[0]['pid'])->update(array('time'=>$data['time'],'before'=>$data['title'],));
                    $lasts=db('news_show')->order('pid desc')->limit(1)->find();
                    db('news_show')->where('pid',$lasts['pid'])->update(array('time'=>$data['time'],'last'=>$data['title'],));
                }elseif($id==$las_id){
                    $firsts=db('news_show')->order('pid asc')->limit(1)->find();
                    db('news_show')->where('pid',$firsts['pid'])->update(array('time'=>$data['time'],'before'=>$data['title'],));
                    $lasts=db('news_show')->order('pid desc')->limit(1,1)->select();
                    db('news_show')->where('pid',$lasts[0]['pid'])->update(array('time'=>$data['time'],'last'=>$data['title'],));
                }else{
                    $firsts=db('news_show')->where('pid < '.$id.'')->order('pid desc')->limit(1)->find();
                    db('news_show')->where('pid',$firsts['pid'])->update(array('time'=>$data['time'],'last'=>$data['title'],));
                    $lasts=db('news_show')->where('pid > '.$id.'')->order('pid asc')->limit(1)->find();
                    db('news_show')->where('pid',$lasts['pid'])->update(array('time'=>$data['time'],'before'=>$data['title'],));
                }
                $this->success('恭喜修改成功！','/news/thi_lst');
            }else{
                $this->error('修改失败，请重试！');
            }
        }
        $this->assign('solution',$solution);
        return $this->fetch();
    }

    public function thi_del(){
        $id=input('id');
        $solution=db('news_list')->find($id);
        CateModel::filedel($solution,'img');
        if(db('news_list')->where('id',$id)->delete()){
            $last=db('news_list')->order('id desc')->limit(1)->find();
            $first=db('news_list')->order('id asc')->limit(1)->find();
            $las_id=$last['id'];
            $fir_id=$first['id'];
            if($id==$fir_id){
                $firsts=db('news_show')->order('pid asc')->limit(1,1)->select();
                $firstl=db('news_list')->order('id desc')->limit(1)->find();
                db('news_show')->where('pid',$firsts[0]['pid'])->update(array('before'=>$firstl['title'],));
                $lasts=db('news_show')->order('pid desc')->limit(1)->find();
                $lastl=db('news_list')->order('id asc')->limit(1)->find();
                db('news_show')->where('pid',$lasts['pid'])->update(array('last'=>$lastl['title'],));
            }elseif($id==$las_id){
                $firsts=db('news_show')->order('pid asc')->limit(1)->find();
                $firstl=db('news_list')->order('id desc')->limit(1)->find();
                db('news_show')->where('pid',$firsts['pid'])->update(array('before'=>$firstl['title'],));
                $lasts=db('news_show')->order('pid desc')->limit(1,1)->select();
                $lastl=db('news_list')->order('id asc')->limit(1)->find();
                db('news_show')->where('pid',$lasts[0]['pid'])->update(array('last'=>$lastl['title'],));
            }else{
                $firsts=db('news_show')->where('pid < '.$id.'')->order('pid desc')->limit(1)->find();
                $firstl=db('news_list')->where('id > '.$id.'')->order('id asc')->limit(1)->find();
                db('news_show')->where('pid',$firsts['pid'])->update(array('last'=>$firstl['title'],));
                $lasts=db('news_show')->where('pid > '.$id.'')->order('pid asc')->limit(1)->find();
                $lastl=db('news_list')->where('id < '.$id.'')->order('id desc')->limit(1)->find();
                db('news_show')->where('pid',$lasts['pid'])->update(array('before'=>$lastl['title'],));
            }
            db('news_show')->where('pid',$id)->delete();
            $this->success('删除成功！','/news/thi_lst');
        }else{
            $this->error('删除失败！');
        }
        return $this->fetch();
    }

    public function mess(){
        $id=input('id');
        $show=db('news_show')->where('pid',$id)->find();
        $this->assign('show',$show);
        if(request()->isPost()){
            $data=[
                'content'=>input('content'),
                'before'=>input('before'),
                'last'=>input('last'),
            ];
            $data['time']=date('y-m-d h:i:s',time());
            $a=db('news_show')->where('pid',$id)->update($data);
            if($a!==false){
                $this->success('恭喜修改成功！','/news/thi_lst');
            }else{
                $this->error('修改失败，请重试！');
            }
        }
        return $this->fetch();
    }

}
