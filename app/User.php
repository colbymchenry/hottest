<?php

namespace App;

use App\Http\AlertHelper;
use DateTime;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Log;

class User extends Authenticatable {
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'dob', 'credits', 'avatar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getModel(): Model {
        return $this->is_model ? new Model($this->id) : null;
    }

    public function isFollowing($model_id) {
        return Follower::where('follower', $this->id)->where('followee', $model_id)->exists();
    }

    public function isSubscribed($model_id) {
        if($this->id == $model_id) return true;
        $latestTransaction = Transaction::getLastPayment($model_id, $this->id);
        if ($latestTransaction == null) return false;
        $now = new DateTime; // or your date as well
        $your_date = new DateTime($latestTransaction->created_at);
        $datediff = $now->diff($your_date);

        $days  = $datediff->format('%a');

        if ($days > 30) {
            return false;
        }

        return true;
    }

    public function follow($model_id) {
        if (!User::where('id', $model_id)->where('is_model', true)->exists()) {
            AlertHelper::alertWarning('Model not found.');
            return redirect('/home');
        }

        if (!$this->isFollowing($model_id)) {
            $following = new Follower();
            $following->follower = $this->id;
            $following->followee = $model_id;
            $following->save();
            return response()->json(['success' => true]);
        }
    }

    public function unFollow($model_id) {
        if (!User::where('id', $model_id)->where('is_model', true)->exists()) {
            AlertHelper::alertWarning('Model not found.');
            return redirect('/home');
        }

        if ($this->isFollowing($model_id)) {
            Follower::where('follower', $this->id)->where('followee', $model_id)->delete();
            return response()->json(['success' => true]);
        }
    }

    public function getAvatar() {
        if($this->avatar == null) return asset('images/defaults/user_logo.png');
        if(!ModelImage::where('id', $this->avatar)->where('for_avatar', true)->exists()) return asset('images/defaults/user_logo.png');
        return ModelImage::where('id', $this->avatar)->where('for_avatar', true)->get()[0]->getLink();
    }

    public function hasAvatar() {
        if($this->avatar == null) return false;
        if(!ModelImage::where('id', $this->avatar)->where('for_avatar', true)->exists()) return false;
        return true;
    }
}
