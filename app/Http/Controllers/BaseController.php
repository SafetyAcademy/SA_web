<?php

namespace App\Http\Controllers;

use Register;
use Conference;
use Project;
use Projects;
use Request;
use Profiles;
use Users;
use UserAuth;
use ProjectsAccess;

class BaseController extends Controller {
    public function index() {
        $arr = array_slice(Projects::fromAPI(), 0, 3);
        $conferenceSlice = [];

        foreach ($arr as $k => $a) {
            array_push($conferenceSlice, Conference::fromObject($arr[$k]));
        }

        return view('index', ['conference_slice' => $conferenceSlice]);
    }

    public function sign_in() {
        $email = Request::input('email');
        $password = Request::input('password');

        $error = false;

        if (!empty($email) && !empty($password)) {
            $user = Users::where([
                'email' => $email,
                'password' => md5($password)
            ])->first();

            if ($user) {
                UserAuth::save($user);

                return redirect('/');
            } else {
                $error = true;

                return view('sign_in', ['error' => $error]);
            }
        }

        return view('sign_in', ['error' => $error]);
    }

    public function sign_up() {
        return view('sign_up', []);
    }

    public function register() {
        $param = Request::only(['email', 'pass', 'first_name', 'last_name', 'street', 'city', 'country', 'postcode']);
        if (Register::fromRequest($param)) {
            return view('success', []);
        }  else {
            $error = true;
            return view('sign_up', ['error' => $error]);
        }
    }

    public function logout() {
        UserAuth::forget();

        return redirect('/');
    }

    public function conferenceAll() {
        $page = Request::input('page');
        if (empty($page)) {
            $page = 1;
            $prev_page = false;
        } else {
            $prev_page = $page - 1;
        }
        $next_page = $page + 1;

        $pages = ceil(count(Projects::fromAPI()) / 7);
        if ($next_page > $pages || $next_page == $pages) {
            $next_page = false;
        }

        if ($page > 1) {
            $arr = array_slice(Projects::fromAPI(), (($page - 1) * 7) - 1, 7);
        } else {
            $arr = array_slice(Projects::fromAPI(), 0, 7);
        }

        $conferences = [];

        foreach ($arr as $k => $a) {
            array_push($conferences, Conference::fromObject($a));
        }

        return view('conferenceAll', ['conferences' => $conferences, 'page' => $page, 'prev_page' => $prev_page, 'next_page' => $next_page]);
    }

    public function conference($project_id) {
        $access = false;
        $user = UserAuth::getUser();

        if ($user) {
            $pa = ProjectsAccess::where([
                'user_id' => $user->id,
                'project_id' => $project_id
            ])->first();

            if ($pa) {
                $access = true;
            }
        }

        $conference = [];
        $arr = Project::fromAPI($project_id);

        foreach ($arr as $k => $a) {
            array_push($conference, Conference::fromObject($arr));
        }

         return view('conference', ['conference' => $conference[0], 'access' => $access, 'arr' => $arr, 'user' => $user, 'project_id' => $project_id]);
    }

    public function conferenceLink($project_id) {
        $user = UserAuth::getUser();

        $pa = ProjectsAccess::where([
            'user_id' => $user->id,
            'project_id' => $project_id
        ])->first();

        if (!$pa) {
            $pa = new ProjectsAccess;
            $pa->user_id = $user->id;
            $pa->project_id = $project_id;
            $pa->save();

            $ar = [
                "CONTACT_ID" => UserAuth::getUserField('contact_id'),
                "PROJECT_ID" => $project_id
            ];

            /*$curl = curl_init();
            curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
            curl_setopt($curl, CURLOPT_USERPWD, "03abf8d9-4a62-40b2-a102-7ad66ff12d78:");
            curl_setopt($curl, CURLOPT_HEADER, 0);
            curl_setopt($curl, CURLOPT_URL, 'https://api.insight.ly/v2.2/Contacts/'.UserAuth::getUserField('contact_id').'/Links');
            curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'POST');
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($ar));
            $out = curl_exec($curl);
            $arr = json_decode($out);
            curl_close($curl);*/
        }

        return redirect('/courses/' . $project_id . '/');
    }
}
