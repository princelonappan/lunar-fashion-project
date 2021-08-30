<?php

namespace App\Http\Controllers\Shipment;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ShipmentController extends Controller
{
    public function getDeliveryTime(Request $request): \Illuminate\Http\JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'earth_time' => 'required|date_fotmat_validation'
        ], [
            'date_fotmat_validation' => 'Please provide the date in the following format. Y-m-d H:i:s',
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => 0, 'message' => $validator->errors()->first()], 400);
        }

        $earthTime = $request->input('earth_time');
        $this->validate($request, [
            'earth_time' => 'required'
        ]);

        $lunarTime = calculateArrivalInUTC($earthTime);
        $time = convertUTCToLST($lunarTime);
        return response()->json(['success' => 1, 'message' => 'Success', 'delivery_time' => $time], 200);
    }
}
