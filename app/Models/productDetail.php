<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class productDetail extends Model
{
    use HasFactory;

    protected $table = 'productDetail';
    public $incrementing = true;

    protected $primaryKey = 'productDetailId';

    protected $fillable = [
        'productName',
        'calories',
        'fat',
        'sugar',
        'carbohydrate',
        'protein',
        'shelfLife',
        'productCategory',
        'productDesc',
    ];

    public function product(){
        return $this->belongsTo(product::class, 'productDetailId');
    }
}
