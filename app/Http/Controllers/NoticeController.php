<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notice;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use RealRashid\SweetAlert\Facades\Alert;
use Session;

class NoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Notice::select('*')->orderBy('id','desc')->get();
        return view('admin/notice_list',['data'=> $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/notice_add_form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $notice_title = $request->input('notice_title');
        $notice_details = $request->input('notice_details');
        $pub_date = date('Y-m-d',strtotime($request->input('pub_date')));

        $data = array(
            'notice_title'=>$notice_title,
            "notice_details"=>$notice_details,
            "publish_date"=>$pub_date,
            "create_user"=>session('userID'),
            "created_at"=>date('Y-m-d h:i:s')
        );
        Notice::create($data);

        return back()
            ->with('toast_success','Notice Successfully Created.');
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
        $data = Notice::find($id);
        return view('admin/notice_edit_form',['data' => $data]);
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
        $notice_title = $request->input('notice_title');
        $notice_details = $request->input('notice_details');
        $pub_date = date('Y-m-d',strtotime($request->input('pub_date')));

        $data = array(
            'notice_title'=>$notice_title,
            "notice_details"=>$notice_details,
            "publish_date"=>$pub_date,
            "update_user"=>session('userID')
        );
        $record = Notice::find($id);
        $record->update($data);

        return back()
            ->with('toast_success','Notice Successfully Created.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $record = Notice::find($id);
        $record->delete();
    }

    public function noticeDetailsModal(Request $request){
        $id = $request->input('id');
        $data = Notice::find($id);
        $details = '<h5>'.$data->notice_title.'</h5><div style="text-align: justify">'.$data->notice_details.'</div><p style="margin-top: 20px"><strong>Publish Date: '.date('d F, Y',strtotime($data->publish_date)).'</strong></p>';
        return $details;
    }
}
