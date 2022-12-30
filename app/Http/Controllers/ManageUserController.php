<?php

namespace App\Http\Controllers;

use App\Classes\Constants\RoleType;
use App\Models\Admin;
use App\Models\Counselor;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ManageUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     *
     */
    public function index()
    {
        $userModel = User::get();
        $count = 0;

        return view('ManageUser.index', ['users' => $userModel, 'count' => $count]);
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
     */
    public function store(Request $request)
    {
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
     * @param  int  $UserID
     */
    public function edit($UserID)
    {
        $userModel = User::where('UserID', $UserID)->first();

        return view('ManageUser.edit', ['user' => $userModel]);
    }

    public function editRole($UserID)
    {
        $userModel = User::where('UserID', $UserID)->first();

        return view('ManageUser.edit-role', ['user' => $userModel]);
    }
    public function editCredential($UserID)
    {
        $userModel = User::where('UserID', $UserID)->first();

        return view('ManageUser.edit-credential', ['user' => $userModel]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $UserID
     */
    public function update(Request $request, $UserID)
    {
        $user = User::find($UserID);
        switch ($request->update_type) {

            case 'update user detail':


                $user->full_name = $request->full_name;
                $user->age = $request->age;
                $user->email = $request->email;

                $user->save();
                break;

            case 'update user role':

                $this->updateRole($request, $user);
                break;

            case 'update user credentials':
                $user->username = $request->username;
                $user->password = Hash::make($request->password);

                $user->save();
                break;

            default:
                throw new \Exception('Unexpected value');

        }

        return redirect()->route('manage-users.index');

    }

    private function updateRole(Request $request, User $user)
    {
//        dd($request);
        // find the user on all roles
        $admin = Admin::where('UserID', $user->UserID)->first();

        $student = Student::where('UserID', $user->UserID)->first();

        $counselor = Counselor::where('UserID', $user->UserID)->first();

        // delete all model roles
        if ($admin) {
            if (!strcmp($admin->staff_id, $user->id_no)) {
                Admin::destroy($admin->AdminID);
            }
        }

        if ($student) {
            if (!strcmp($student->matric_id, $user->id_no)) {
                Student::destroy($student->StudentID);
            }
        }

        if ($counselor) {
            if (!strcmp($counselor->staff_id, $user->id_no)) {
                Counselor::destroy($counselor->CounselorID);
            }
        }

        // insert data
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

        $user->id_no = $request->id_no;
        $user->role_type = $request->role_type;
        $user->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $UserID
     */
    public function destroy($UserID)
    {
        User::destroy($UserID);

        return redirect()->route('manage-users.index');
    }
}
