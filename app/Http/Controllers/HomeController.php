<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $clients = user::get()->all();
        return view('home',compact('clients'));
    }
      public function adduser(Request $request)
    {
        $input=$request->except(['_token']);
        $input['password']=rand(10,100);
        $clients_insert = user::insert($input);
        return back()->with('success', 'Data inserted Successfully');
    }
      public function update(Request $request)
    {
        //dd($request->all());
        $input=$request->except(['_token']);
        $input['password']=rand(10,100);
        $client_update = user::where('id',$request->id)->update($input);
        return back()->with('success', 'Data Updated Successfully');
    }
    public function destroy(Request $request)
    {
        //dd($request->all());
        $input=$request->except(['_token']);
        $input['password']=rand(10,100);
        $client_update = user::where('id',$request->id)->update($input);
        return back()->with('success', 'Data Updated Successfully');
    }
    public function accountlist(Request $request)
    {
        //dd($request->all());
        $clients = user::get()->all();
        return view('home',compact('clients'));
       
    }
}
