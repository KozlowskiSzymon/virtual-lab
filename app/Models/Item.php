<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'model',
        'description',
        'image',
        'quantity',
        'url',
        'available'];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function keywords()
    {
        return $this->belongsToMany(Keyword::class);
    }

    public function getKeywordsIdsAttribute()
    {
        return $this->keywords()->pluck('keyword_id');
    }
}
