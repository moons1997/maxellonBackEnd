<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;
    protected  $tabel = 'sections';
    protected  $primaryKey = 'id';
    protected  $fillable = ['category_id', 'type_id', 'title', 'img', 'order'];
}
