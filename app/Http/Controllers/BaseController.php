<?php namespace App\Http\Controllers;

use App\Models\Conference;
use Request;
use Profiles;
use Users;
use UserAuth;
use ProjectsAccess;

class BaseController extends Controller {
    public function index() {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($curl, CURLOPT_USERPWD, "d3c58243-768c-4e88-a748-a5356aa6da97:");
        curl_setopt($curl, CURLOPT_HEADER, 0);
        curl_setopt($curl, CURLOPT_URL, 'https://api.insight.ly/v2.2/Projects/Search?brief=true&count_total=false&status=not%20started');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        $out = curl_exec($curl);
        $arr = json_decode($out);
        curl_close($curl);

        usort(
            $arr,
            function ($a, $b) {
                if ($a->PROJECT_NAME == $b->PROJECT_NAME) {
                    return 0;
                }
                return ($a->PROJECT_NAME < $b->PROJECT_NAME) ? -1 : 1;
            }
        );

        $arr = array_slice($arr, 0, 3);

        foreach ($arr as $k => $a) {
            $temp = explode(', ', $a->PROJECT_NAME);
            $temp1 = array_slice($temp, 1);

            $arr[$k]->PROJECT_NAME = implode(', ', $temp1);
            $arr[$k]->DATE = $temp[0];
        }

        return view('index', ['arr' => $arr]);
    }

    public function home() {
        return view('form', []);
    }

    public function form() {
        $ar = [
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
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($ar));
        $out = curl_exec($curl);
        $arr = json_decode($out);
        curl_close($curl);

        $user = new Users;
        $user->email = Request::input('email');
        $user->password = md5(Request::input('pass'));
        $user->token = md5(time());
        $user->save();

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

        UserAuth::save($user);

        return view('success', []);
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

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($curl, CURLOPT_USERPWD, "d3c58243-768c-4e88-a748-a5356aa6da97:");
        curl_setopt($curl, CURLOPT_HEADER, 0);
        curl_setopt($curl, CURLOPT_URL, 'https://api.insight.ly/v2.2/Projects/' . $project_id);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        $out = curl_exec($curl);
        $arr = json_decode($out);
        $conference = [];
        curl_close($curl);

        foreach ($arr as $k => $a) {
            array_push($conference, Conference::fromObject($arr));
        }

        return view('conference', ['conference' => $conference[0], 'access' => $access, 'arr' => $arr, 'user' => $user, 'project_id' => $project_id]);
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

    public function logout() {
        UserAuth::forget();

        return redirect('/');
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

    public function conferenceAll() {
        $page = Request::input('page');
        if (empty($page)) {
            $page = 1;
            $prev_page = false;
        } else {
            $prev_page = $page - 1;
        }
        $next_page = $page + 1;

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($curl, CURLOPT_USERPWD, "d3c58243-768c-4e88-a748-a5356aa6da97:");
        curl_setopt($curl, CURLOPT_HEADER, 0);
        curl_setopt($curl, CURLOPT_URL, 'https://api.insight.ly/v2.2/Projects/Search?brief=true&count_total=false&status=not%20started');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        $out = curl_exec($curl);
        $arr = json_decode($out);
        $conferences = [];
        curl_close($curl);

        $pages = ceil(count($arr) / 7);
        if ($next_page > $pages || $next_page == $pages) {
            $next_page = false;
        }

        usort(
            $arr,
            function ($a, $b) {
                if ($a->PROJECT_NAME == $b->PROJECT_NAME) {
                    return 0;
                }
                return ($a->PROJECT_NAME < $b->PROJECT_NAME) ? -1 : 1;
            }
        );

        if ($page > 1) {
            $arr = array_slice($arr, (($page - 1) * 7) - 1, 7);
        } else {
            $arr = array_slice($arr, 0, 7);
        }

        foreach ($arr as $k => $a) {
            array_push($conferences, Conference::fromObject($a));
        }

        return view('conferenceAll', ['conferences' => $conferences, 'page' => $page, 'prev_page' => $prev_page, 'next_page' => $next_page]);
    }
}
