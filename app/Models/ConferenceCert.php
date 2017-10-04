<?php

namespace App\Models;

use Barryvdh\DomPDF\Facade as PDF;

class ConferenceCert extends PDF {

    public static function fromRequest($params) {
        return PDF::loadHTML($params['name'] . ' completed the course ' . $params['project_id']);
    }
}
