<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelPage extends Model
{
    protected $fillable = ['user_id', 'avatar', 'banner', 'greeting', 'preview_images'];

}
