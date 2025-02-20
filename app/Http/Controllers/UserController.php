<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $data['title'] = 'User List';
        $data['users']= User::get();
        return view('backend.admin.user.index',$data);
    }

    public function create()
    {
        $data['title'] = 'User Create';
        return view('backend.admin.user.create',$data);
    }
    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'phone'    => 'required|string|max:20',
            'password' => 'required|min:6',
            'image'    => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        try {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->password = bcrypt($request->password);
            $user->role = $request->role;

            if ($request->hasFile('image')) {
                $imageName = date('YmdHis') . '.' . $request->file('image')->getClientOriginalExtension();
                $request->file('image')->storeAs('uploads', $imageName, 'public');
                $user->image = $imageName;
            }

            $user->save();

            return redirect()->route('user.list')->with('success', 'User created successfully.');
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to create user. Please try again.');
        }
    }


    public function edit($id)
    {
        $data['title'] = 'User Edit';
        $data['user'] = User::findOrFail($id);

        return view('backend.admin.user.create',$data);
    }

    public function show($id)
    {
        $data['title'] = 'User Edit';
        $data['user'] = User::findOrFail($id);

        return view('backend.admin.user.show',$data);
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'name'     => 'required|string|max:255',
        'email'    => 'required|email|unique:users,email,' . $id,
        'phone'    => 'required|string|max:20',
        'password' => 'nullable|min:6',
        'image'    => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
    ]);

    try {
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;

        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }

        if ($request->hasFile('image')) {
            $imageName = date('YmdHis') . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->storeAs('uploads', $imageName, 'public');
            $user->image = $imageName;
        }

        $user->save();

        return redirect()->route('user.list')->with('success', 'User updated successfully.');
    } catch (\Exception $e) {
        return back()->with('error', 'Failed to update user. Please try again.');
    }
}

    public function delete($id){
    $user = User::find($id);

    if (!$user) {
        return redirect()->route('user.list')->with('error', 'User not found.');
    }

    // Prevent deleting admin users
    if ($user->role === 'admin') {
        return redirect()->route('user.list')->with('error', 'Admin users cannot be deleted.');
    }

    $user->delete();

    return redirect()->route('user.list')->with('success', 'User deleted successfully.');
    }

}
