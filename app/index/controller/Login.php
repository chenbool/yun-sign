<?php
namespace app\index\controller;
use app\index\service\LoginService as Service;

class Login extends Init
{

    function __construct(Service $service)
    {
        parent::__construct();
        $this->object = $service;
        
    }

    public function login(){
    	return $this->object->login();
    }

    public function quit(){
    	return $this->object->quit();
    }

}
