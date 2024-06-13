<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\api\BaseController;
use App\Models\ModelMaster;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;

class ModelMasterController extends BaseController
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
        $data = ModelMaster::orderBy('id', 'DESC')->get();
        foreach ($data as $enquir) {
            if($enquir->image != ""){
                $enquir->image = asset('model/images/'.$enquir->image);
            }else{
                $enquir->image = null;
            }
        }
        return $this->sendResponse($data, 'Model Master retrieved successfully.');
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:models_master,name',
            'image' => 'nullable|mimes:jpeg,png,jpg',
        ]);
        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors(), 422);
        }
        $input = $request->all();
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = 'model-image-' . time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('model/images');
            $image->move($destinationPath, $imageName);

            $input['image'] = $imageName;
        }
        $model = ModelMaster::create($input);
        // $model->assignRole($request->input('roles'));

        return $this->sendResponse($model, 'Model Master created successfully.');
    }
    public function edit($id)
    {
        $model = ModelMaster::find($id);
        if($model->image != ""){
            $model->image = asset('model/images/'.$model->image);
        }else{
            $model->image = null;
        }
        $data = [
            'user' => $model,
        ];
        return $this->sendResponse($data, 'Model Master and roles retrieved successfully.');
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
            'name' => 'required|unique:models_master,name,' . $id,
            'image' => 'nullable|mimes:jpeg,png,jpg',
            
        ]);
        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors(), 422);
        }
        $model = ModelMaster::find($id);
        if (is_null($model)) {
            return $this->sendError('Model Master not found.');
        }
        $input = $request->all();

        if ($request->hasFile('image')) {

            $oldImage = $model->image;

            if ($oldImage && file_exists(public_path('model/images/' . $oldImage))) {
                unlink(public_path('model/images/' . $oldImage));
            }


            $image = $request->file('image');
            $imageName = 'model-image-' . time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('model/images');
            $image->move($destinationPath, $imageName);

            $input['image'] = $imageName;
        }
        $model->update($input);

        return $this->sendResponse($model, 'Model Master updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $model = ModelMaster::find($id);

        if (is_null($model)) {
            return $this->sendError('Model Master not found.');
        }

        $model->delete();

        return $this->sendResponse([], 'Model Master deleted successfully.');
    }
}
