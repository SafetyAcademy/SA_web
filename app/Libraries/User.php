<?php namespace App\Libraries;

use Illuminate\Database\Eloquent\Model as Model;

class User extends Model {
    protected $table = 'users';

    public function profile() {
        return $this->hasOne('App\Libraries\Profile', 'user_id', 'user_id');
    }

    public function projects_accesses() {
        return $this->hasMany('App\Libraries\ProjectsAccess');
    }
}
