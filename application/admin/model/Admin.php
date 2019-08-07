<?php
namespace app\admin\model;

use think\Model;
use think\Db;

class Admin extends Model
{

    public function addadmin($data){
        if(empty($data) || !is_array($data)){
            return false;
        }
        if($data['password']){
            $data['password']=$data['password'];
        }
        $adminData=array();
        $adminData['username']=$data['username'];
        $adminData['password']=$data['password'];
        $adminData['time']=date('y-m-d h:i:s',time());
        if($this->save($adminData)){
            $groupAccess['uid']=$this->id;
            $groupAccess['group_id']=$data['group_id'];
            db('auth_group_access')->insert($groupAccess);
            return true;
        }else{
            return false;
        }
    }

    public function getadmin(){
        return $this::order('id asc')->paginate(5);
    }

    public function saveadmin($data,$admins){
        if(!$data['username']){
            return 2;//管理员用户名为空
        }
        if(!$data['password']){
            $data['password']=$admins['password'];
        }else{
            $data['password']=$data['password'];
        }
        db('auth_group_access')->where(array('uid'=>$data['id']))->update(['group_id'=>$data['group_id']]);
        return $this::update(['username'=>$data['username'],'password'=>$data['password'],'time'=>date('y-m-d h:i:s',time()),],['id'=>$data['id'],]);
    }

    public function deladmin($id){
        if($this::destroy($id)){
            return 1;
        }else{
            return 2;
        }
    }

    public function editadmin($data,$admins){
        if(!$data['username']){
            return 2;
        }
        if($data['password1']||$data['password2']){
            if($data['password1']!=$admins['password']){
                return 3;
            }
            if($data['password1']==$data['password2']){
                return 4;
            }
        }
        $data2=[
            'username'=>$data['username'],
            'password'=>$data['password2'],
        ];
        if(!$data['password2']){
            $data2['password']=$admins['password'];
        }else{
            $data2['password']=$data['password2'];
        }
        return $this::update(['username'=>$data2['username'],'password'=>$data2['password'],'time'=>date('y-m-d h:i:s',time()),],['id'=>$data['id'],]);
    }

	public function login($data){
		$captcha = new \think\captcha\Captcha();
        if (!$captcha->check($data['code'])) {
            return 4;
        } 
		$user=Db::name('admin')->where('username','=',$data['username'])->find();
		if($user){
			if($user['password'] == ($data['password'])){
				session('username',$user['username']);
				session('uid',$user['id']);
				return 3; //信息正确
			}else{
				return 2; //密码错误
			}
		}else{
			return 1; //用户不存在
		}
	}

}
