<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Spatie\Permission\Traits\HasRoles;
use Hash;
use App\Notification;
use App\Personnel;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','prenom','email','phone','photo','direction_id','password','uuid'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = Hash::make($password);
    }

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function personnels()
    {
        return $this->hasMany(Personnel::class, 'created_by', 'id');
    }

    public function direction()
    {
        return $this->belongsTo(Direction::class);
    }

    public function directions()
    {
        return $this->belongsToMany(Direction::class, 'direction_user', 'user_id', 'direction_id');
    }
}
