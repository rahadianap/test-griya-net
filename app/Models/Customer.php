<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Authenticatable
{
    use SoftDeletes;

    protected $table = 'customers';

    protected $fillable = [
        'nama_customer',
        'nomor_telepon',
        'alamat',
        'nama_paket',
        'foto_ktp',
        'foto_rumah',
        'created_by',
        'status'
    ];
}
