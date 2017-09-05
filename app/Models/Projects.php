<?php

namespace App\Models;

class Projects {

    public static function fromAPI() {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($curl, CURLOPT_USERPWD, "d3c58243-768c-4e88-a748-a5356aa6da97:");
        curl_setopt($curl, CURLOPT_HEADER, 0);
        curl_setopt($curl, CURLOPT_URL, 'https://api.insight.ly/v2.2/Projects/Search?brief=true&count_total=false&status=not%20started');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        $out = curl_exec($curl);
        $arr = json_decode($out);

        usort(
            $arr,
            function ($a, $b) {
                if ($a->PROJECT_NAME == $b->PROJECT_NAME) {
                    return 0;
                }
                return ($a->PROJECT_NAME < $b->PROJECT_NAME) ? -1 : 1;
            }
        );

        return $arr;
    }
}
