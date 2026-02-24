<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class TblUser extends Authenticatable
{
    use Notifiable;

    protected $table = 'tbl_user';
    protected $primaryKey = 'id_user';

    protected $keyType = 'int';
    public $incrementing = true;
    public $timestamps = true;

    protected $fillable = [
        'nip',
        'nama_lengkap',
        'email',
        'foto',
        'no_wa',
        'password',
        'institusi_id',
        'nama_role',
        'is_active',
        'verifikasi'
    ];

    protected $hidden = [
        'password'
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * Disable remember token completely
     */
    public function getRememberTokenName()
    {
        return null;
    }
}
