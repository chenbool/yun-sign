<?php
namespace app\index\controller;
use app\index\service\AppService as Service;

class App extends Base
{

    function __construct(Service $service)
    {
        parent::__construct();
        $this->object = $service;
    }

	public function sign(){
		$this->object->sign();
	}

}
