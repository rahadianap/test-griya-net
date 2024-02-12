<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;

class PaketPenjualan extends Authenticatable
{
    use SoftDeletes;

    protected $table = 'paket_penjualan';

    protected $fillable = [
        'nama_paket',
        'harga_paket'
    ];
}
