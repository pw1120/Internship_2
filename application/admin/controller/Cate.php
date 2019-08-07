<?php
namespace app\admin\controller;

use app\admin\model\Cate as CateModel;

class Cate extends Base
{
    public function case_lst()
    {
        $lst=db('index_solution')->field('name,id')->paginate(3);
        $this->assign('lst',$lst);
        return $this->fetch();
    }

    public function case_add(){
        if(request()->isPost()){
            $data=[
                'name'=>input('name'),
                'web_1'=>input('web_1'),
                'img_1'=>input('img_1'),
                'web_2'=>input('web_2'),
                'img_2'=>input('img_2'),
                'web_3'=>input('web_3'),
                'img_3'=>input('img_3'),
                'web_4'=>input('web_4'),
                'img_4'=>input('img_4'),
                'web_5'=>input('web_5'),
                'img_5'=>input('img_5'),
                'web_6'=>input('web_6'),
                'img_6'=>input('img_6'),
                'web_7'=>input('web_7'),
                'img_7'=>input('img_7'),
                'web_8'=>input('web_8'),
                'img_8'=>input('img_8'),
            ];
            $data['time']=date('y-m-d h:i:s',time());
            $files = ['img_1', 'img_2', 'img_3', 'img_4', 'img_5', 'img_6', 'img_7', 'img_8',];
            foreach ($files as $file) {
                $data=CateModel::filesave($data,$file);
            }
            if(db('index_solution')->insert($data)){
                $this->success('恭喜添加成功！','/cate/case_lst');
            }else{
                $this->error('添加失败，请重试！');
            }
        }
        return $this->fetch();
    }

    public function case_edit(){
        $id=input('id');
        $solution=db('index_solution')->find($id);
        if(request()->isPost()){
            $data=[
                'name'=>input('name'),
                'web_1'=>input('web_1'),
                'img_1'=>input('img_1'),
                'web_2'=>input('web_2'),
                'img_2'=>input('img_2'),
                'web_3'=>input('web_3'),
                'img_3'=>input('img_3'),
                'web_4'=>input('web_4'),
                'img_4'=>input('img_4'),
                'web_5'=>input('web_5'),
                'img_5'=>input('img_5'),
                'web_6'=>input('web_6'),
                'img_6'=>input('img_6'),
                'web_7'=>input('web_7'),
                'img_7'=>input('img_7'),
                'web_8'=>input('web_8'),
                'img_8'=>input('img_8'),
            ];
            $data['time']=date('y-m-d h:i:s',time());
            $files = ['img_1', 'img_2', 'img_3', 'img_4', 'img_5', 'img_6', 'img_7', 'img_8',];
            foreach ($files as $file) {
                $data=CateModel::filechange($data,$file,$solution);
            }
            $a=db('index_solution')->where('id',$id)->update($data);
            if($a!==false){
                $this->success('恭喜修改成功！','/cate/case_lst');
            }else{
                $this->error('修改失败，请重试！');
            }
        }
        $this->assign('solution',$solution);
        return $this->fetch();
    }

    public function case_del(){
        $id=input('id');
        $solution=db('index_solution')->find($id);
        $files = ['img_1', 'img_2', 'img_3', 'img_4', 'img_5', 'img_6', 'img_7', 'img_8',];
        foreach ($files as $file) {
            CateModel::filedel($solution,$file);
        }
        if(db('index_solution')->delete(input('id'))){
            $this->success('删除方案成功！','/cate/case_lst');
        }else{
            $this->error('删除方案失败！');
        }
        return $this->fetch();
    }

    public function syno_lst(){
        $introdution=db('index_introdution')->find();
        $this->assign('introdution',$introdution);
        if(request()->isPost()){
            $data=[
                'title'=>input('title'),
                'translate'=>input('translate'),
                'content'=>input('content'),
            ];
            $data['time']=date('y-m-d h:i:s',time());
            $data=CateModel::filechange($data,'img',$introdution);
            $save=db('index_introdution')->where('id',1)->update($data);
            if($save !== false){
                $this->success('修改成功！','/cate/syno_lst');
            }else{
                $this->error('修改失败！');
            }
        }
        return $this->fetch();
    }

    public function news_lst(){
        $news=db('index_news')->find();
        $this->assign('news',$news);
        if(request()->isPost()){
            $data=[
                'name'=>input('name'),
                'content'=>input('content'),
            ];
            $data['time']=date('y-m-d h:i:s',time());
            $data=CateModel::filechange($data,'img',$news);
            $save=db('index_news')->where('id',1)->update($data);
            if($save !== false){
                $this->success('修改成功！','/cate/news_lst');
            }else{
                $this->error('修改失败！');
            }
        }
        return $this->fetch();
    }

    public function expe_lst(){
        $expert=db('index_expert')->paginate(3);
        $this->assign('lst',$expert);
        return $this->fetch();
    }

    public function expe_add(){
        if(request()->isPost()){
            $data=[
                'name'=>input('name'),
                'profession'=>input('profession'),
            ];
            $data['time']=date('y-m-d h:i:s',time());
            $data=CateModel::filesave($data,'img');
            $data=CateModel::filesave($data,'code');
            $save=db('index_expert')->insert($data);
            if($save !== false){
                $this->success('添加成功！','/cate/expe_lst');
            }else{
                $this->error('添加失败！');
            }
        }
        return $this->fetch();
    }

    public function expe_edit(){
        $expert=db('index_expert')->find(input('id'));
        $this->assign('expert',$expert);
        if(request()->isPost()){
            $data=[
                'name'=>input('name'),
                'profession'=>input('profession'),
            ];
            $data['time']=date('y-m-d h:i:s',time());
            $data=CateModel::filechange($data,'img',$expert);
            $data=CateModel::filechange($data,'code',$expert);
            $save=db('index_expert')->where('id',input('id'))->update($data);
            if($save !== false){
                $this->success('修改成功！','/cate/expe_lst');
            }else{
                $this->error('修改失败！');
            }
        }
        return $this->fetch();
    }

    public function expe_del(){
        $id=input('id');
        $solution=db('index_expert')->find($id);
        CateModel::filedel($solution,'img');
        CateModel::filedel($solution,'code');
        if(db('index_expert')->delete(input('id'))){
            $this->success('删除专家成功！','/cate/expe_lst');
        }else{
            $this->error('删除专家失败！');
        }
        return $this->fetch();
    }

}
