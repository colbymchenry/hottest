<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfileReport extends Model
{
    protected $fillable = ['profile_id', 'reason', 'info', 'reporter_id'];

    public $reasons = ['Inappropriate Messages', 'Inappropriate Photos', 'Feels Like Spam', 'Other'];
}
