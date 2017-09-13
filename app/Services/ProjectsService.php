<?php

namespace App\Services;

class ProjectsService extends APIService {
    private static $instance;

    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new ProjectsService();
        }

        return self::$instance;
    }

    public static function getById($id) {
        $endpoint = 'Projects/' . $id;
        $response = self::getInstance()->get($endpoint);
        return $response;
    }

    public static function getAll($filter = '?brief=true&count_total=false&status=not%20started') {
        $endpoint = 'Projects/Search' . $filter;
        $response = self::getInstance()->get($endpoint);

        return $response;
    }
}
