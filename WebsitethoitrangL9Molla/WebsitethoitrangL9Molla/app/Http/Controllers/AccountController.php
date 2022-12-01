<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use App\Rules\MatchOldPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function account()
    {
        $profile=Auth()->user();
        $orders=\DB::table('orders')->where('user_id','=',auth()->user()->id)->get();
        // dd($orders);
        $userProfile=User::where('id','=',auth()->user()->id)->get();
        return view('frontend.pages.myaccount')->with('profile',$profile)
        ->with('userProfile',$userProfile)
        ->with('orders',$orders);
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password'=>['required',new MatchOldPassword],
            'new_password'=>['required'],
            'new_confirm_password'=>['same:new_password']
        ]);
        User::find(auth()->user()->id)->update(['password'=>Hash::make($request->new_password)]);
        return redirect()->route('home')->with('success','Thay đổi mật khẩu thành công');
    }

    public function proFileUpdate(Request $request,$id)
    {
        $user=User::findOrFail($id);
        $data=$request->all();
        $status=$user->fill($data)->save();
        if($status){
            request()->session()->flash('success','Cập nhật tài khoản thành công!');
        }
        else{
            request()->session()->flash('error','Đã xảy ra lỗi khi lưu dữ liệu');
        }
        return redirect()->back();
    }
}
