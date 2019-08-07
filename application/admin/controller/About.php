<?php
namespace app\admin\controller;

use app\admin\model\Cate as CateModel;

class About extends Base
{
    public function why_lst()
    {
        $why=db('about_why')->find();
        $left1=db('about_left')->where('id',1)->find();
        $left2=db('about_left')->where('id',2)->find();
        $this->assign('why',$why);
        $this->assign('left1',$left1);
        $this->assign('left2',$left2);
        if(request()->isPost()){
            $data1=[
                'introduction'=>input('content1'),
            ];
            $data1['time']=date('y-m-d h:i:s',time());
            $data1=CateModel::filechange($data1,'img',$why);
            $wh=db('about_why')->where('id',1)->update($data1);
            $data2=[
                'content'=>input('content2'),
            ];
            $data2['time']=date('y-m-d h:i:s',time());
            $le1=db('about_left')->where('id',1)->update($data2);
            $data3=[
                'content'=>input('content3'),
            ];
            $data3['time']=date('y-m-d h:i:s',time());
            $le2=db('about_left')->where('id',2)->update($data3);
            if($wh&&$le1&&$le2){
                $this->success('恭喜添加成功！','/about/why_lst');
            }else{
                $this->error('添加失败，请重试！');
            }
        }
        return $this->fetch();
    }

    public function hon_lst()
    {
        $honor=db('about_honor')->find();
        $this->assign('honor',$honor);
        if(request()->isPost()){
            $data=[
                'title'=>input('title'),
                'introduction'=>input('content'),
            ];
            $data['time']=date('y-m-d h:i:s',time());
            $files = ['img_1', 'img_2', 'img_3', 'img_4',];
            foreach ($files as $file) {
                $data=CateModel::filechange($data,$file,$honor);
            }
            if(db('about_honor')->where('id',1)->update($data)){
                $this->success('恭喜修改成功！','/about/hon_lst');
            }else{
                $this->error('修改失败，请重试！');
            }
        }
        return $this->fetch();
    }

    public function his_lst(){
        $his=db('about_history')->order('id asc')->paginate(3);
        $this->assign('lst',$his);
        return $this->fetch();
    }

    public function his_add(){
        if(request()->isPost()){
            $data=[
                'titlel'=>input('titlel'),
                'datal'=>input('datal'),
                'contentl'=>input('contentl'),
                'titler'=>input('titler'),
                'datar'=>input('datar'),
                'contentr'=>input('contentr'),
            ];
            $data['time']=date('y-m-d h:i:s',time());
            $data=CateModel::filesave($data,'imgl');
            $data=CateModel::filesave($data,'big_imgl');
            $data=CateModel::filesave($data,'imgr');
            $data=CateModel::filesave($data,'big_imgr');
            if(db('about_history')->insert($data)){
                $this->success('恭喜添加成功！','/about/his_lst');
            }else{
                $this->error('添加失败，请重试！');
            }
        }
        return $this->fetch();
    }

    public function his_edit(){
        $id=input('id');
        $history=db('about_history')->find($id);
        if(request()->isPost()){
            $data=[
                'titlel'=>input('titlel'),
                'datal'=>input('datal'),
                'contentl'=>input('contentl'),
                'titler'=>input('titler'),
                'datar'=>input('datar'),
                'contentr'=>input('contentr'),
            ];
            $data['time']=date('y-m-d h:i:s',time());
            $data=CateModel::filechange($data,'imgl',$history);
            $data=CateModel::filechange($data,'imgr',$history);
            $data=CateModel::filechange($data,'big_imgl',$history);
            $data=CateModel::filechange($data,'big_imgr',$history);
            $a=db('about_history')->where('id',$id)->update($data);
            if($a!==false){
                $this->success('恭喜修改成功！','/about/his_lst');
            }else{
                $this->error('修改失败，请重试！');
            }
        }
        $this->assign('history',$history);
        return $this->fetch();
    }

    public function his_del(){
        $id=input('id');
        $history=db('about_history')->find($id);
        CateModel::filedel($history,'imgl');
        CateModel::filedel($history,'imgr');
        CateModel::filedel($history,'big_imgl');
        CateModel::filedel($history,'big_imgr');
        if(db('about_history')->delete(input('id'))){
            $this->success('删除历程成功！','/about/his_lst');
        }else{
            $this->error('删除历程失败！');
        }
        return $this->fetch();
    }

}
