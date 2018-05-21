<?php
namespace app\index\service;
use think\Session,
	app\index\model\User;

class LoginService extends BaseService
{

	function __construct()
	{
		parent::__construct();
	}

	//处理登录
	public function login()
	{
		$this->isPost();
    	$param = request()->param();

    	$user  = User::get(['username' => $param['username'] ]);

    	//检测用户是否存在
    	if( is_null($user) ){
    		return [
    			'error'	=>	100,
    			'msg'	=>	'用户名不存在'
    		];
    	}

    	//检测密码是否正确
    	if( $user['password'] != md5($param['password']) ){
    		return [
    			'error'	=>	100,
    			'msg'	=>	'用户名或者密码错误'
    		];	
    	}else{
            Session::set('uid',$user->id);
    		return [
    			'error'	=>	0,
    			'msg'	=>	'登录成功'
    		];
    	}
	}

    //注销
    public function quit()
    {
        Session::delete('uid','think');
        return redirect('login/index');
    }    


}
