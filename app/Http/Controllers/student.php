<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use App\Models\stu_details;

class student extends Controller
{
    function returnStudentView(){
        return view('student');
    }

    function returnAddUserView(){
        return view('addUser');
    }

    function AddUsers(Request $request){
        $data = $request->all();

        $item = stu_details::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'NIC' => $data['NIC'],
    
        ]);
        if ($item) {
            return response('Success', 200);
        } else {
            return response('Error', 400);
        }
     

    }
    

    function viewUsers(){
        $data = stu_details::all();
        return view('viewUsers')->with('data',$data);

    }

    function deleteUser($id){
        $data = stu_details::find($id);
        $data->delete();
        return redirect()->back()->with('delete','Data successfully deleted');

    }


    public function editUserView($id) // displaye edituserview with id 
    {
        $user = stu_details::find($id);  // find the user with id from stu_details model
        return view('editUser', compact('user')); //found user passed to the view edituser
    }

public function updateUser(Request $request, $id)  // hadel update of user info
                                                    // request- hold incoming request data
{
    $data = $request->all(); //retrive all data submitted in requset
    $user = stu_details::find($id); 

    if (!$user) {
        return redirect('/viewUsers')->with('error', 'User not found');
    }

    $user->update([
        'name' => $data['name'],
        'email' => $data['email'],
        'phone' => $data['phone'],
        'NIC' => $data['NIC'],
    ]);

    return redirect('/viewUsers')->with('success', 'User updated successfully');
}
}


