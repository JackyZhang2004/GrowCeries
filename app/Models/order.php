<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;
    protected $primaryKey = 'orderId';
    protected $table = 'transactionHeader';

    protected $fillable = [
        'orderId',
        'userId',
        'courierId',
        'orderDate',
        'orderStatus',
        'deliveryTime',
        'paymentMethod'
    ];


    public function orderList(){
        return $this->hasMany(orderList::class, 'orderId', 'orderId');
    }

    public function address(){
        return $this->belongsTo(address::class, 'addressId', 'addressId');
    }

    public function refund(){
        return $this->hasOne(refund::class, 'orderId', 'orderId');
    }

}
