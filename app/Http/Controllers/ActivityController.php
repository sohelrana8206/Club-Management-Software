<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Activity;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Session;
use Image;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Activity::select('*')->orderBy('id','desc')->get();
        return view('admin/activities_list',['data'=> $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/activities_add_form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $activities_title = $request->input('activities_title');
        $activities_details = $request->input('activities_details');
        $activities_video = $request->input('video_path');
        $activities_date = date('Y-m-d',strtotime($request->input('activities_date')));

        if($request->hasFile('img')){

            foreach($request->file('img') as $image)
            {
                $extension = $image->getClientOriginalExtension();
                $fileName = rand(10,10000).time().'.'.$extension;
                $destinationPath = public_path('/uploads/activities/thumbnail');
                $img = Image::make($image->path());
                $img->resize(750, 450, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($destinationPath.'/'.$fileName);
                $image->move(public_path('uploads/activities/'), $fileName);
                unlink(public_path('uploads/activities/'.$fileName));
                $data[] = $fileName;
            }

            $actImg = $data[0];
             unset($data[0]);
            $extImg = implode(',',$data);
            $dataArray = array(
                'title'=>$activities_title,
                "details"=>$activities_details,
                "image"=>$actImg,
                "video_path"=>$activities_video,
                "extra_img"=>$extImg,
                "publish_date"=>$activities_date,
                "create_user"=>session('userID'),
                "created_at"=>date('Y-m-d h:i:s')
            );
            Activity::create($dataArray);

            return back()
                ->with('toast_success','Activities Successfully Added.');
        }else{
            return back()
                ->with('toast_success','Image Upload Problem.');
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
        $data = Activity::find($id);
        return view('admin/activities_details',['data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Activity::find($id);
        return view('admin/activities_edit_form',['data' => $data]);
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
        $activities_title = $request->input('activities_title');
        $activities_details = $request->input('activities_details');
        $activities_video = $request->input('video_path');
        $activities_date = date('Y-m-d',strtotime($request->input('activities_date')));

        if($request->hasFile('img')){

            foreach($request->file('img') as $image)
            {
                $extension = $image->getClientOriginalExtension();
                $fileName = rand(10,10000).time().'.'.$extension;
                $destinationPath = public_path('/uploads/activities/thumbnail');
                $img = Image::make($image->path());
                $img->resize(750, 450, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($destinationPath.'/'.$fileName);
                $image->move(public_path('uploads/activities/'), $fileName);
                unlink(public_path('uploads/activities/'.$fileName));
                $data[] = $fileName;
            }

            $actImg = $data[0];
            unset($data[0]);
            $extImg = implode(',',$data);
            $dataArray = array(
                'title'=>$activities_title,
                "details"=>$activities_details,
                "image"=>$actImg,
                "video_path"=>$activities_video,
                "extra_img"=>$extImg,
                "publish_date"=>$activities_date,
                "update_user"=>session('userID'),
                "updated_at"=>date('Y-m-d h:i:s')
            );
            $record = Activity::find($id);
            $record->update($dataArray);

            return back()
                ->with('toast_success','Activities Successfully Updated.');
        }else{
            $dataArray = array(
                'title'=>$activities_title,
                "details"=>$activities_details,
                "video_path"=>$activities_video,
                "publish_date"=>$activities_date,
                "update_user"=>session('userID'),
                "updated_at"=>date('Y-m-d h:i:s')
            );
            $record = Activity::find($id);
            $record->update($dataArray);

            return back()
                ->with('toast_success','Activities Successfully Updated.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $record = Activity::find($id);
        $record->delete();
    }
}
