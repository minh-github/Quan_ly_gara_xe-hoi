<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function myaccount()
    {
        return view('pages.myprofile');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('pages.list-user', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.add-user');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $data)
    {
        $this->validate($data, [
            'email' => [
                'required',
                Rule::unique('users')->ignore($data->id),
            ],
        ]);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'Avatar' => 'img/default_avt.png',
            'role' => '0',
        ]);
        if ($user) {
            return redirect('/danh-sach-user')->with('success', 'Thêm người dùng thành công !');
        }

        return redirect('/danh-sach-user');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::where('id', $id)->first();
        return view('pages.detail-user', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $user->role = '1';
        $user->save();
        if ($user) {
            return redirect()->back()->with('success', 'Cấp quyền thành công !');
        }
        return redirect()->back()->with('error', 'Cấp quyền thất bại !');
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
        $user = User::find($id);
        if ($request['email'] != $user->email) {
            if (!Hash::check($request['matKhauCu'], $user->password)) {
                return back()->with('error', 'mật khẩu cũ không chính xác');
            }
            $validated = $request->validate([
                'tenNguoiDung' => 'required|max:30|min:2',
                'matKhauCu' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required|confirmed|min:6',
            ]);
            if ($request->file('fileUpload')) {
                $avatar = $request->file('fileUpload');
                $fileName = time() . '.' . $avatar->getClientOriginalName();
                $storedPath = $avatar->move('images', $fileName, $avatar->getClientOriginalName());
                $user->Avatar = 'images/' . $fileName;
                $user->save();
            }

            if ($request['email'] != $user->email || !Hash::check($request['password'], $user->password)) {
                $user->name = $request['tenNguoiDung'];
                $user->email = $request['email'];
                $user->password = Hash::make($request['password']);
                $user->name = $request['tenNguoiDung'];
                $user->save();
                Auth::logout();
            }
            return back()->with('success', 'cập nhật thông tin thành công');
        }
        if (!Hash::check($request['password'], $user->password)) {
            if (!Hash::check($request['matKhauCu'], $user->password)) {
                return back()->with('error', 'mật khẩu cũ không chính xác');
            }
            $validated = $request->validate([
                'tenNguoiDung' => 'required|max:30|min:2',
                'matKhauCu' => 'required',
                'password' => 'required|confirmed|min:6',
            ]);
            if ($request->file('fileUpload')) {
                $avatar = $request->file('fileUpload');
                $fileName = time() . '.' . $avatar->getClientOriginalName();
                $storedPath = $avatar->move('images', $fileName, $avatar->getClientOriginalName());
                $user->Avatar = 'images/' . $fileName;
                $user->save();
            }

            if (!Hash::check($request['password'], $user->password)) {
                $user->name = $request['tenNguoiDung'];
                $user->email = $request['email'];
                $user->password = Hash::make($request['password']);
                $user->name = $request['tenNguoiDung'];
                $user->save();
                Auth::logout();
            }
            return back()->with('success', 'cập nhật thông tin thành công');
        } else {
            if ($request->file('fileUpload')) {
                $avatar = $request->file('fileUpload');
                $fileName = time() . '.' . $avatar->getClientOriginalName();
                $storedPath = $avatar->move('images', $fileName, $avatar->getClientOriginalName());
                $user->Avatar = 'images/' . $fileName;
                $user->save();
            }
            return back()->with('success', 'cập nhật thông tin thành công');
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
        //
    }
}
