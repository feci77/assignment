<?php
/**
 * Created by PhpStorm.
 * User: Faisal
 * Date: 10/22/2021
 * Time: 11:50 AM
 */

function api_response($data,$message = null,$responseCode = 200, $headers = [], $options = 0): \Illuminate\Http\JsonResponse
{
    return response()->json(['status' => 'passed' , 'data' =>  $data, 'message' => $message ], $responseCode,$headers, $options);
}

function api_error($errors = [],$responseCode = \App\Base\IResponseCode::INVALID_PARAMS): \Illuminate\Http\JsonResponse
{
    if(!is_array($errors)){
        $errors[] = $errors;
    }
    return response()->json(['status' => 'failed' , 'errors' => $errors],$responseCode);
}

/**
 * @param $data
 * @return string
 */
function serialize_data($data)
{
    return $data ? base64_encode(serialize($data)) : Null;
}

/**
 * @param $data
 * @return mixed
 */
function un_serialize_data($data)
{
    try {
        return $data ? unserialize(base64_decode($data)) : Null;
    } catch (Exception $exception) {
        $base64DecodedObject = base64_decode($data);
        $preparedObject = rtrim(substr($base64DecodedObject, strpos($base64DecodedObject, '"') + 1), '";');
        return $preparedObject;
    }
}
