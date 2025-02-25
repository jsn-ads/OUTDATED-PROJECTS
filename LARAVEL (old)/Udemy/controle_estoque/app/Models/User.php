<?php

namespace App\Models;

use App\Http\Middleware\RedirectIfAuthenticated;
use App\Notifications\RedefirSenhaNotification;
use App\Notifications\VerificarEmailNotification;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

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
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    // metodo utilizado para recuperar senha por email
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new RedefirSenhaNotification($token , $this->email, $this->name));
    }

    public function  sendEmailVerificationNotification()
    {
        $this->notify(new VerificarEmailNotification($this->name));
    }

    //retorna as tarefas desse usuario
    public function tarefas(){
        return $this->hasMany('App\Models\Tarefa','id_user');
    }
}
