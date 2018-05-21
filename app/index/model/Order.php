<?php
namespace app\index\model;
use think\Model;

class Order extends Model
{
	protected $pk = 'id';

    public function findUser()
    {
        return $this->hasOne('\app\index\model\User','uid','id');
    }


    public function findContent()
    {
    	return $this->belongsTo('\app\index\model\Content','cid','id');
        // return $this->hasOne('\app\index\model\Content','cid','id');
    }

}

