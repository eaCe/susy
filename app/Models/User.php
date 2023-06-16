<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use QCod\Gamify\Gamify;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, Gamify;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var string[]
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var string[]
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * Delete all activities for the user if the user is deleted.
     */
    public static function boot(): void
    {
        parent::boot();

        static::deleting(function ($user) {
            $user->activities()->delete();
        });
    }

    /**
     * Get the activities for the user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function activities()
    {
        return $this->hasMany(Activity::class);
    }

    /**
     * Get the activities for the user with the activity type.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function activitiesWithTypes()
    {
        return $this->activities()->with([
            'type' => function ($query) {
                return $query->select([
                    'id',
                    'label',
                ]);
            },
        ]);
    }

    /**
     * Get the activities for the user with the activity type, grouped by type.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function groupedActivities()
    {
        return $this->activitiesWithTypes()->get()->groupBy('activity_type_id');
    }
}
