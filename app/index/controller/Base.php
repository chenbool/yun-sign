<?php
namespace app\index\controller;
use think\Controller,
	think\Request,
    think\Session,
    app\index\model\User;

class Base extends Controller
{
    protected $object;
    
	function _initialize()
    {

        if( !Session::has('uid') ){
            $this->redirect('login/index');
        }
        
        $this->assign( 'u_info', User::get(['id' => Session::get('uid') ]) );

	}


    // index
    public function index()
    {
        $this->assign( $this->object->index() ) ;  
        return view();
    }


    public function create()
    {
        $this->assign( $this->object->create() ); 
        return view();
    }


    public function save(Request $request)
    {
        $error = $this->object->save($request);
        if( $error['error'] != 0 ){
            return $this->error($error['msg']);
        }else{
            return $this->success($error['msg'],'index');
        }
    }

    public function edit($id)
    {
        $this->assign( $this->object->edit($id) ); 
        return view();
    }

    public function delete($id)
    {
        $error = $this->object->delete($id);
        if( $error['error'] != 0 ){
            return $this->error($error['msg']);
        }else{
            return $this->success($error['msg'],'index');
        }
    }

    // 空方法
    public function _empty($name)
    {
        return $name.'方法不存在';
    }

}
