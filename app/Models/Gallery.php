<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'latest_gallery',
        'description',
        'views',
        'likes',
        'link',
        'file_id',
        'mime_type',
        'created_at',

        'name',
        'size',
        'file_time',
    ];

    public function file()
    {
        return $this->belongsTo(File::class);
    }
}
