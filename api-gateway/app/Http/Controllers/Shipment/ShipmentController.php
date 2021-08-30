<?php

namespace App\Http\Controllers\Shipment;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Validator;
use App\Services\ShipmentService;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class shipmentController extends Controller
{

    use ApiResponse;

    /**
     * The service to consume the shipment micro-service
     * @var shipmentService
     */
    public $shipmentService;


    public function __construct(ShipmentService $shipmentService)
    {
        $this->shipmentService = $shipmentService;
    }

    /**
     * @OA\Get(
     *     path="/api/get_shipment_time",
     *     tags={"Shipment API"},
     *     @OA\Parameter(
     *         name="earth_time",
     *         in="query",
     *         description="The earth_time parameter in path",
     *         required=true,
     *
     *     ),
     *     @OA\Response(
     *         response="200",
     *         description="ok",
     *         content={
     *             @OA\MediaType(
     *                 mediaType="application/json",
     *                 @OA\Schema(
     *                     @OA\Property(
     *                         property="success",
     *                         type="integer",
     *                         description="The response code"
     *                     ),
     *                     @OA\Property(
     *                         property="message",
     *                         type="string",
     *                         description="The response message"
     *                     ),
     *                     @OA\Property(
     *                         property="delivery_time",
     *                         type="string",
     *                         description="The response data",
     *                     ),
     *                     example={
     *                         "success": 1,
     *                         "message": "ok",
     *                         "delivery_time": "54-9-18 ∇  4:6:17"
     *                     }
     *                 )
     *             )
     *         }
     *     ),
     *     @OA\Response(
     *         response="400",
     *         description="Validation Error",
     *         content={
     *             @OA\MediaType(
     *                 mediaType="application/json",
     *                 @OA\Schema(
     *                     @OA\Property(
     *                         property="success",
     *                         type="integer",
     *                         description="The response code"
     *                     ),
     *                     @OA\Property(
     *                         property="message",
     *                         type="string",
     *                         description="The response message"
     *                     ),
     *                     example={
     *                         "success": 0,
     *                         "message": "The earth time field is required."
     *                     }
     *                 )
     *             )
     *         }
     *     ),
     * )
     */

    public function getDeliveryTime(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'earth_time' => 'required|date_fotmat_validation'
        ], [
            'date_fotmat_validation' => 'Please provide the date in the following format. Y-m-d H:i:s',
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => 0, 'message' => $validator->errors()->first()], 400);
        }

        $this->validate($request, [
            'earth_time' => 'required'
        ]);

        return $this->successResponse($this->shipmentService->getShipmentTime($request->input('earth_time')));
    }
}
