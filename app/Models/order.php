<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;
<<<<<<< Updated upstream
=======
    protected $table = 'transactionHeader';
>>>>>>> Stashed changes
    protected $primaryKey = 'orderId';
    protected $table = 'transactionHeader';
    protected $fillable = [
<<<<<<< Updated upstream
        'userId',
        'courierId',
        'created_at',
        'updated_at',
        'orderStatus',
        'deliveryTime',
        'payment',
        'addressId' 
=======
        'orderId',
        'userId',
        'courierId',
        'orderDate',
        'orderStatus',      
        'deliveryTime',
        'paymentMethod'
>>>>>>> Stashed changes
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
