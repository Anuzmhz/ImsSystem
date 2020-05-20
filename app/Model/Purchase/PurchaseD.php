<?php

namespace App\Model\Purchase;

use Illuminate\Database\Eloquent\Model;

class PurchaseD extends Model
{
    protected $table = 'purchase_d';
    protected $fillable=[
        'id_purchase','id_product','total','price',
    ];
    public function purchase(){
        return $this->belongsTo('\App\Model\Purchase\PurchaseH','id_purchase');
    }
    public function product(){
        return $this->belongsTo('\App\Model\Master\Product','id_product');
    }
}
