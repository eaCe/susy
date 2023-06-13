<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $fillable = [
        'activity_type_id',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function type()
    {
        return $this->hasOne(ActivityType::class, 'id', 'activity_type_id');
    }

    public function getPoints()
    {
        return $this->type->points ?? 0;
    }
}
