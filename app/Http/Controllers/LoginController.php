<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        return view('login.login');
    }
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);
        $remember_me = $request->has('remember_me') ? true : false;

        if (Auth::guard('user')->attempt($credentials, $remember_me)) {
            $request->session()->regenerate();
            return redirect()->intended(route('home'))->with('success');
        }


        return back()->withErrors([
            'email' => 'email or password wrong!',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect(route('index'));
    }
    public function create()
    {
        return view('login.register');
    }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'phone_number' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|unique:users|min:10|max:13',
            'alamat' => 'required',
            'password' => 'required',
            'image' => 'required'
        ]);
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->alamat = $request->alamat;
        $user->phone_number = $request->phone_number;
        $user->password = bcrypt($request->password);
        if ($request->file('image')) {
            $file = $request->file('image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('public/Image'), $filename);
            $user['image'] = $filename;
        }
        // dd($user);
        $user->save();
        return redirect()->route('index')->with('sukses', 'Akun Berhasil Dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\login  $login
     * @return \Illuminate\Http\Response
     */
    public function show(login $login)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\login  $login
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('login.setprof', [
            'user' => $user
        ]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\login  $login
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'phone_number' => 'regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:15',
        ]);
        $user = User::findOrfail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->alamat = $request->alamat;
        $user->phone_number = $request->phone_number;
        if ($request->file('image')) {
            $file = $request->file('image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('public/Image'), $filename);
            $user['image'] = $filename;
        }
        $user->save();
        // return redirect()->route('home')->with('sukses', 'data telah diganti');
        return redirect()->back()->with(['user' => $user]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\login  $login
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user = User::findOrfail(Auth::user()->id);

        Auth::logout();

        if ($user->delete()) {

            return redirect()->route('home');
        }
    }
}
