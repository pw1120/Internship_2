<?php
namespace app\admin\controller;

use app\admin\model\Cate as CateModel;

class Contact extends Base
{
    public function contact(){
        $show=db('contact_left')->find();
        $this->assign('show',$show);
        if(request()->isPost()){
            $data=[
                'hello'=>input('hello'),
                'content'=>input('content'),
                'name'=>input('name'),
                'number_1'=>input('number_1'),
                'number_2'=>input('number_2'),
                'fax'=>input('fax'),
                'address'=>input('address'),
            ];
            $data['time']=date('y-m-d h:i:s',time());
            $a=db('contact_left')->where('id',1)->update($data);
            if($a!==false){
                $this->success('恭喜修改成功！','/contact/contact');
            }else{
                $this->error('修改失败，请重试！');
            }
        }
        return $this->fetch();
    }

    public function mess_lst(){
        $show=db('contact_message')->order('id desc')->paginate(10);
        $this->assign('lst',$show);
        return $this->fetch();
    }

    public function mess_del(){
        $id=input('id');
        if(db('contact_message')->where('id',$id)->delete()){
            $this->success('删除成功！','/contact/mess_lst');
        }else{
            $this->error('删除失败！');
        }
        return $this->fetch();
    }

}
