<?php
require_once 'config.php';
require_once 'php-jwt-master/src/BeforeValidException.php';
require_once 'php-jwt-master/src/ExpiredException.php';
require_once 'php-jwt-master/src/SignatureInvalidException.php';
require_once 'php-jwt-master/src/JWT.php';

use \Firebase\JWT\JWT;

function createMeeting($data = array())
{
    $post_time = $data['start_date'];
    $start_time = gmdate("Y-m-d\TH:i:s", strtotime($post_time));

    $createMeetingArr = array();
    if (!empty($data['alternative_host_ids']))
    {
        if (count($data['alternative_host_ids']) > 1)
        {
            $alternative_host_ids = implode(",", $data['alternative_host_ids']);
        }
        else
        {
            $alternative_host_ids = $data['alternative_host_ids'][0];
        }
    }

    $createMeetingArr['topic'] = $data['topic'];
    $createMeetingArr['agenda'] = !empty($data['agenda']) ? $data['agenda'] : "";
    $createMeetingArr['type'] = !empty($data['type']) ? $data['type'] : 2; //Scheduled
    $createMeetingArr['start_time'] = $start_time;
    $createMeetingArr['timezone'] = 'Asia/Kolkata ';
    $createMeetingArr['password'] = !empty($data['password']) ? $data['password'] : "";
    $createMeetingArr['duration'] = !empty($data['duration']) ? $data['duration'] : 60;

    $createMeetingArr['settings'] = array(
        'join_before_host' => !empty($data['join_before_host']) ? true : false,
        'host_video' => !empty($data['option_host_video']) ? true : false,
        'participant_video' => !empty($data['option_participants_video']) ? true : false,
        'mute_upon_entry' => !empty($data['option_mute_participants']) ? true : false,
        'enforce_login' => !empty($data['option_enforce_login']) ? true : false,
        'auto_recording' => !empty($data['option_auto_recording']) ? $data['option_auto_recording'] : "none",
        'alternative_hosts' => isset($alternative_host_ids) ? $alternative_host_ids : ""
    );

    $request_url = "https://api.zoom.us/v2/users/" . EMAIL_ID . "/meetings";
    $token = array(
        "iss" => API_KEY,
        "exp" => time() + 3600 //60 seconds as suggested
        
    );
    $getJWTKey = JWT::encode($token, API_SECRET);
    $headers = array(
        "authorization: Bearer " . $getJWTKey,
        "content-type: application/json",
        "Accept: application/json",
    );

    $fieldsArr = json_encode($createMeetingArr);

    $ch = curl_init();
    curl_setopt_array($ch, array(
        CURLOPT_URL => $request_url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => $fieldsArr,
        CURLOPT_HTTPHEADER => $headers,
    ));

    $result = curl_exec($ch);
    $err = curl_error($ch);
    curl_close($ch);
    if (!$result)
    {
        return $err;
    }
    return json_decode($result);
}

