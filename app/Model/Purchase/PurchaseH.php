<?php

namespace App\Model\Purchase;

use Illuminate\Database\Eloquent\Model;

class PurchaseH extends Model
{
    //
    protected $table = 'purchase_h';
    protected $fillable = [
      'no_invoice','total','id_ven', 'active','status','user_modified','date','information',
        ];
    public function user_modify(){
        return $this->belongsTo('\App\User', 'user_modified');
    }
    public function vendor(){
        return $this->belongsTo('\App\Model\Master\Vendor','id_ven');
    }
}
