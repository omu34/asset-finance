<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;

class QuickLinks extends Model
{
    use HasFactory,HasApiTokens;

    protected $fillable=[
        'name',
        'url',
        'image_path'
    ];

    // public static function boot()
    // {
    //     parent::boot();

    //     static::saving(function ($model) {
    //         $model->searchable = DB::raw("to_tsvector('english', coalesce(title, '') || ' ' || coalesce(content, ''))");
    //     });
    // }
}
