<?php

namespace App\Services;

class RegisterService  {

    public static function buildParams($params) {
        return [
            "SALUTATION" => "",
            "FIRST_NAME" => $params['first_name'],
            "LAST_NAME" => $params['last_name'],
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
                    "STREET" => $params['street'],
                    "CITY" => $params['city'],
                    "STATE" => "",
                    "POSTCODE" => $params['postcode'],
                    "COUNTRY" => $params['country']
                ]
            ],
            "CONTACTINFOS" => [],
            "DATES" => [],
            "TAGS" => [],
            "LINKS" => [],
            "CONTACTLINKS" => [],
            "EMAILLINKS" => []
        ];
    }
}
