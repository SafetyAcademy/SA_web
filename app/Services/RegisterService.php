<?php

namespace App\Services;

class RegisterService  {

    public static function buildParams($params) {

        $rules = ValidateService::getRules();
        $errors = [];

        foreach($rules as $k => $r) {
            if (!preg_match($r['rule'], $params[$k])) {
                $errors[$k] = $r['error'];
            }
        }

        return [
            'errors'    => $errors,
            'data'      => [
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
            ]
        ];
    }
}
