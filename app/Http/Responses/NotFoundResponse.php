<?php
namespace App\Http\Responses;

use Illuminate\Http\JsonResponse;

class NotFoundResponse extends JsonResponse
{
    public function __construct($message = 'Resource not found')
    {
        parent::__construct(['message' => $message], 404);
    }
}
?>