<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;

use App\Models\User;
use App\Models\Booking;

use Session;
use Image;

class ProfileController extends Controller
{
	public function save_basic_info(Request $request)
    {
        $user = Auth::user();

        $this->validate($request, [
            'name'  => 'required',
            'email' => 'required|unique:users,email,'.$user->id
        ]);

        $find_user = User::findOrFail($user->id);

        $find_user->name = $request->name;
        $find_user->email = $request->email;

        $find_user->save();

        Session::flash('success', 'Basic Information Updated Successfully !');
        return redirect()->back();
    }

    public function change_auth_password(Request $request)
    {
        $this->validate($request, [
            'oldpassword'           => 'required',
            'newpassword'           => 'required|string|min:8',
            'password_confirmation' => 'required|same:newpassword',
        ]);

        $hashedPassword = Auth::user()->password;
 
        if (\Hash::check($request->oldpassword , $hashedPassword )) {
 
            if (!\Hash::check($request->newpassword , $hashedPassword)) {

                $users = User::find(Auth::user()->id);
                $users->password = bcrypt($request->newpassword);

                \Cookie::queue(\Cookie::make('passwordcng', 'Password Changed Successfully ! Login again with the new password.', 0.1));
                
                User::where('id', Auth::user()->id)->update(array('password' => $users->password));
                
                return redirect('/login');
            } else {
                Session::flash('error', 'New password can\'t be same as Old Password. Update Denied !');
                return redirect()->back();
            }

        } else {
            Session::flash('error', 'The password confirmation does not match. Update Denied !');
            return redirect()->back();
        }
    }

    public function view_map(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);

        $auth = Auth::user();

        if ($auth->hasRole('Driver')) {
            if ($booking->city == $auth->city) {
                if ($booking->status == 'Pending') {
                    if ($booking->price != null) {
                        return view('backend.view-map', compact('booking'));
                    } else {
                        abort(403);
                    }
                } else {
                    if ($booking->user_id == $auth->id) {
                        return view('backend.view-map', compact('booking'));
                    } else {
                        abort(403);
                    }
                }
            } else {
                abort(403);
            }
        } elseif ($auth->hasRole('Administrator')) {
            return view('backend.view-map', compact('booking'));
        }
    }
}
