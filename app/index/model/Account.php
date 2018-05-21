<?php
namespace app\index\model;
use think\Model,
	think\Session;

class Account extends Base
{
	protected $pk = 'id';

    public function findCate()
    {
    	return $this->belongsTo('\app\index\model\AccountCate','type','id');
    }


    public function page(){
        $request = request();
        $data = $request->param();

        if( isset($data['keyword']) ){
            $this->where['title'] = ['like','%'.$data['keyword'].'%' ];
        }

        //封装where查询条件 循环生成条件
        foreach ($data as $k => $v) {
            if( !is_null($v) && !empty($v) ){
                $this->where[$k] = $v;
                $this->where[$k] = ['like','%'.$v.'%' ];
            }
        }

        $this->where['uid'] = Session::get('uid');
        unset($this->where['page']);

        return $this
            // ->field( $this->field )
            ->where($this->where)
            ->order($this->order)
            ->paginate( $this->pageNum );     
    }   

}

