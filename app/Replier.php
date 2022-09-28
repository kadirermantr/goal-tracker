<?php

namespace App;

use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

class Replier
{
    /**
     * @param  bool  $success
     * @param  int  $code
     * @param $data
     * @param $message
     * @return JsonResponse
     */
    public static function response(bool $success, int $code, $data = null, $message = null): JsonResponse
    {
        $body = [
            'success' => $success,
            'data' => $data,
        ];

        if (isset($message)) {
            $body['message'] = $message;
        }

        return response()->json($body, $code);
    }

    /**
     * @param $data
     * @return JsonResponse
     */
    public static function responseSuccess($data): JsonResponse
    {
        if (is_null($data)) {
            return self::responseFalse(
                null,
                null,
                404
            );
        }

        return self::response(
            true,
            200,
            $data
        );
    }

    /**
     * @param $data
     * @param $message
     * @param  int  $code
     * @return JsonResponse
     */
    public static function responseFalse($data = null, $message = null, int $code = 400): JsonResponse
    {
        return self::response(
            false,
            $code,
            $data,
            $message
        );
    }

    /**
     * @throws ValidationException
     */
    public static function responseError($validator): JsonResponse
    {
        $response = self::responseFalse($validator->errors()->first(), 422);

        throw new ValidationException($validator, $response);
    }
}
