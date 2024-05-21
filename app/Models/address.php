<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class address extends Model
{
    use HasFactory;
    protected $table = 'address';
    
    protected $primaryKey = 'addressId';

    protected $fillable = [
        'addressId', 
        'userId', 
        'addressName', 
        'addressDetail', 
        'receiverName', 
        'phoneNumber'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
