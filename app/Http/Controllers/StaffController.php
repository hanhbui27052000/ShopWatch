<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use App\Roles;
use DB;
use Auth;
Use Alert;
class StaffController extends Controller
{
    public function index() 
    {
        $users = User::join('user_role','users.id','=','user_role.user_id')
                ->join('roles','roles.id','=','user_role.roles_id')
                ->select('users.id','users.name','users.date_of_birth','users.gender','roles.slug','users.email','users.password','users.image','users.address','users.phone_number')
                ->orderBy('users.id','asc')
                ->get();
                
        return view('view_admin.staff.index',compact('users'));
    }

    public function formAdd_Staff()
    {
        return view('view_admin.staff.add-staff');
    }

    public function add_Staff(Request $request)
    {
        
        $countEmail = User::select('email')->where('email',$request->email)->count();
        if($request->password != $request->passwordEnter){
            toast('Mật khẩu nhập lại không khớp!','error');
            return redirect()->action('StaffController@formAdd_Staff');
        }
        else if($countEmail >=1){
            toast('Email đã được sử dụng!','error');
            return redirect()->action('StaffController@formAdd_Staff');
        }
        else{
            if($request->chucvu == 3){
                $OBJ_User = new User();
                $OBJ_User->name = $request->name;
                $OBJ_User->date_of_birth = $request->date_of_birth;
                $OBJ_User->gender = $request->gender;
                $OBJ_User->email = $request->email;
                $OBJ_User->image = $request->image;
                $OBJ_User->address = $request->address;
                $OBJ_User->phone_number = $request->phone_number;
                $OBJ_User->status = 1;
                $OBJ_User->save();
            }
            else{
                $OBJ_User = new User();
                $OBJ_User->name = $request->name;
                $OBJ_User->date_of_birth = $request->date_of_birth;
                $OBJ_User->gender = $request->gender;
                $OBJ_User->email = $request->email;
                $OBJ_User->password = bcrypt($request->password);
                $OBJ_User->image = $request->image;
                $OBJ_User->address = $request->address;
                $OBJ_User->phone_number = $request->phone_number;
                $OBJ_User->status = 1;
                $OBJ_User->save();
            }
            
            $get_user = User::where('email','like', $request->email)->first();
            $user_id = $get_user->id;
            $role_id = $request->role;
            DB::table('user_role')->insert([
                'user_id' =>  $user_id,
                'roles_id' => $role_id
            ]);
            alert()->success('Thông Báo','Thêm tài khoản nhân viên thành công!');
            return redirect()->action('StaffController@formAdd_Staff');
        }

    }

    public function formEdit_Staff($id){

        $getUser = User::join('user_role','users.id','=','user_role.user_id')
                ->join('roles','roles.id','=','user_role.roles_id')
                ->select('users.id','users.name','users.date_of_birth','users.gender','roles.id as user_id','users.email','users.password','users.image','users.address','users.phone_number')
                ->where('users.id',$id)
                ->first();
         return view('view_admin.staff.edit-staff',compact('getUser'));
    }

    public function update_Staff(Request $request,$id){

        $update_Staff = User::find($id);
        $update_Staff->name = $request->nameEdit;
        $update_Staff->date_of_birth = $request->dateOfBirthEdit;
        $update_Staff->gender = $request->genderEdit;
        $update_Staff->image = $request->imageEdit;
        $update_Staff->address = $request->addressEdit;
        $update_Staff->phone_number = $request->phoneNumberEdit;
        $update_Staff->save();

        DB::table('user_role')->where('user_id',$id)
        ->update(['roles_id' => $request->roleEdit]);
              
        alert()->success('Thông Báo','Cập nhật tài khoản nhân viên thành công!');
        return redirect()->action('StaffController@index');
       
    }

    public function delete_Staff($id){

        User::destroy($id);
		
        alert()->success('Thông Báo','Xóa tài khoản nhân viên thành công!');
        return redirect()->action('StaffController@index');
       
    }
    
}