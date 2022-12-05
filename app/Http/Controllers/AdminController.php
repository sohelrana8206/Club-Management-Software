<?php

namespace App\Http\Controllers;

//use App\Cms_accounts_head;
use App\User;
use Session;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        return view('admin.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        $get_pass = User::where('email',$email)->find(1);
        if($get_pass){
            if($password === decrypt($get_pass['password'])){
                session([
                    'email' => $email,
                    'userID' => $get_pass['id'],
                    'name' => $get_pass['name']
                ]);
                return redirect('dashboard');
            }else{
                return back()
                    ->with('success','Incorrect Password.');
            }
        }else{
            return back()
                ->with('success','Incorrect User Email Address.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function dashboard(Request $request){
        if ($request->session()->has('userID')) {
            return view('admin.dashboard');
        }else{
            return redirect('cms_admin');
        }
}

    public function logout(){
        Session::flush();
        return redirect('cms_admin');
    }
}
