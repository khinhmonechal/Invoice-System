<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoices extends Model
{
    protected $fillable = [ 'invoiceName', 'noOfItems', 'invoiceTotal','created_at','updated_at'];

    public function items(){
    	return $this->hasMany(items::class);
    }    
}
