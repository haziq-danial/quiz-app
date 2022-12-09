<?php

namespace App\Http\Controllers\Auth;

use App\Classes\Constants\RoleType;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Counselor;
use App\Models\Student;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'username' => ['required', 'string', 'max:255'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'full_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'id_no' => ['required'],
            'age' => ['required'],
        ]);

        $user = User::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'full_name' => $request->full_name,
            'role_type' => $request->role_type,
            'email' => $request->email,
            'id_no' => $request->id_no,
            'age' => $request->age
        ]);

        $user_type = null;
        switch ($request->role_type) {
            case RoleType::ADMIN:
                $user_type = Admin::create([
                    'UserID' => $user->UserID,
                    'staff_id' => $request->id_no
                ]);
//                $user->assignRole('admin');
                break;
            case RoleType::STUDENT:
                $user_type = Student::create([
                    'UserID' => $user->UserID,
                    'matric_id' => $request->id_no
                ]);
//                $user->assignRole('student');
                break;

           case RoleType::COUNSELOR:
                $user_type = Counselor::create([
                    'UserID' => $user->UserID,
                    'staff_id' => $request->id_no
                ]);
//                $user->assignRole('counselor');
                break;
        }

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::DASHBOARD);
    }
}
