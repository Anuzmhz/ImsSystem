<?php

namespace App\Model\Transaction\Sales;

use Illuminate\Database\Eloquent\Model;

class SalesH extends Model
{
    protected $table='sales_h';
    protected $fillable = [ 'invoice_no','date','total', 'active','status','user_modified','shop_name','information',];
    public function user_modify(){
        return $this->belongsTo('App\User','user_modified');
    }
}
