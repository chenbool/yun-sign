<?php
namespace app\index\validate;
use think\Validate;

class AccountValidate extends Validate
{
    protected $rule = [
        'username'      =>  'require|max:25',
        'password'      =>  'require|max:25',
        'desc'      	=>  'max:100'
    ];

    protected $message  =   [
        'username.require'      =>  '账号必填',
        'username.max'          =>  '账号最多不能超过25个字符',
        'password.require'      =>  '密码必填',
        'password.max'          =>  '密码最多不能超过25个字符',
        'desc.max'          =>  '备注最多不能超过100个字符'
    ];
}
