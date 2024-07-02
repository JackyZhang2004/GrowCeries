<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;
    protected $table = 'transactionHeader';

    protected $primaryKey = 'orderId';

    protected $fillable = [
        'orderId',
        'orderDetailId',
        'userId', 
        'courierId', 
        'orderDate', 
        'orderStatus',
        'deliveryTime'
    ];


    public function orderList(){
        return $this->belongsTo(orderList::class, 'orderDetailId', 'orderDetailId');
    }
}
