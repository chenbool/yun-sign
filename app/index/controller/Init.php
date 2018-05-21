<?php
namespace app\index\controller;
use think\Controller,
    think\Request,
    think\Session,
    app\index\model\User,
    app\index\model\Content;

class Init extends Controller
{
    protected $object;
    
    function _initialize()
    {

        // $this->assign([
        //     'category'  => (new CategoryService() )->getAll() ,
        //     'new_list'  =>  ( new Content() )->getNew(),
        //     'top_list'  =>  ( new Content() )->getTop()
        // ]);
        
        $this->assign( 'u_info', User::get(['id' => Session::get('uid') ]) );
    }


    // index
    public function index()
    {
        $this->object->index(); 
        $this->assign( $this->object->index() );
        return view();
    }

    // 空方法
    public function _empty($name)
    {
        return $name.'方法不存在';
    }

}
