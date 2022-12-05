<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Club_asset;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Session;

class ClubAssetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Club_asset::select('*')->orderBy('id','desc')->get();
        return view('admin/clubs_assets_list',['data'=> $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/club_assets_add_form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $club_assets_name = $request->input('club_assets_name');
        $quantity = $request->input('quantity');
        $status = $request->input('status');
        $comments = $request->input('comments');
        $data = array(
            'inventory_name'=>$club_assets_name,
            "quantity"=>$quantity,
            "status"=>$status,
            "comments"=>$comments,
            "create_user"=>session('userID'),
            "created_at"=>date('Y-m-d h:i:s')
        );
        Club_asset::create($data);

        return back()
            ->with('success','Club Assets successfully added.');
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
        $data = Club_asset::find($id);
        return view('admin/club_assets_edit_form',['data' => $data]);
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
        $club_assets_name = $request->input('club_assets_name');
        $quantity = $request->input('quantity');
        $status = $request->input('status');
        $comments = $request->input('comments');
        $data = array(
            'inventory_name'=>$club_assets_name,
            "quantity"=>$quantity,
            "status"=>$status,
            "comments"=>$comments,
            "create_user"=>session('userID'),
            "created_at"=>date('Y-m-d h:i:s')
        );
        $record = Club_asset::find($id);
        $record->update($data);

        return redirect('club_assets')
            ->with('success','Club Assets successfully Updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $record = Club_asset::find($id);
        $record->delete();
    }
}
