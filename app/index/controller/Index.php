<?php
namespace app\index\controller;
use app\index\service\IndexService as Service;

class Index extends Base
{

    function __construct(Service $service)
    {
        parent::__construct();
        $this->object = $service;
    }

}
