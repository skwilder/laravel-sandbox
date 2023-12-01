<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Requests\UserProfileRequest;
use App\Http\Resources\UserResource;
use App\Http\Responses\NotFoundResponse;
use App\Http\Responses\SuccessResponse;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

/**
 * The UserProfileRequest class is used to validate the request
 * This will ensure the ID is present and is an integer (numeric casted string to integer)
 */
Route::get('/user-profile/{id}', function (UserProfileRequest $request, $id) {
    $user = \App\Models\User::find($id);

    if (!$user) {
        return new NotFoundResponse('User not found');
    }

    return new SuccessResponse(new UserResource($user));
});
