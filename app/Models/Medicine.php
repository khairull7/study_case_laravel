<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    use HasFactory;
    
    //property yang digunakan untuk menyimpan nama-nama column yang bisa diisi valuenya
    protected $fillable = [
        'type',
        'name',
        'price',
        'stock',
    ];
}
