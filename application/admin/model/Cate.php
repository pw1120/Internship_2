<?php
namespace app\admin\model;
use think\Model;
class Cate extends Model
{

    public static function filesave($data,$name){
        if($_FILES[$name]['tmp_name']) {
            $file = request()->file($name);
            $info = $file->move(ROOT_PATH . 'public' . DS . 'static/index/uploads');
            $data[$name] = 'uploads/' . $info->getSaveName();
        }
        return $data;
    }

    public static function filechange($data,$name,$solution){
        $thumb=$_SERVER['DOCUMENT_ROOT'].'/static/index/'.$solution[$name];
        if($_FILES[$name]['tmp_name']){
            if(file_exists($thumb)){
                @unlink($thumb);
            }
            $file=request()->file($name);
            $info = $file->move(ROOT_PATH . 'public' . DS . 'static/index/uploads');
            if($info){
                $data[$name]='uploads/'.$info->getSaveName();
            }
        }else{
            $data[$name]=$solution[$name];
        }
        return $data;
    }

    public static function filedel($solution,$name){
        $thumb=$_SERVER['DOCUMENT_ROOT'].'/static/index/'.$solution[$name];
        if (file_exists($thumb)) {
            @unlink($thumb);
        }
    }

}
