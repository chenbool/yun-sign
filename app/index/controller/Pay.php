<?php
namespace app\index\controller;
use app\index\service\PayService as Service;

class Pay extends Base
{

    function __construct(Service $service)
    {
        parent::__construct();
        $this->object = $service;
    }

}
