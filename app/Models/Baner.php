<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Baner extends Model
{
    use HasFactory;
    protected  $tabel = 'baners';
    protected  $primaryKey = 'id';
    protected $fillable = ['title', 'url', 'img'];

//    protected $timestamps = false;
}
