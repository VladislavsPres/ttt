<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description', 'filename', 'gallery_id', 'user_id'
    ];

    public function gallery()
    {
        return $this->belongsTo(Gallery::class);
    }
}
