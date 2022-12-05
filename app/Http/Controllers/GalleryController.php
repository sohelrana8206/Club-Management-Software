<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gallery;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Session;
use Image;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Gallery::select('*')->orderBy('id','desc')->get();
        return view('admin/gallery_list',['data'=> $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/galleries_add_form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasFile('img')){

            $year = date('Y');
            if (!is_dir(public_path('/uploads/galleries/thumbnail/'.$year))) {
                mkdir(public_path('/uploads/galleries/thumbnail/'.$year), 0777, TRUE);

            }

            foreach($request->file('img') as $image)
            {
                $extension = $image->getClientOriginalExtension();
                $fileName = rand(10,10000).time().'.'.$extension;
                $destinationPath = public_path('/uploads/galleries/thumbnail/'.$year);
                $img = Image::make($image->path());
                $img->resize(750, 450, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($destinationPath.'/'.$fileName);
                $image->move(public_path('uploads/galleries/'), $fileName);
                unlink(public_path('uploads/galleries/'.$fileName));
                $data[] = $fileName;
            }
            foreach($data as $item){
                $dataArray = array(
                    "image"=>$year.'/'.$item,
                    "create_user"=>session('userID'),
                    "created_at"=>date('Y-m-d h:i:s')
                );
                Gallery::create($dataArray);
            }

            return back()
                ->with('toast_success','Gallery Successfully Added.');
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
        $record = Gallery::find($id);
        $record->delete();
    }
}
