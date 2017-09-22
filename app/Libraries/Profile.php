<?php namespace App\Libraries;

use Illuminate\Database\Eloquent\Model as Model;

class Profile extends Model {
    protected $table = 'profiles';

    public function user() {
        return $this->belongsTo('App\Libraries\User', 'user_id', 'user_id');
    }
}
