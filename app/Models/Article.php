<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'active',
        'preview_image',
        'detail_image',
        'preview_text',
        'detail_text',
        'tags',
        'category_id',
    ]; // поля с которыми разрешено работать

    protected $casts = [
        'tags' => 'json',
        'active' => 'boolean',
    ]; // преобразует не типичные поля для работы с ними

    public function getFormattedUpdatedAtAttribute()
    {
        return Carbon::parse($this->updated_at)->translatedFormat('j F Y');
    }

    public function category() {
        return $this->belongsTo(ArticleCategory::class);
    }

}
