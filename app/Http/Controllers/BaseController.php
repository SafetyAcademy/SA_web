<?php

namespace App\Http\Controllers;

use ConferenceAccept;
use ProjectsService;
use Register;
use Conference;
use Request;
use Profile;
use User;
use UserAuth;
use ProjectsAccess;

class BaseController extends Controller {
    public function index() {
        $arr = array_slice(ProjectsService::getAll(), 0, 3);
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
            $user = User::where([
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
        $param = Request::only(['email', 'pass', 'pass_1', 'first_name', 'last_name', 'street', 'city', 'country', 'postcode']);
        $res = (array)Register::fromRequest($param);
        if ((empty($res['errors']) === true)) {
            return view('success', []);
        }  else {
            return view('sign_up', ['err' => $res['errors'], 'data' => $param]);
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

        $arr = ProjectsService::getAll();
        usort(
            $arr,
            function ($a, $b) {
                if ($a->PROJECT_NAME == $b->PROJECT_NAME) {
                    return 0;
                }
                return ($a->PROJECT_NAME < $b->PROJECT_NAME) ? -1 : 1;
            }
        );

        $pages = ceil(count($arr) / 7);
        if ($next_page > $pages || $next_page == $pages) {
            $next_page = false;
        }

        if ($page > 1) {
            $arr = array_slice($arr, (($page - 1) * 7) - 1, 7);
        } else {
            $arr = array_slice($arr, 0, 7);
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
            $pa = $user->projects_accesses()->where('project_id', $project_id)->first();
            if ($pa) {
                $access = true;
            }
        }

        $conference = [];
        $arr = ProjectsService::getById($project_id);

        foreach ($arr as $k => $a) {
            array_push($conference, Conference::fromObject($arr));
        }

         return view('conference', ['conference' => $conference[0], 'access' => $access, 'arr' => $arr, 'user' => $user, 'project_id' => $project_id]);
    }

    public function conferenceLink($project_id) {
        $user = UserAuth::currentUser();

        $pa = $user->projects_accesses()->where('project_id', $project_id)->first();

        if (!$pa) {
            $user->projects_accesses()->create(['project_id' => $project_id]);

            ConferenceAccept::fromRequest([
                'contact_id' => UserAuth::getUserField('contact_id'),
                'project_id' => $project_id
            ]);
        }

        return redirect('/courses/' . $project_id . '/');
    }
}
