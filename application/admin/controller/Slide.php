<?php
namespace app\admin\controller;

use think\Loader;

class Slide extends Base
{

    public function lst()
    {
        $list =db('index_banner')->order('id asc')->paginate(3);
        $this->assign('list',$list);
        return $this->fetch();
    }

    public function add()
    {
        if(request()->isPost()){
            $data=[
                'img'=>input('img'),
            ];
            $data['time']=date('y-m-d h:i:s',time());
            if($_FILES['img']['tmp_name']){
                $file = request()->file('img');
                $info = $file->rule('test')->move(ROOT_PATH . 'public' . DS . 'static/index/uploads');
                $data['img']='uploads/'.$info->getSaveName();
            }
            $save=db('index_banner')->insert($data);
            if($save !== false){
                $this->success('添加成功！','/slide/lst');
            }else{
                $this->error('添加失败！');
            }
        }
        return $this->fetch();
    }

    public function edit(){
        $id=input('id');
        $data=db('index_banner')->where('id',$id)->find();
        $this->assign('data',$data);
        if(request()->isPost()){
            $slide['time']=date('y-m-d h:i:s',time());
            $thumb=$_SERVER['DOCUMENT_ROOT'].'/static/index/'.$data['img'];
            if(file_exists($thumb)){
                @unlink($thumb);
            }
            $file=request()->file('img');
            if($file){
                $info = $file->move(ROOT_PATH . 'public' . DS . 'static/index/uploads');
                if($info){
                    $slide['img']='uploads/'.$info->getSaveName();
                }
            }
            $save=db('index_banner')->where('id',$id)->update($slide);
            if($save !== false){
                $this->success('修改成功！','/slide/lst');
            }else{
                $this->error('修改失败！');
            }
        }
        return $this->fetch();
    }

    public function del(){
        $id=input('id');
        $data=db('index_banner')->where('id',$id)->find();
        $thumb=$_SERVER['DOCUMENT_ROOT'].'/static/index/'.$data['img'];
        if(file_exists($thumb)) {
            @unlink($thumb);
        }
        $die=db('index_banner')->delete($id);
        if($die){
            $this->success('删除图片成功！','/slide/lst');
        }else {
            $this->error('删除图片失败！');
        }
        return $this->fetch();
    }

}
