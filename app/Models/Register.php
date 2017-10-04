<?php

namespace App\Models;

use Illuminate\Database\QueryException;
use Mockery\Exception;
use UserAuth;
use APIService;
use RegisterService;
use Request;
use User;
use Profile;

class Register {
    public static function fromRequest($params) {

        if (empty(RegisterService::buildParams($params)['errors'])) {
            $paramsAPI = RegisterService::buildParams($params)['data'];

            if ($paramsAPI) {
                $res = (new APIService())->build($paramsAPI)->post('Contacts');

                $user = self::registerUser($params);
                self::registerProfile($user, $res);

                UserAuth::save($user);

                return $res;
            }
        }

        return RegisterService::buildParams($params);
    }

    public static function registerUser($params) {
        $user = new User;

        try {
            $user->name = $params['first_name'].' '.$params['last_name'];
            $user->email = $params['email'];
            $user->password = md5($params['pass']);
            $user->remember_token = md5(time());
            $user->save();
        } catch(\Exception $e) {
            throw $e;
        }

        return $user->fresh();
    }

    public static function registerProfile($user, $arr) {
        $profile = new Profile;
        $profile->user_id = $user->user_id;
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
