<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\datastorage;
use File;
use Response;
use Illuminate\Support\Facades\Storage;


class DashboardController extends Controller
{
    // auth function controller
    public function index()
    {
        if(Auth::user()->hasRole('user'))
        {
            return view('userdashboard');
        }
        else if(Auth::user()->hasRole('admin'))
        {
            return view('dashboard');
        }
    }
    // auth function controller


    // uplaoding inserting controller to the database
    public function uploadtask()
    {
        return view('layouts.uploadfile');
    }


    //Request of inserting data to the database
    public function filestored(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'file' => 'required',
            'description'=>'required'
        ]);
        $data=new datastorage();
        $data->name=$request->name;
       if ($request->file('file'))
       {
        $file=$request->file('file');   
        $filename=time().'.'.$file->getClientOriginalExtension();
        $request->file->move('storages/',$filename);
        $data->file=$filename;
       }
        $data->description=$request->description;
        $data->save();

        return redirect()->back()->with(['message' => 'File Uploaded Click Dashboard to View']);
    }


        //view page controller 
        public function view()
        {
           $s = datastorage::all();
           return view('layouts.views',compact('s'));
       
        }
        public function dashview()
        {
           $s = datastorage::all();
           return view('layouts.dashview',compact('s'));
       
        }

        //download files button controllers
        public function dfile($file)
        {   
            return response()->download('storages/'.$file);

        }

        //edit view controller
        public function edit(Request $request )
        {
            $f=datastorage::find($request->id);
            return view('layouts.edit', compact('f'));
        }

        //updata button controller
        public function updateData(Request $request)
        {
            datastorage::find($request->id)->update($request->all());

            return redirect()->back()->with(['message' => 'Save Changes Click Dashboard to View']);

        }

        //delete 

        public function deletefile(Request $request)
        {
            $s = datastorage::find($request->id)->delete($request->all());

            return redirect()->back() ->with(['message' => 'Save Changes Click Dashboard to View']) ;

        }





}
