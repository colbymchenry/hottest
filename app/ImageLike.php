<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImageLike extends Model
{
    protected $fillable = ['user_id', 'image_id'];
}
