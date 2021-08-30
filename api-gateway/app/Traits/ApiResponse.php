<?php

namespace App\Traits;

trait ApiResponse
{
    public function successResponse($data, $code = \Illuminate\Http\Response::HTTP_OK)
    {
        return response($data, $code)->header('Content-Type', 'application/json');
    }
}