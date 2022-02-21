<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $guard = 'customer';
    protected $fillable=['first_name','last_name','mobile','email'];
    public function orders(){
        return $this->hasMany(Order::class);
    }  
}
