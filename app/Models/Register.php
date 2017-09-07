<?php

namespace App\Models;

use App\Libraries\UserAuth;
use App\Services\APIService;
use App\Services\RegisterService;
use Request;
use Users;
use Profiles;

class Register {
    public static function fromRequest($params) {
        $paramsAPI = RegisterService::buildParams($params);

        if ($paramsAPI) {
            $res = (new APIService())->build($paramsAPI)->post('Contacts');

            $user = self::registerUser($params);
            self::registerProfile($user, $res);

            UserAuth::save($user);

            return $res;
        }

        return false;
    }

    public static function registerUser($params) {
        $user = new Users;
        $user->name = $params['first_name'].' '.$params['last_name'];
        $user->email = $params['email'];
        $user->password = md5($params['pass']);
        $user->remember_token = md5(time());
        $user->save();

        return $user;
    }

    public static function registerProfile($user, $arr) {
        $profile = new Profiles;
        $profile->user_id = $user->id;
        $profile->contact_id = $arr->CONTACT_ID;
        //$profile->name = Request::input('name');
        //$profile->username = Request::input('username');
        $profile->first_name = $arr->FIRST_NAME;
        $profile->last_name = $arr->LAST_NAME;
        //$profile->firm = Request::input('firm');
        $profile->street = $arr->ADDRESSES[0]->STREET;
        $profile->postcode = $arr->ADDRESSES[0]->POSTCODE;
        $profile->city = $arr->ADDRESSES[0]->CITY;
        //$profile->phone = Request::input('phone');
        //$profile->phone_1 = Request::input('phone_1');
        $profile->country = $arr->ADDRESSES[0]->COUNTRY;
        $profile->save();
    }
}
