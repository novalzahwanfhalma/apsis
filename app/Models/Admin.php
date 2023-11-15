<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Traits\LockableTrait;

class Admin extends Authenticatable
{
    use HasFactory, Notifiable;
    use LockableTrait;

    // To make sure the table use in database
    protected $table = 'admin';

    // to make sure the field in table
    protected $primaryKey = 'id_admin';
    
    protected $guard = "admin";
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    public function survei()
    {
    return $this->hasMany(Survei::class, 'id_admin'); 
    }
}
