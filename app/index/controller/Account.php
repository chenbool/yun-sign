<?php
namespace app\index\controller;
use app\index\service\AccountService as Service;

class Account extends Base
{

    function __construct(Service $service)
    {
        parent::__construct();
        $this->object = $service;
    }


}
