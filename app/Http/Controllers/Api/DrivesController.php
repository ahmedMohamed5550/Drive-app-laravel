<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\drives;
use Illuminate\Http\Request;

class DrivesController extends Controller
{

    public function index()
    {
        $drives=drives::all();

        $message=[
            'drives'=> $drives,
            'message' => "show all data",
            'status' => 200
        ];
        return response($message,200);
    }


    public function store(Request $request)
    {

        $request->validate([
            'tittle' => 'required|min:5',
            'description' => 'required',
            'file' => 'required|file|mimes:png,jpg,word,pdf,jif'
        ]);

        $drive_data=$request->file('file');

        if($request->hasFile('file')){
            $file_name=time() . $drive_data-> getClientOriginalName();
            $location=public_path('./drive/');
            $drive_data->move($location,$file_name);
        }


        $drives=drives::create([
            'tittle' => $request->tittle,
            'description'=> $request->description,
            'file'=>public_path().$file_name,
            'status' =>"private",
            'userid' => 1
        ]);



        $message=[
            'drives'=> $drives,
            'message' => "insert data",
            'status' => 200
        ];
        return response($message,200);
    }


    public function show($id)
    {
        $drives=drives::find($id);
        $message=[
            'drives'=> $drives,
            'message' => "show data",
            'status' => 200
        ];
        return response($message,200);
    }

    public function update(Request $request, $id)
    {
        $drives=drives::find($id);
        $drives->tittle=$request->tittle;
        $drives->description=$request->description;

        $drive_data=$request->file("file");

        if($drive_data != null){
            $file_name=time() . $drive_data-> getClientOriginalName();
            $location=public_path('./drive/');
            $drive_data->move($location,$file_name);
            // $old_file=$drives->file;
            // $filePathName=public_path() ."/drive/" .$old_file;
            // unlink($filePathName);
        }
        else{
        $file_name=$drives->file;
        }

        $drives->file=$file_name;
        $drives->save();

        $message=[
            'drives'=> $drives,
            'message' => "updated data",
            'status' => 200
        ];
        return response($message,200);
    }

    public function destroy($id)
    {

        $drives = drives::find($id);


            if($drives == null){
                $message=[
                    'drives' => "This product not avaliable",
                    'message' => "No data",
                    'status' => 200
                ];
            }

        else{

            $drives->delete();

            $message=[
                'drives'=> $drives,
                'message' => "deleted",
                'status' => 200
            ];
        }

        return response($message,200);
    }

}
