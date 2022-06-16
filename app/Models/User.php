<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Traits\HasPermissions;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable implements JWTSubject
{
    use HasFactory, Notifiable, HasRoles, HasPermissions;

    protected $guard_name = 'api';

    protected $fillable = [
        'nombres',
        'apellidos',
        'email',
        'password',
        'rut',
        'departamento_id',
        'region_id',
        'cargo_id',
        'email_verified_at',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    public static function traerUsuariosSegunRol($tipo, $buscar, $criterio){

        if($buscar == ''){
            $usuarios = User::whereHas("roles", function($q) use ($tipo){ $q->where("name", $tipo); })->orderBy('id', 'DESC')->paginate(10);
        }else{
            $usuarios = User::whereHas("roles", function($q) use ($tipo){ $q->where("name", $tipo); })->where($criterio, 'like', '%' . $buscar . '%')->orderBy('id', 'DESC')->paginate(10);
        }

        return $usuarios;
    }

    public static function traerTodosUsuarios($buscar){

        if($buscar == ''){
            $usuarios = User::orderBy('id', 'DESC')->paginate(10);
        }else{
            $usuarios = User::where('nombres', 'like', '%' . $buscar . '%')->orderBy('id', 'DESC')->paginate(10);
        }

        return $usuarios;

    }


    public static function getPermisos(){

        $user = Auth::user();
        $user2 = User::findOrFail($user->id);
        $permisos = $user2->getAllPermissions();

        return response()->json([
            'permisos' => $permisos
        ]);
    }



}
