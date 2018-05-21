<?php
namespace app\index\service;
use think\Session,
	// VIPSoft\Unzip\Unzip,
	app\index\model\Order,
	app\index\model\Content,
	app\index\validate\ContentValidate;

class UserService extends BaseService
{

	function __construct()
	{
		parent::__construct();
	}

	public function uploads(){
		return [
			'list'	=>	Content::all(['uid'	=>	Session::get('uid')]),
		];
	}

	//上传操作
	public function upload(){
		$param = request()->param();
		$param['logo'] 		= $this->uploadFile('logo');
		$param['resource']	= $this->uploadFile('resource');
		$param['uid']		= Session::get('uid');
		$type = $param['type'];
		unset($param['type']);
		// $request->except(['type'];
		$this->request 	= $param;
		$this->validate = validate('ContentValidate');
		$this->model 	= new Content();
		$error = $this->_validate( $this->request );
		if( $type == 0 ){
			$this->unzip($param['resource']);
		}

		die( $this->error( $error['msg'] ) );
	}

	// 解压
	public function unzip($file){
        include './extend/Unzip.php';
        $unzipper  = new Unzip();
        $zipFilePath = ROOT_PATH.'/public/uploads/'.$file;
        $extractToThisDir = ROOT_PATH.'/demo/'.date('Ymd').'/'.basename( $zipFilePath );
        $filenames = $unzipper->extract($zipFilePath, $extractToThisDir);
        die();
	}


}
