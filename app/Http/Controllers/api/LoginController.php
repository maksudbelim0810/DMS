<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\api\BaseController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\JsonResponse;

class LoginController extends BaseController
{
    /**
     * Login api
     *
     * @param  Request  $request
     * @return JsonResponse
     */
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors(), 422);
        }

        $user = User::where('email', $request->email)->first();
        
        if (!$user || !Hash::check($request->password, $user->password)) {
            return $this->sendError('Invalid credentials' , [], 401);
        }
        if ($user->is_active == 1) {
            return $this->sendError('Please active your account' , [], 401);
        }
        
        if($user->role_id == 1){
            $user->role_name='Admin';
        }else if($user->role_id == 2){
            $user->role_name='Camel';
        }else if($user->role_id == 3){
            $user->role_name='CTPL';
        }else if($user->role_id == 4){
            $user->role_name='Dealer';
        }

        $token = $user->createToken('authToken')->plainTextToken;

        return $this->sendResponse(['token' =>  $token, 'user' => $user], 'User logged in successfully.');
    }

    /**
     * Logout api
     *
     * @param  Request  $request
     * @return JsonResponse
     */
    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        return $this->sendResponse([], 'Logged out successfully.');
    }

    /**
     * Change password api
     *
     * @param  Request  $request
     * @return JsonResponse
     */
    public function changePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'current_password' => 'required|string',
            'new_password' => 'required|string|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors(), 422);
        }

        $auth = auth()->user();
        if (!Hash::check($request->get('current_password'), $auth->password)) {
            return $this->sendError('Current Password is Invalid', [], 400);
        }

        if (strcmp($request->get('current_password'), $request->new_password) === 0) {
            return $this->sendError('New Password cannot be the same as your current password.', [], 400);
        }

        $auth->password = Hash::make($request->new_password);
        $auth->save();

        return $this->sendResponse([], 'Password changed successfully.');
    }
}
