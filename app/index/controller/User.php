<?php
namespace app\index\controller;
use app\index\service\UserService as Service;

class User extends Base
{

    function __construct(Service $service)
    {
        parent::__construct();
        $this->object = $service;
    }


    public function set()
    {
    	return view();
    }
 
    public function down()
    {
        $this->assign( $this->object->down() );
    	return view();
    }

    public function sign()
    {
        return view();
    }

    public function uploads()
    {
        $this->assign( $this->object->uploads() );
        return view();
    }
    
    public function upfile()
    {
        return isPost() ? $this->object->upload() : view();
    }

}
