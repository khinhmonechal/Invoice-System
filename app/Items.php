<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Items extends Model
{
    protected $fillable = [ 'item_id', 'itemName', 'noOfItems', 'price', 'itemTotal', 'total', 'inv_id'];

    public function invoices(){
    	return $this->belongTo(invoices::class);
    }
}
