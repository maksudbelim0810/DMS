<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\api\BaseController;
use App\Models\AssemblyMaster;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;

class AssemblyMasterController extends BaseController
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
        $data = AssemblyMaster::with('model')->orderBy('id', 'DESC')->get();
        foreach ($data as $enquir) {
            if($enquir->image != ""){
                $enquir->image = asset('assembly/images/'.$enquir->image);
            }else{
                $enquir->image = null;
            }
            if($enquir->model->image != ""){
                $enquir->model->image = asset('assembly/images/'.$enquir->model->image);
            }else{
                $enquir->model->image = null;
            }
        }
        return $this->sendResponse($data, 'Assembly Master retrieved successfully.');
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:assemblies_master,name',
            'image' => 'nullable|mimes:jpeg,png,jpg',
        ]);
        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors(), 422);
        }
        $input = $request->all();
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = 'assembly-image-' . time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('assembly/images');
            $image->move($destinationPath, $imageName);

            $input['image'] = $imageName;
        }
        $assembly = AssemblyMaster::create($input);
        // $assembly->assignRole($request->input('roles'));

        return $this->sendResponse($assembly, 'Assembly Master created successfully.');
    }
    public function edit($id)
    {
        $assembly = AssemblyMaster::with('model')->where('id',$id)->first();
        if($assembly->image != ""){
            $assembly->image = asset('assembly/images/'.$assembly->image);
        }else{
            $assembly->image = null;
        }
        if($assembly->model->image != ""){
            $assembly->model->image = asset('assembly/images/'.$assembly->model->image);
        }else{
            $assembly->model->image = null;
        }
        $data = [
            'user' => $assembly,
        ];
        return $this->sendResponse($data, 'Assembly Master and roles retrieved successfully.');
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
            'name' => 'required|unique:assemblies_master,name,' . $id,
            'image' => 'nullable|mimes:jpeg,png,jpg',
            
        ]);
        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors(), 422);
        }
        $assembly = AssemblyMaster::find($id);
        if (is_null($assembly)) {
            return $this->sendError('Assembly Master not found.');
        }
        $input = $request->all();

        if ($request->hasFile('image')) {
            
            $oldImage = $assembly->image;

            if ($oldImage && file_exists(public_path('assembly/images/' . $oldImage))) {
                unlink(public_path('assembly/images/' . $oldImage));
            }


            $image = $request->file('image');
            $imageName = 'assembly-image-' . time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('assembly/images');
            $image->move($destinationPath, $imageName);

            $input['image'] = $imageName;
        }
        $assembly->update($input);

        return $this->sendResponse($assembly, 'Assembly Master updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $assembly = AssemblyMaster::find($id);

        if (is_null($assembly)) {
            return $this->sendError('Assembly Master not found.');
        }

        $assembly->delete();

        return $this->sendResponse([], 'Assembly Master deleted successfully.');
    }
}
