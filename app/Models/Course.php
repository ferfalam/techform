<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Support\Facades\Gate;

class Course extends Model
{
    use HasFactory;
    use Authorizable;

    protected $fillable = ['title', 'description','user_id'];

    protected $appends = ['update'];

    protected static function booted()
    {
        static::creating(function ($course) {
            $course->user_id = auth()->id();
        });
    }

    public function getUpdateAttribute()
    {
        if( auth()->user() && $this->user_id === auth()->user()->id){
            return true;
        }else{
            return false;
        }
    }

    public function episodes()
    {
        return $this->hasMany(Episode::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
