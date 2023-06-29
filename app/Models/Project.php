<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Project extends Model
{
    use HasFactory;
    protected $fillable = ['title','description', 'status', 'deadline','client_id', 'starting_date', 'hourly_rate', 'fixed_rate'];

    public function users(){
        return $this->belongsToMany(User::class);
    }

    public function client(){
        return $this->belongsTo(Client::class);
    }

    public function tasks(){
        return $this->hasMany(Task::class);
    }

    
}
