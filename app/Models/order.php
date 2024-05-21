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
        'userId', 
        'courierId', 
        'orderDate', 
        'orderStatus'
    ];


    public function orderList(){
        return $this->hasMany(orderList::class, 'orderId', 'orderId');
    }
}
