<?php

namespace App;

use DateTime;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class ModelImage extends Model
{
    protected $fillable = ['server_id', 'model_id', 'width', 'height', 'file_name', 'description', 'listed', 'vip', 'tags', 'for_message', 'for_avatar', 'for_banner'];

    public function getServer() {

        return RemoteDataServer::where('id', $this->server_id)->exists() ? RemoteDataServer::where('id', $this->server_id)->get()[0] : null;
    }

    public function getLink() {
        return 'http://' . RemoteDataServer::getIP($this->server_id) . '/images/' . $this->file_name;
    }

    public function getTimeAgo() {
        return $this->time_elapsed_string($this->created_at);
    }

    function time_elapsed_string($datetime, $full = false) {
        $now = new DateTime;
        $ago = new DateTime($datetime);
        $diff = $now->diff($ago);

        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;

        $string = array(
            'y' => 'year',
            'm' => 'month',
            'w' => 'week',
            'd' => 'day',
            'h' => 'hour',
            'i' => 'minute',
            's' => 'second',
        );
        foreach ($string as $k => &$v) {
            if ($diff->$k) {
                $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
            } else {
                unset($string[$k]);
            }
        }

        if (!$full) $string = array_slice($string, 0, 1);
        return $string ? implode(', ', $string) . ' ago' : 'just now';
    }

    public function isLiked() {
        return ImageLike::where('user_id', Auth::user()->id)->where('image_id', $this->id)->exists();
    }

    public function like() {
        if(ImageLike::where('user_id', Auth::user()->id)->where('image_id', $this->id)->exists()) return;
        $imageLike = new ImageLike();
        $imageLike->user_id = Auth::user()->id;
        $imageLike->image_id = $this->id;
        $imageLike->save();
    }

    public function unlike() {
        ImageLike::where('user_id', Auth::user()->id)->where('image_id', $this->id)->delete();
    }
}
