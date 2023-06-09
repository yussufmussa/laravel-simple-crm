<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'company',
        'vat',
        'email',
        'phone_number',
        'address',
        'website',
        
    ];

    public function projects(){
        return $this->hasMany(Project::class);
    }
}
