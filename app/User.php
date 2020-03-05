<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getFullNameAttribute() {
        return ucfirst($this->first_name) . ' ' . ucfirst($this->last_name);
    }

    public function agencies ()
    {
        return $this->belongsTo(Agency::class, 'id', 'user_id');
    }

    public function agent ()
    {
        return $this->belongsTo(Agent::class, 'id', 'user_id');
    }

    public function isAgent ()
    {
        return $this->agent !== null;
    }

    public function isAgencyAgent (Agency $agency, ?User $user = null)
    {
        $user = $user ?? \Auth::user();

        return $agency->agents()->where([
            ['user_id', '=', $user->id],
            ['agency_id', '=', $agency->id]
        ])->get()->isNotEmpty();
    }

    public function isAgencyOwner (Agency $agency, ?User $user = null)
    {
        $user = $user ?? \Auth::user();

        return $agency->user_id == $user->id;
    }
}
