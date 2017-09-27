<?php namespace App\Libraries;

use Illuminate\Database\Eloquent\Model as Model;

class User extends Model {
    protected $table = 'users';
    protected $primaryKey = 'user_id';

    public function fullName() {
        $name = $this->name;
        $profile = $this->profile;
        if ($profile) {
            $name = implode(' ', [$profile->first_name, $profile->last_name]);
        }
        return $name;
    }

    public function profile() {
        return $this->hasOne('App\Libraries\Profile', 'user_id', 'user_id');
    }

    public function projects_accesses() {
        return $this->hasMany('App\Libraries\ProjectsAccess', 'user_id', 'user_id');
    }
}
