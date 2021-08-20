<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;
    protected  $tabel = 'cars';
    protected  $primaryKey = 'id';
    protected  $fillable = ['sub_title', 'title', 'info', 'img_visible', 'img_hiddin'];
}
