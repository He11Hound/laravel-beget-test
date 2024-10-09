<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'active',
    ]; // поля с которыми разрешено работать

    protected  $casts = [
        'active' => 'boolean',
    ]; // преобразует не типичные поля для работы с ними
}
