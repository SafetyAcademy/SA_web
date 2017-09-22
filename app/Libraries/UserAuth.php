<?php

namespace App\Libraries;

use Session;
use Profile as Local_Profile;

abstract class UserAuth {
    public static function check() {
        if (Session::has('user')):
            return Session::get('user');
        else:
            return false;
        endif;
    }

    public static function forget() {
        Session::forget('user');

        return false;
    }

    public static function save($user) {
        Session::put('user', $user);
        Session::save();

        return false;
    }

    public static function getUserField($field) {
        if (Session::has('user')) {
            $user = Session::get('user');

            $profile = Local_Profile::where([
                'user_id' => $user['id']
            ])->first();

            return $profile[$field];
        }

        return false;
    }

    public static function getUser() {
        if (Session::has('user')) {
            $user = Session::get('user');

            return $user;
        }

        return false;
    }
}
