<?php

namespace App\Models;

use Request;
use Users;
use Profiles;

class Register {
    public static function fromRequest() {
        $params = [
            "SALUTATION" => "",
            "FIRST_NAME" => Request::input('first_name'),
            "LAST_NAME" => Request::input('last_name'),
            "BACKGROUND" => "",
            "IMAGE_URL" => "",
            "DEFAULT_LINKED_ORGANISATION" => "",
            "VISIBLE_TO" => "",
            "VISIBLE_TEAM_ID" => "",
            "VISIBLE_USER_IDS" => "",
            "CUSTOMFIELDS" => [],
            "ADDRESSES" => [
                [
                    "ADDRESS_TYPE" => "Primary",
                    "STREET" => Request::input('street'),
                    "CITY" => Request::input('city'),
                    "STATE" => "",
                    "POSTCODE" => Request::input('postcode'),
                    "COUNTRY" => Request::input('country')
                ]
            ],
            "CONTACTINFOS" => [],
            "DATES" => [],
            "TAGS" => [],
            "LINKS" => [],
            "CONTACTLINKS" => [],
            "EMAILLINKS" => []
        ];

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($curl, CURLOPT_USERPWD, "03abf8d9-4a62-40b2-a102-7ad66ff12d78:");
        curl_setopt($curl, CURLOPT_HEADER, 0);
        curl_setopt($curl, CURLOPT_URL, 'https://api.insight.ly/v2.1/Contacts');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($params));
        $out = curl_exec($curl);
        $arr = json_decode($out);
        curl_close($curl);

        return $arr;
    }

    public static function registerUser() {
        $user = new Users;
        $user->email = Request::input('email');
        $user->password = md5(Request::input('pass'));
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
        $profile->first_name = Request::input('first_name');
        $profile->last_name = Request::input('last_name');
        //$profile->firm = Request::input('firm');
        $profile->street = Request::input('street');
        $profile->postcode = Request::input('postcode');
        $profile->city = Request::input('city');
        //$profile->phone = Request::input('phone');
        //$profile->phone_1 = Request::input('phone_1');
        $profile->country = Request::input('country');
        $profile->save();
    }
}
