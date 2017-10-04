<?php

namespace App\Services;

class ProjectAcceptService extends APIService {

    public static function buildParams($params) {
        return [
            'CONTACT_ID' => $params['contact_id'],
            'PROJECT_ID' => $params['project_id']
        ];
    }
}
