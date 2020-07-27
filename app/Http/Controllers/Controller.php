<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    const STATUS_SUCCESS = 200;
    const STATUS_ERROR = 0;

    public static function returnData($status, $data = null)
    {
        return [
            'status' => $status,
            'data' => $data
        ];
    }

    /**
     * 返回成功的json
     * @param int $code
     * @param array $data
     * @return \Illuminate\Http\JsonResponse
     */
    public static function successJson($code = self::STATUS_SUCCESS, $data = [])
    {
        return self::returnJson($code, $data);
    }

    /**
     * 返回失败的json
     * @param int $code
     * @param array $data
     * @return \Illuminate\Http\JsonResponse
     */
    public static function errorJson($code = self::STATUS_ERROR, $data = [])
    {
        return self::returnJson($code, $data);
    }

    /**
     * @param $code
     * @param $data
     * @return \Illuminate\Http\JsonResponse
     */
    protected static function returnJson($code, $data)
    {
        $res = [
            'code' => $code,
            'data' => $data
        ];
        return response()->json($res);
    }
}
