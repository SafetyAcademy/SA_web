<?php

namespace App\Services;

class ValidateService {
    public static function getRules() {
        return [
            'email'         => [
                'rule'  => '/^[-\w.]+@([A-z0-9][-A-z0-9]+\.)+[A-z]{2,4}$/',
                'error' => 'Bad email'
            ],
            'pass'          => [
                'rule'  => '/([a-z]+[A-Z]+[0-9]+|[a-z]+[0-9]+[A-Z]+|[A-Z]+[a-z]+[0-9]+|[A-Z]+[0-9]+[a-z]+|[0-9]+[a-z]+[A-Z]+|[0-9]+[A-Z]+[a-z]+)/',
                'error' => 'Bad password'
            ],
            'first_name'    => [
                'rule'  => '/^[a-zA-Z-]{2,255}$/',
                'error' => 'Bad first name'
            ],
            'last_name'     => [
                'rule'  => '/^[a-zA-Z-]{2,255}$/',
                'error' => 'Bad last name'
            ],
            'street'        => [
                'rule'  => '/^[a-zA-Z0-9-.,\s]{1,255}$/',
                'error' => 'Bad street'
            ],
            'city'          => [
                'rule'  => '/^[a-zA-Z0-9-.,\s]{1,255}$/',
                'error' => 'Bad city'
            ],
            'country'       => [
                'rule'  => '/^[a-zA-Z0-9-.,\s]{1,255}$/',
                'error' => 'Bad country'
            ],
            'postcode'      => [
                'rule'  => '/^[0-9]{1,255}$/',
                'error' => 'Bad postcode'
            ]

        ];
    }
}
