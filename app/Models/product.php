<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $table = 'product';

    protected $primaryKey = 'productId';

    protected $fillable = [
        'productDetailId',  
        'productPrice',
        'stock',
        'variant',
    ];

    public function productDetail(){
        return $this->hasOne(productDetail::class, 'productDetailId', 'productDetailId');
    }
}
