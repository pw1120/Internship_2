<?php
namespace app\index\controller;

use think\Controller;

class Index extends Controller{

    public function index(){
        $title=db('title')->select();
        $this->assign('title',$title);
        $data=db('index_banner')->select();
        $this->assign('data',$data);
        $solu=db('index_solution')->select();
        $this->assign('solu',$solu);
        $introdution=db('index_introdution')->select();
        $this->assign('introdution',$introdution);
        $news=db('index_news')->select();
        $this->assign('news',$news);
        $expert=db('index_expert')->select();
        $this->assign('expert',$expert);
        return $this->fetch();
    }

    public function about(){
        $title=db('title')->select();
        $this->assign('title',$title);
        $why = db('about_why')->select();
        $this->assign('why',$why);
        $left = db('about_left')->select();
        $this->assign('left',$left);
        $honor = db('about_honor')->select();
        $this->assign('honor',$honor);
        $history = db('about_history')->select();
        $this->assign('history',$history);
        return $this->fetch();
    }

    public function solution(){
        $title=db('title')->select();
        $this->assign('title',$title);
        $industry=db('solution')->where('pid',3)->select();
        $this->assign('industry',$industry);
        $app=db('solution')->where('pid',1)->select();
        $this->assign('app',$app);
        $brand=db('solution')->where('pid',2)->select();
        $this->assign('brand',$brand);
        $data=db('solution')->where(array('pid'=>0))->select();
        foreach ($data as $k => $v){
            $data2=db('solution')->where(array('pid'=>$v['id']))->select();
            if($data2){
                $data[$k]['data2']=$data2;
            }else{
                $data[$k]['data2']=0;
            }
        }
        $this->assign('data',$data);
        $request=[];
        $request["id"]=input('id')?input('id'):0;
        $request["pid"] =input('pid')?input('pid'):0;
        $request["pids"] =input('pids')?input('pids'):0;
        $solution_list=db('solution_list');
        $pass=[
            'app_name'=>'',
            'brand_name'=>'',
            'industry_name'=>'',
        ];
        if(!empty( $request["id"])){
            $appArr=db('solution')->where('id', $request["id"])->find();
            $pass['app_name']=$appArr['title'];
            $solution_list= $solution_list->where(array('app'=>$appArr['title']));
        }
        if(!empty( $request["pid"])){
            $brandArr=db('solution')->where('id', $request["pid"])->find();
            $pass['brand_name']=$brandArr['title'];
            $solution_list= $solution_list->where(array('brand'=>$brandArr['title']));
        }
        if(!empty( $request["pids"])){
            $industryArr=db('solution')->where('id', $request["pids"])->find();
            $pass['industry_name']=$industryArr['title'];
            $solution_list= $solution_list->where(array('industry'=>$industryArr['title']));
        }
        $list= $solution_list->paginate(8);
        $this->assign('list',$list);
        $this->assign('pass',$pass);
        $this->assign('request', $request);
        return $this->fetch();
    }

    public function solution_show(){
        $title=db('title')->select();
        $this->assign('title',$title);
        $img=db('solution_img')->find();
        $this->assign('img',$img);
        $video=db('solution_video')->find();
        $this->assign('video',$video);
        $comment=db('solution_comment')->paginate(3);
        $this->assign('comment',$comment);
        if(request()->isPost()){
            if(input('dz')){
                if (db('solution_video')->where('id', 1)->setInc('support',1)) {
                    $da=db('solution_video')->where('id', 1)->find();
                    return $da['support'];
                } else {
                    return 2;
                }
            }
            if(input('sub')){
                $data=[
                    'content'=>input('comment'),
                ];
                if (db('solution_comment')->insert($data)) {
                    db('solution_video')->where('id', 1)->setInc('comment',1);
                    $this->success('发表评论成功！','solution_show');
                } else {
                    $this->error('发表评论失败！');
                }
            }
        }
        return $this->fetch();
    }

    public function product(){
        $title=db('title')->select();
        $this->assign('title',$title);
        $indexes=db('product_indexes')->order('id asc')->select();
        $this->assign('indexes',$indexes);
        $type=input('type');
        $this->assign('type',$type);
        if ($type!='全部'&&$type){
            $list=db('product_list')->where('type',$type)->paginate('3');
            $this->assign('list',$list);
        }else{
            $list=db('product_list')->paginate('3');
            $this->assign('list',$list);
        }
        return $this->fetch();
    }

    public function product02(){
        $title=db('title')->select();
        $this->assign('title',$title);
        $indexes=db('product_indexes')->select();
        $this->assign('indexes',$indexes);
        $id=input('id');
        $list=db('product_list')->where('id',$id)->find();
        $this->assign('list',$list);
        $show=db('product_show')->where('pid',$id)->find();
        $this->assign('show',$show);
        return $this->fetch();
    }

    public function news(){
        $title=db('title')->select();
        $this->assign('title',$title);
        $indexes=db('news_indexes')->select();
        $this->assign('indexes',$indexes);
        $type=input('type');
        $this->assign('type',$type);
        if ($type!='全部'&&$type){
            $list=db('news_list')->order('id desc')->where('type',$type)->select();
            $this->assign('list',$list);
        }else{
            $list=db('news_list')->order('id desc')->select();
            $this->assign('list',$list);
        }
        return $this->fetch();
    }

    public function news_show(){
        $id=input('id');
        $pid=input('pid');
        if($pid){
            $list=db('news_list')->where('id',$pid)->find();
            $show=db('news_show')->where('pid',$pid);
            db('news_show')->where('pid',$pid)->setInc('visit');
        }else{
            $list=db('news_list')->where('id',$id)->find();
            $show=db('news_show')->where('pid',$id);
            db('news_show')->where('pid',$id)->setInc('visit');
        }
        $show=$show->find();
        $this->assign('show',$show);
        $this->assign('list',$list);
        return $this->fetch();
    }

    public function recruitment(){
        $title=db('title')->select();
        $this->assign('title',$title);
        $indexes=db('recruitment_indexes')->select();
        $this->assign('indexes',$indexes);
        $type=input('type');
        $this->assign('type',$type);
        if ($type!='全部'&&$type){
            $list=db('recruitment_list')->where('type',$type)->select();
            $this->assign('list',$list);
        }else{
            $list=db('recruitment_list')->select();
            $this->assign('list',$list);
        }
        return $this->fetch();
    }

    public function recruitment_show(){
        $id=input('id');
        $list=db('recruitment_list')->where('id',$id)->find();
        $this->assign('list',$list);
        $show=db('recruitment_show')->where('pid',$id)->find();
        $this->assign('show',$show);
        return $this->fetch();
    }

    public function contact(){
        $cleft=db('contact_left')->select();
        $this->assign('cleft',$cleft);
        if(request()->isPost()){
            $data=[
                'name'=>input('name'),
                'number'=>input('number'),
                'message'=>input('message'),
            ];
            $data['time']=date('y-m-d h:i:s',time());
            if(!captcha_check(input('code'))){
                $this->error('验证码错误！');
            }else{
                if(db('contact_message')->insert($data)){
                    $this->success('提交成功！','contact');
                }else{
                    $this->error('提交失败！');
                }
            }
        }
        return $this->fetch();
    }

}