<?php

namespace App\Model\Transaction\Sales;

use Illuminate\Database\Eloquent\Model;

class SalesD extends Model
{
    protected $table = 'sales_d';
    protected $fillable=[
        'id_sales','id_product','total','price',
    ];
    public function sale(){
        return $this->belongsTo('\App\Model\Transaction\SalesH','id_sales');
    }
    public function product(){
        return $this->belongsTo('\App\Model\Master\Product','id_product');
    }
}
