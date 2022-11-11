<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $guarded=[];
    
    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
    ];
    
    public function getType()
    {
        if($this->type == 1)
            return 'Daily';
        elseif($this->type == 2)
            return 'Weekly';
        elseif($this->type == 3)
            return 'Monthly';
        elseif($this->type == 4)
            return 'Yearly';
    }
    public function getNatureOfTask()
    {
        if($this->nature_of_task == 1)
            return 'Iteration';
        else
            return 'Dates';
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function weekly_days()
    {
        return $this->hasMany(WeeklyTaskDay::class);
    }
}
