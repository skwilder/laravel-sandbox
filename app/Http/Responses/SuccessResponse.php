<?php
namespace App\Http\Responses;

use Illuminate\Http\JsonResponse;

class SuccessResponse extends JsonResponse
{
    public function __construct($data, $message = 'Operation successful')
    {
        parent::__construct([
            'message' => $message,
            'data' => $data
        ], 200);
    }
}
?>