<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UsersExport;

class PageController extends Controller
{
    public function index()
    {
        $title = "Quản lý thông tin";

        return view('frontends.home.index', compact('title'));
    }

    public function add()
    {
        $title = "Thêm thông tin";

        return view('frontends.home.add', compact('title'));
    }
    public function charts()
    {
        $title = "Thống kê";

        return view('frontends.charts.index', compact('title'));
    }

    public function add_store(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email|unique:users,email',
            'name' => 'required|string|max:255',
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'password' => 'required|string|min:8',
        ], [
            'email.required' => 'The email field is required.',
            'email.email' => 'Please enter a valid email address.',
            'email.unique' => 'This email address is already taken.',
            'name.required' => 'The name field is required.',
            'name.string' => 'The name must be a string.',
            'name.max' => 'The name may not be greater than 255 characters.',
            'avatar.required' => 'The avatar field is required.',
            'avatar.image' => 'The avatar must be an image.',
            'avatar.mimes' => 'The avatar must be a file of type: jpeg, png, jpg, gif.',
            'avatar.max' => 'The avatar may not be greater than 2048 kilobytes.',
            'password.required' => 'The password field is required.',
            'password.string' => 'The password must be a string.',
            'password.min' => 'The password must be at least 8 characters.',
        ]);

        if ($request->hasFile('avatar')) {
            $fileName = $request->file('avatar')->store('avatars', 'public');
            $data['avatar'] = $fileName;
        }

        $data['password'] = Hash::make($data['password']);

        User::create($data);

        return redirect()->route('index');
    }

    public function excel()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }
}
