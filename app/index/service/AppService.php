<?php
namespace app\index\service;
use think\Session,
	Wenpeng\Curl\Curl,
	app\index\model\Account;

class AppService extends BaseService
{

	function __construct()
	{
		parent::__construct();
	}

	public function index(){
		return [
			'account_list'	=>	Account::all( ['uid' => Session::get('uid')] )
		];
	}

	public function sign(){
		$param = request()->param();

		include ROOT_PATH.'/extend/Curl.php';
		$curl = Curl::init();
		
		$info = Account::find([
			'id'	=>	$param['username']
		]);

		$info->username = urlencode($info->username);
		$info->password = urlencode($info->password);

		if( $param['type'] == '1' ){
			$content = urlencode('hi 太逗了 ');
			$url = 'qzone';
			$host = "http://127.0.0.1:5000/{$url}/{$info->username}/{$info->password}/{$content}";
		}

		if( $param['type'] == '2' ){
			$url = 'tieba';
			$host = "http://127.0.0.1:5000/{$url}/{$info->username}/{$info->password}";
			header('Refresh:3,Url='.$host);
		}

		// dump( $curl->url($host) );

		// header('Refresh:3,Url='.url('index'));
	}

}
