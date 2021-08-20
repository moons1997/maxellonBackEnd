<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SectionCard extends Model
{
    use HasFactory;
    protected  $tabel = 'section_cards';
    protected  $primaryKey = 'id';
    protected  $fillable = ['type_id', 'title', 'img', 'order'];
}
