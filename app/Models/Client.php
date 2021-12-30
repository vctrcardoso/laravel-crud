<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'phone'];

    public function address(){
        return $this->hasOne(Address::class, 'client_id');
    }

    public function projects (){
        return $this->hasMany(Project::class, 'client_id');
    }
}
