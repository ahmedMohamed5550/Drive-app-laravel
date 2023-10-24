<?php

namespace App\Http\Controllers;

use App\Models\drives;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class DrivesController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function changeStatus($id){
        $drives=drives::find($id);
        if($drives->status == 'private'){
            $drives->status = 'public';
            $drives->save();
            return redirect()->route('drives.index')->with("done","Moves File to public");
        }
        else{
            $drives->status = 'private';
            $drives->save();
            return redirect()->route('drives.index')->with("done","Moves File to private");
        }
    }

    public function publicfiles(){
        $drives=DB::table('joinuserwithpublicdrives')->get();
        return view('drives.publicfiles')->with('drives',$drives);
    }

    public function showpublicfiles($id){
        $drives=DB::table('joinuserwithpublicdrives')->where('driveid',$id)->first();
        return view('drives.showpublicfiles')->with('drives',$drives);
    }

    public function index()
    {
        $userid=auth()->user()->id;
        $drives=drives::where("userid",'=',$userid)->get();
        return view('drives.index')->with('drives',$drives);
    }


    public function create()
    {
        return view('drives.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'tittle' => 'required|min:5',
            'description' => 'required',
            'inputfile' => 'required|file|mimes:png,jpg,word,pdf,jif'
        ]);

        
        $drives=new drives();
        $drives->tittle=$request->tittle;
        $drives->description=$request->description;
        $drive_data=$request->file("inputfile");
        $file_name=time() . $drive_data-> getClientOriginalName();
        $location=public_path('./drive/');
        $drive_data->move($location,$file_name);
        $drives->file=$file_name;
        $userid=auth()->user()->id;
        $drives->userid=$userid;
        $drives->save();
        return redirect()->back()->with("done","Insert Succesfully");
    }


    public function show($id)
    {
        $drives=drives::find($id);
        return view('drives.show')->with('drives',$drives);

    }


    public function edit($id)
    {
        $drives=drives::find($id);
        return view('drives.edit')->with("drives",$drives);
    }


    public function update(Request $request, $id)
    {
        $drives=drives::find($id);
        $drives->tittle=$request->tittle;
        $drives->description=$request->description;

        $drive_data=$request->file("inputfile");
        if($drive_data != null){
            $file_name=time() . $drive_data-> getClientOriginalName();
            $location=public_path('./drive/');
            $drive_data->move($location,$file_name);
            $old_file=$drives->file;
            $filePathName=public_path() ."/drive/" .$old_file;
            unlink($filePathName);
        }
        else{
        $file_name=$drives->file;
        }

        $drives->file=$file_name;
        $drives->save();
        return redirect()->route('drives.index')->with("done","Updated Succesfully");

    }


    public function destroy($id)
    {
        $drives=drives::find($id);
        $old_file=$drives->file;
        $filePathName=public_path() ."/drive/" .$old_file;
        unlink($filePathName);
        $drives->delete();
        return redirect()->route('drives.index')->with("done","Deleted Succesfully");

    }

    public function downloadfile($id){
        $drives=drives::find($id);
        $drive_name=$drives->file;
        $filePathName=public_path() ."/drive/" .$drive_name;
        return response()->download($filePathName);
    }
}
