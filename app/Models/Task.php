<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $fillable = [
            'subject',
            'starting_date',
            'due_date',
            'priority',
            'status',
            'description',
            'user_id',
            'project_id',

    ];

    public function project(){
        return $this->belongsTo(Project::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function getStartingDateAttribute($value){
        return $this->starting_date = date('m/d/Y', strtotime($value));
    }

    public function getDueDateAttribute($value){
        return $this->due_date = date('m/d/Y', strtotime($value));
    }
}
