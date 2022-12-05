<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Member;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use RealRashid\SweetAlert\Facades\Alert;
use Session;
use Image;

class ClubMembersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Member::with('membership_type_name')->select('*')->orderBy('member_id','asc')->get();

        return view('admin/club_members_list',['data'=> $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $membership_type = DB::table('membership_types')->get();
        return view('admin/club_member_add_form',['membership_type' => $membership_type]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $member_id = $request->input('member_id');
        $member_name = $request->input('member_name');
        $present_address = $request->input('present_address');
        $email = $request->input('email');
        $member_mobile = $request->input('member_mobile');
        $membership_type = $request->input('membership_type');
        $_mem_ref = $request->input('_mem_ref');
        $admit_date = date('Y-m-d',strtotime($request->input('admit_date')));
        $admit_fee = $request->input('admit_fee');

        if($request->hasFile('photo')){
            $image = $request->file('photo');
            $extension = $image->getClientOriginalExtension();
            $fileName = time().'.'.$extension;
            $destinationPath = public_path('/uploads/club_members/thumbnail');
            $img = Image::make($image->path());
            $img->resize(300, 350, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$fileName);
            $image->move(public_path('uploads/club_members'), $fileName);

            $data = array(
                'member_id'=>$member_id,
                "member_photo"=>$fileName,
                "member_name"=>$member_name,
                "member_address"=>$present_address,
                "member_email"=>$email,
                "member_mobile"=>$member_mobile,
                "membership_type_id"=>$membership_type,
                "membership_reference"=>$_mem_ref,
                "member_join_date"=>$admit_date,
                "membership_fee"=>$admit_fee,
                "create_user"=>session('userID'),
                "created_at"=>date('Y-m-d h:i:s')
            );
            Member::create($data);

            return back()
                ->with('toast_success','Members Information Successfully Added.');
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
        $members_info = Member::find($id);

        require_once base_path() . '/vendor/autoload.php';

        $mpdf = new \Mpdf\Mpdf();
        $html = view('admin/club_member_info',['data'=> $members_info]);
        $mpdf->WriteHTML($html);
        $mpdf->Output('club_member.pdf','I');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $membership_type = DB::table('membership_types')->get();
        $data = Member::find($id);
        return view('admin/club_member_edit_form',['data' => $data, 'membership_type' => $membership_type]);
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
        $member_id = $request->input('member_id');
        $member_name = $request->input('member_name');
        $present_address = $request->input('present_address');
        $email = $request->input('email');
        $member_mobile = $request->input('member_mobile');
        $membership_type = $request->input('membership_type');
        $_mem_ref = $request->input('_mem_ref');
        $admit_date = date('Y-m-d',strtotime($request->input('admit_date')));
        $admit_fee = $request->input('admit_fee');

        if($request->hasFile('photo')){
            $image = $request->file('photo');
            $extension = $image->getClientOriginalExtension();
            $fileName = time().'.'.$extension;
            $destinationPath = public_path('/uploads/club_members/thumbnail');
            $img = Image::make($image->path());
            $img->resize(300, 350, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$fileName);
            $image->move(public_path('uploads/club_members'), $fileName);

            $data = array(
                'member_id'=>$member_id,
                "member_photo"=>$fileName,
                "member_name"=>$member_name,
                "member_address"=>$present_address,
                "member_email"=>$email,
                "member_mobile"=>$member_mobile,
                "membership_type_id"=>$membership_type,
                "membership_reference"=>$_mem_ref,
                "member_join_date"=>$admit_date,
                "membership_fee"=>$admit_fee,
                "update_user"=>session('userID'),
                "updated_at"=>date('Y-m-d h:i:s')
            );
            $record = Member::find($id);
            $record->update($data);

            return back()
                ->with('toast_success','Members Information Successfully Updated.');
        }else{
            $data = array(
                'member_id'=>$member_id,
                "member_name"=>$member_name,
                "member_address"=>$present_address,
                "member_email"=>$email,
                "member_mobile"=>$member_mobile,
                "membership_type_id"=>$membership_type,
                "membership_reference"=>$_mem_ref,
                "member_join_date"=>$admit_date,
                "membership_fee"=>$admit_fee,
                "update_user"=>session('userID'),
                "updated_at"=>date('Y-m-d h:i:s')
            );
            $record = Member::find($id);
            $record->update($data);

            return back()
                ->with('toast_success','Members Information Successfully Updated.');
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
        $record = Member::find($id);
        $record->delete();
    }

    public function members_payment_history(Request $request){
        $memberID = $request->input('id');
        $member = Member::find($memberID);
        $memberID = $member->id;
        $member_name = $member->transactions($memberID);

        return view('admin/reports/members_payment_history',['member_name'=> $member_name]);
    }
}
