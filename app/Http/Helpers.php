<?php

use App\Models\Admin;
use Illuminate\Container\Container;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\Paginator;

//use Illuminate\Support\Facades\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

const SESSION_DURATION = '30';
const VIDEO_PRICE = '30';
const VOICE_PRICE = '30';

function locale()
{
    return Mcamara\LaravelLocalization\Facades\LaravelLocalization::getCurrentLocale();
}

//used in login controller
function getDeviceLang($translate = null)
{
//   $lang = Request::server('HTTP_ACCEPT_LANGUAGE')
    if (isset($_SERVER['HTTP_ACCEPT_LANGUAGE'])) {
        $languages = explode(',', $_SERVER['HTTP_ACCEPT_LANGUAGE'])[0];
        $prefix = substr($languages, 0, strpos($languages, '-'));
        return $translate ? __($prefix) : $prefix;
    } else {
        return __(config('app.locale'));
    }
}

function checkUpdateAvailable(): bool
{
    $device_os = app('request')->header('device-os', '');
    $app_version = app('request')->header('app-version', '');
    $app_type = app('request')->header('app-type', '');

    if ($app_type == APP_TYPE_USER && $device_os == DEVICE_OS_IOS && $app_version != APP_VERSION_IOS_USER) {
        return true;
    } elseif ($app_type == APP_TYPE_USER && $device_os == DEVICE_OS_ANDROID && $app_version != APP_VERSION_ANDROID_USER) {
        return true;
    } elseif ($app_type == APP_TYPE_DOCTOR && $device_os == DEVICE_OS_IOS && $app_version != APP_VERSION_IOS_DOCTOR) {
        return true;
    } elseif ($app_type == APP_TYPE_DOCTOR && $device_os == DEVICE_OS_ANDROID && $app_version != APP_VERSION_ANDROID_DOCTOR) {
        return true;
    }

    return false;
}

const DEVICE_OS_IOS = 'ios';
const DEVICE_OS_ANDROID = 'android';
const APP_VERSION_IOS_USER = '1.0_1';
const APP_VERSION_ANDROID_USER = '1.0.0';

const APP_VERSION_IOS_DOCTOR = '1.0_6';
const APP_VERSION_ANDROID_DOCTOR = '1.0.0';

const APP_TYPE_USER = 'user';
const APP_TYPE_DOCTOR = 'doctor';


function rtl_assets_app()
{

    if (LaravelLocalization::getCurrentLocaleNative() == 'English') {
        return '-en';
    }
    return '';
}

function rtl_assets()
{
    if (LaravelLocalization::getCurrentLocaleDirection() == 'rtl') {
        return '-rtl';
    }
    return '';
}

function locales()
{
    $arr = [];
    foreach (LaravelLocalization::getSupportedLocales() as $key => $value) {
        $arr[$key] = __('' . $value['name']);
    }
    return $arr;
}

function locales2()
{
    $arr = [];
    foreach (LaravelLocalization::getSupportedLocales() as $key => $value) {
        if (in_array($key, ['ar', 'en'])) {
            $arr[$key] = __('' . $value['name']);
        }
    }
    return $arr;
}
const GOOGLE_API_KEY = 'AIzaSyDWsVesAXOn2-d8Iv7z8u8uK0OCKZ3CqUg';

function languages($admin = true)
{
    if ($admin) {
        return ['ar' => 'AR', 'en' => 'EN'];
    }

    if (app()->getLocale() == 'en') {
        return ['ar' => 'Arabic', 'en' => 'English', 'de' => 'German'];
    } elseif (app()->getLocale() == 'ar') {
        return ['ar' => 'العربية', 'en' => 'الإنجليزية', 'de' => 'الألمانية'];
    } else {
        return ['ar' => 'Arabisch', 'en' => 'Englisch', 'de' => 'Deutsch'];
    }

}

function getDataElementsFromPaginationCollection($elements)
{
    return json_decode(json_encode($elements, true), true)['data'];
}

function mainResponseWithPaginate($status, $msg, $dataObject, $dataPagination, $validator, $code = 200, $pages = null)
{ //used when the data are more than object with one pagination

    $pagination = json_decode(json_encode($dataPagination, true), true);

    $pages = [
        "current_page" => $pagination['current_page'],
        "first_page_url" => $pagination['first_page_url'],
        "from" => $pagination['from'],
        "last_page" => $pagination['last_page'],
        "last_page_url" => $pagination['last_page_url'],
        "next_page_url" => $pagination['next_page_url'],
        "path" => $pagination['path'],
        "per_page" => $pagination['per_page'],
        "prev_page_url" => $pagination['prev_page_url'],
        "to" => $pagination['to'],
        "total" => $pagination['total'],
    ];
    $aryErrors = [];
    foreach ($validator as $key => $value) {
        $aryErrors[] = ['field_name' => $key, 'messages' => $value];
    }
    $newData = ['status' => $status, 'message' => __($msg), 'is_update_available' => checkUpdateAvailable(), 'data' => $dataObject, 'pages' => $pages, 'errors' => $aryErrors];

    return response()->json($newData);
}

function mainResponseMultiPaginate($data_paginate)     // for multi object in one array
{
    if (isset(json_decode(json_encode($data_paginate, true), true)['data'])) {
        $pagination = json_decode(json_encode($data_paginate, true), true);
        $data_paginate = $pagination['data'];

        $pages = [
            'current_page' => $pagination['current_page'],
            'first_page_url' => $pagination['first_page_url'],
            'from' => $pagination['from'],
            'last_page' => $pagination['last_page'],
            'last_page_url' => $pagination['last_page_url'],
            'next_page_url' => $pagination['next_page_url'],
            'path' => $pagination['path'],
            'per_page' => $pagination['per_page'],
            'prev_page_url' => $pagination['prev_page_url'],
            'to' => $pagination['to'],
            'total' => $pagination['total'],
        ];
    } else {
        $pages = [
            'current_page' => 0,
            'first_page_url' => '',
            'from' => 0,
            'last_page' => 0,
            'last_page_url' => '',
            'next_page_url' => null,
            'path' => '',
            'per_page' => 0,
            'prev_page_url' => null,
            'to' => 0,
            'total' => 0,
        ];
    }

    $newData = ['item' => $data_paginate, 'pages' => $pages];

    return $newData;
}

//******** this for collection  (all,get)
function paginate($results, $showPerPage)
{
    $pageNumber = Paginator::resolveCurrentPage('page');

    $results = Collection::make($results);
    $totalPageNumber = $results->count();


    return paginator($results->forPage($pageNumber, $showPerPage)->values(), $totalPageNumber, $showPerPage, $pageNumber, [
        'path' => Paginator::resolveCurrentPath(),
        'pageName' => 'page',
    ]);

}

function paginator($items, $total, $perPage, $currentPage, $options)   // for collection
{
    return Container::getInstance()->makeWith(LengthAwarePaginator::class, compact(
        'items', 'total', 'perPage', 'currentPage', 'options'
    ));
}

//***************

function mainResponse($status, $msg, $items, $validator = [], $code = 200, $pages = null)
{
    $item_with_paginate = $items;
    if (gettype($items) == 'array') {
        if (count($items)) {
            $item_with_paginate = $items[array_key_first($items)];
        }
    }

    if (isset(json_decode(json_encode($item_with_paginate, true), true)['data'])) {
        $pagination = json_decode(json_encode($item_with_paginate, true), true);
        $new_items = $pagination['data'];
        $pages = [
            "current_page" => $pagination['current_page'],
            "first_page_url" => $pagination['first_page_url'],
            "from" => $pagination['from'],
            "last_page" => $pagination['last_page'],
            "last_page_url" => $pagination['last_page_url'],
            "next_page_url" => $pagination['next_page_url'],
            "path" => $pagination['path'],
            "per_page" => $pagination['per_page'],
            "prev_page_url" => $pagination['prev_page_url'],
            "to" => $pagination['to'],
            "total" => $pagination['total'],
        ];
    } else {
        $pages = [
            "current_page" => 0,
            "first_page_url" => '',
            "from" => 0,
            "last_page" => 0,
            "last_page_url" => '',
            "next_page_url" => null,
            "path" => '',
            "per_page" => 0,
            "prev_page_url" => null,
            "to" => 0,
            "total" => 0,
        ];
    }

    if (gettype($items) == 'array') {
        if (count($items)) {
            $new_items = [];
            foreach ($items as $key => $item) {
                if (isset(json_decode(json_encode($item, true), true)['data'])) {
                    $pagination = json_decode(json_encode($item, true), true);
                    $new_items[$key] = $pagination['data'];
                } else {
                    $new_items[$key] = $item;
                }

                $items = $new_items;
            }
        }
    } else {
        if (isset(json_decode(json_encode($item_with_paginate, true), true)['data'])) {
            $pagination = json_decode(json_encode($item_with_paginate, true), true);
            $items = $pagination['data'];
        }
    }

//    $items = $new_items;

    $aryErrors = [];
    foreach ($validator as $key => $value) {
        $aryErrors[] = ['field_name' => $key, 'messages' => $value];
    }
    /*    $aryErrors = array_map(function ($i) {
            return $i[0];
        }, $validator);*/

    $newData = ['status' => $status, 'message' => __($msg), 'is_update_available' => checkUpdateAvailable(), 'data' => $items, 'pages' => $pages, 'errors' => $aryErrors];

    return response()->json($newData);
}

function latlng($ip = '213.6.137.2')
{
    $url = 'http://ip-api.com/json/' . $ip;
    $headers = ['Accept' => 'application/json'];
    $http = new \GuzzleHttp\Client();
    $response = $http->get($url, [
        'headers' => $headers,
        'form_params' => [],
    ]);
    $data = json_decode((string)$response->getBody(), true);
    return ['lat' => $data['lat'], 'lng' => $data['lon']];
    /*    if (array_key_exists('countryCode', $data)) {
            //do your code
        }
        return 'no data';*/
}

function check_number($mobile)
{
    $persian = array('٩', '٨', '٧', '٦', '٥', '٤', '٣', '٢', '١', '٠');
    $num = range(9, 0);
    $mobile = str_replace(' ', '', $mobile);
    $mobile = str_replace($persian, $num, $mobile);
    $mobile = substr($mobile, -9);

    if (preg_match("/^[5][0-9]{8}$/", $mobile)) {
        $mobile = '966' . $mobile;

        return $mobile;
    } else {
        return FALSE;
    }
}

function getGeneratedCode($model, $column)
{
    $model = ucfirst($model);
    $model_name = 'App\Models\\' . $model;
    do {
        $code = substr(str_shuffle('1234567890'), 0, 5);
    } while ($model_name::query()->where($column, $code)->count() > 0);
    return $code;
}


function send_sms($mobile, $title, $message = null)
{
    $mobiles = [];
    foreach ($mobile as $item) {
        $mobiles[] = check_number($item);
    }
    $mobiles = implode(',', $mobiles);
    if ($mobile) {
        $message = urlencode($message);
//        $url = "http://www.jawalsms.net/httpSmsProvider.aspx?username=wasilcom&password=987654321&mobile=$mobiles&unicode=E&message=$message&sender=WasilCom";
//        $url = "shttps://www.hisms.ws/api.php?send_sms&username=966541412144&password=As120120&numbers=$mobiles&sender=FOORSA-AD&message=$message";
//
//        $ch = curl_init();
//        curl_setopt($ch, CURLOPT_URL, $url);
//        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//        curl_setopt($ch, CURLOPT_VERBOSE, 0);
//        curl_setopt($ch, CURLOPT_HEADER, 0);
//        curl_setopt($ch, CURLE_HTTP_NOT_FOUND, 1);
//        $LastData = curl_exec($ch);
//        curl_close($ch);
//        return $LastData;
    }
}

function notificationForAdmin($fcm_tokens, $id, $title, $content, $type, $reference_id, $reference_type, $icon = null)
{
//    $fcm_tokens = Admin::query()->pluck('fcm_token')->toArray();
    if (count($fcm_tokens) < 0) return null;
    $msg = [
        'id' => $id,
        'title' => $title,
        'content' => $content,
        'body' => $content,
        'type' => $type,
        'reference_uuid' => $reference_id,
        'reference_type' => $reference_type,
        'icon' => $icon,
        'sound' => url('/') . "/sound.mp3",
    ];

    $fields = [
        'registration_ids' => $fcm_tokens,
        'data' => $msg,
    ];
    $headers = [
        'Authorization: key=' . 'AAAAYsFAaGE:APA91bGtUqZUb1R6eodZlEueHgjPnWmzJWbl2Vg5SuFRC9OiqBj5p67iMbpyB-v9w00mGnqCCmDt7wI7G1njGkXDV6VAZV7UVwV1hfueJZGRPZHxVjTQJdBNCF_44cCGr41tV3OpvKm7',
        'Content-Type: application/json'
    ];

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
    $result = curl_exec($ch);
    curl_close($ch);
    // dump($result);
//    dd($result);
    return $result;
}

function fcmNotification($token, $id, $title, $content, $type, $reference_id, $reference_type, $device,
                         $icon = null, $link = null, $category_type = null)
{
//    if (count($token) < 1)
//        return null;
    $msg = [
        'id' => $id,
        'title' => $title,
        'content' => $content,
        'body' => $content,
        'type' => $type,
        'reference_id' => $reference_id,
        'reference_uuid' => $reference_id,
        'reference_type' => $reference_type,
        'icon' => $icon,
        'link' => $link,
        'category_type' => $category_type,
        'sound' => url('/') . "/sound.mp3",
    ];
    if ($device == 'ios') {
        $fields = [
            'registration_ids' => $token,
            'notification' => $msg,
        ];
    } else {
        $fields = [
            'registration_ids' => $token,
            'data' => $msg,
        ];
    }

    $headers = [
        'Authorization: key=' . 'AAAAIB3HfC0:APA91bFCnCeSaL-ikEGQvyqoVeY97AXjbn4TwFmGuknLyXqz2qq30EdXYzTTxlTBz6dat3EZeqVxgVRmy5DsEGPCfg7QsMmSMbY28bZksbSVAfmqFZiYL7UyzkCjNGPw6fHW_tJxX2wA',
        'Content-Type: application/json'
    ];

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
    $result = curl_exec($ch);
    curl_close($ch);
//    dump($result);

    return $result;
}


function getDistance($lat1, $lon1, $lat2, $lon2)
{
    $theta = $lon1 - $lon2;
    $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
    $dist = acos($dist);
    $dist = rad2deg($dist);
    $miles = $dist * 60 * 1.1515;
    return round($miles * 1.609344, 2);

}

function sendEmail($email, $title, $body)
{
    $details = [
        'title' => $title,
        'body' => $body,
    ];
    Mail::to($email)->send(new \App\Mail\SendMail($details));
}

function distance_format($distance)
{
    if (intval($distance) == number_format($distance, 1, '.', '')) {
        return number_format($distance, 0, '.', '');
    }

    return number_format($distance, 1, '.', '');
}


const firebase_key = 'AIzaSyBlyMcn3SZMhUErRmUuw2OH9lWUtoxuQAA'; //The api key from firebase from firebaseConfig

//create or update
function firebaseStore($url, $json)
{
    $curl = curl_init();

    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'PUT');
    curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Content-Length: ' . strlen($json), 'curl -X PUT -d'));
    curl_setopt($curl, CURLOPT_URL, $url . '?key=' . firebase_key);
    curl_setopt($curl, CURLOPT_USERAGENT, 'cURL');
    curl_setopt($curl, CURLOPT_POSTFIELDS, $json);

    $response = curl_exec($curl);
//    dd($response);
    curl_close($curl);
}

//create
function firebaseCreate($url, $json)
{
    $curl = curl_init();

    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'POST');
    curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Content-Length: ' . strlen($json), 'curl -X POST -d'));
    curl_setopt($curl, CURLOPT_URL, $url . '?key=' . firebase_key);
    curl_setopt($curl, CURLOPT_USERAGENT, 'cURL');
    curl_setopt($curl, CURLOPT_POSTFIELDS, $json);

    $response = curl_exec($curl);
    curl_close($curl);
}
const project_id = 'metric-992c5';
const extension = '.json';
const BASE_URL = 'https://metric-992c5-default-rtdb.firebaseio.com/'; //from database||firebaseConfig

function updatingExistDataFirebase($url, $json)
{
    $curl = curl_init();

    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'PATCH');
    curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Content-Length: ' . strlen($json), 'curl -X PATCH -d'));
    curl_setopt($curl, CURLOPT_URL, $url . '?key=' . firebase_key);
    curl_setopt($curl, CURLOPT_USERAGENT, 'cURL');
    curl_setopt($curl, CURLOPT_POSTFIELDS, $json);

    $response = curl_exec($curl);
    curl_close($curl);
}

function firebaseGet($url)
{
    $curl = curl_init();

    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET');
    curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'curl -X GET -d'));
    curl_setopt($curl, CURLOPT_URL, $url . '?key=' . firebase_key);
    curl_setopt($curl, CURLOPT_USERAGENT, 'cURL');

    $response = curl_exec($curl);
    curl_close($curl);
    return json_decode($response, true); //true:array
}

function deleteFirebaseStore($url)
{
    $curl = curl_init();

    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'DELETE');
    curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'curl -X DELETE -d'));
    curl_setopt($curl, CURLOPT_URL, $url . '?key=' . firebase_key);
    curl_setopt($curl, CURLOPT_USERAGENT, 'cURL');

    $response = curl_exec($curl);
    curl_close($curl);
    return json_decode($response, true);
}


function getFileType($file)
{
    if (gettype($file) == "string") {
        $base_file = substr($file, strrpos($file, '/') + 1);
        $extension = pathinfo($base_file, PATHINFO_EXTENSION);
    } else
        $extension = $file->getClientOriginalExtension(); // or pathinfo($path)['extension']

    $pdf_extensions = ['pdf'];
    $video_extensions = ['mp4', 'mov', 'mpeg', 'mpeg4'];
    $img_extensions = ['png', 'jpg', 'jpeg', 'gif', 'apng', 'avif', 'jfif', 'pjpeg', 'pjp', 'svg', 'webp',];
    $voice_extensions = ['mp3', 'm3u', 'wav', 'amr', 'mod', 'ogg', 'ses', 'acm', 'm4a', 'ram', 'cda', 'mid', 'pcm', 'mus', 'gsm', 'pc', 'svd', 'aac',
        'sng', 'wma', 'xspf', 'abc', 'flp', 'dcf', 'wpk', 'smf', 'vlc', 'aax', 'aiff', 'flac', 'omf', 'wve', 'all', 'cpr', 'voc', 'vox', 'iff', 'kar',
        'ra', 'wrf', 'acd', 'dmf', 'imp', 'mpc', 'mtp', 'vrf', 'wax', 'aaf', 'sds', 'sf2', 'ac3', 'gp3', 'gpk', 'kmp', 'mtd', 'vpl', 'ape', 'ptm', 'rfl',
        'dss', 'm4p', 'pk', 'ptx', 'rbs', 'smp', 'emp', 'imf', 'm4b', 'msv', 'oma', 'sfl', 'vdj', 'zpl', 'aa', 'aif', 'aud', 'dvf', 'fev', 'ftm', 'it',
        'nst', 'sm', 'wv', 'act', 'als', 'amz', 'apl', 'bun', 'emx', 'mbr', 'mxl', 'nwc', 'odm', 'pls', 'pts', 'qcp', 'rmi', 'seq', 'wow', 'gig', 'aifc',
        'lvp', 'nra', 'ove', 'rng', 'sdat', 'shn', 'spx', 'syn', 'tak', 'tta', 'wrk'];
    $file_type = null;
    if (in_array($extension, $video_extensions)) {
        $file_type = "video";

    } elseif (in_array($extension, $img_extensions)) {
        $file_type = "image";
    } elseif (in_array($extension, $voice_extensions)) {
        $file_type = "voice";
    } elseif (in_array($extension, $pdf_extensions)) {
        $file_type = "pdf";
    }
    return $file_type;
}


function checkDoctor()
{
    $status = true;
    $message = '';
    if (!auth('sanctum')->check()) {
        $status = false;
        $message = __('unauthorized');
        return compact('status', 'message');
    }

    $doctor = auth('sanctum')->user();
    $exists = $doctor->tokens()->where('id', $doctor->currentAccessToken()->id)
        ->where('name', 'doctors_api')->exists();

    if (!$exists) {
        $status = false;
        $message = __('unauthorized');
        return compact('status', 'message');
    }


    if (!$doctor->status) {
        $status = false;
        $message = __('not_allow');
        return compact('status', 'message');
    }

    return compact('status', 'message');
}

function checkUser()
{
    $status = true;
    $message = '';
    if (!auth('sanctum')->check()) {
        $status = false;
        $message = __('unauthorized');
        return compact('status', 'message');
    }

    $user = auth('sanctum')->user();
    $exists = $user->tokens()->where('id', $user->currentAccessToken()->id)
        ->where('name', 'user_api')->exists();

    if (!$exists) {
        $status = false;
        $message = __('unauthorized');
        return compact('status', 'message');
    }

    return compact('status', 'message');
}

function price_format($price)
{
    if (intval($price) == number_format($price, 2, '.', '')) {
        return number_format($price, 0, '.', '');
    }

    return number_format($price, 2, '.', '');
}
