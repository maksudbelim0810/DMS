<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\api\BaseController;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;

class UserController extends BaseController
{
    // public function __construct()
    // {
    //     $this->middleware('permission:user-list', ['only' => ['index', 'store','edit','update','destroy']]);
        
    // }

    /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        // if (!$this->isAuthorized) {
        //     return $this->sendError('User not authenticated');
        // }
        // Retrieve data if user has 'user-list' permission
        // if ($request->user()->can('user-list')) {
            $data = User::orderBy('id', 'DESC')->get();
            foreach ($data as $key => $value) {
                if($value->role_id == 1){
                    $value->role_name='Admin';
                }else if($value->role_id == 2){
                    $value->role_name='Camel';
                }else if($value->role_id == 3){
                    $value->role_name='CTPL';
                }else if($value->role_id == 4){
                    $value->role_name='Dealer';
                }
            }
            return $this->sendResponse($data, 'Users retrieved successfully.');
        // } else {
        //     // Handle case where user does not have permission
        //     return response()->json(['error' => 'Forbidden - User does not have the right permissions.'], 403);
        // }
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            //'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            // 'roles' => 'required'
        ]);
        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors(), 422);
        }
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        $user = User::create($input);
        // $user->assignRole($request->input('roles'));

        return $this->sendResponse($user, 'User created successfully.');
    }
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name', 'name')->all();
        $userRole = $user->roles->pluck('name', 'name')->all();

        $data = [
            'user' => $user,
            // 'roles' => $roles,
            // 'userRole' => $userRole
        ];

        return $this->sendResponse($data, 'User and roles retrieved successfully.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            //'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            // 'roles' => 'required'
        ]);
        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors(), 422);
        }
        $input = $request->all();
        

        $user = User::find($id);

        if (is_null($user)) {
            return $this->sendError('User not found.');
        }

        $user->update($input);
        // DB::table('model_has_roles')->where('model_id', $id)->delete();
        // $user->assignRole($request->input('roles'));

        return $this->sendResponse($user, 'User updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $user = User::find($id);

        if (is_null($user)) {
            return $this->sendError('User not found.');
        }

        $user->delete();

        return $this->sendResponse([], 'User deleted successfully.');
    }
}
