<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'name', 'user_id', 'status'];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
