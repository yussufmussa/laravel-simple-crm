<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Project extends Model
{
    use HasFactory;
    protected $fillable = ['title','description', 'status', 'deadline','client_id'];

    public function users(){
        return $this->belongsToMany(User::class);
    }

    public function client(){
        return $this->belongsTo(Client::class);
    }

    
}
