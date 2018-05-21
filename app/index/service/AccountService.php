<?php
namespace app\index\service;
use think\Session,
	app\index\model\Account,
	app\index\model\AccountCate,
	app\index\validate\AccountValidate as Validate;

class AccountService extends BaseService
{

	function __construct()
	{
		parent::__construct();
		$this->model = new Account();
		$this->validate = new Validate();
		// $this->validate = validate('AccountValidate');
	}

	public function cate(){
		return AccountCate::all([
			'status'	=>	0
		]);
	}

	public function index(){
		return [
			'list'	=>	$this->model->page()
		];
	}

	public function create(){
		return [
			'cate'	=>	$this->cate()
		];
	}

	public function save($request){
		$data = $request->param();

		// 检测是否存在
		$has = Account::get([
			'username'	=>	$data['username'],
			'uid'		=>	Session::get('uid'),
			'type'		=>	$data['type']
		]);

		if( !is_null($has) ){
			return [
				'error'	=>	100,
				'msg'	=>	'已经添加过此账号'
			];
		}
		
		$data['uid'] = Session::get('uid');
		return $this->_validate( $data );
	}

	public function edit($id){
		return [
			'info'	=>	Account::find($id),
			'cate'	=>	$this->cate()
		];
	}

}
