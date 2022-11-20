<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;
use App\Models\check;
use App\Models\Mebel;
use App\Models\produk;
use App\Models\status;
use App\Models\history;
use App\Models\checkout;
use App\Models\Kategori;
use App\Models\tag;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return view('admin.login');
    }
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'nickname' => ['required'],
            'password' => ['required'],
        ]);
        $remember_me = $request->has('remember_me') ? true : false;

        if (Auth::guard('admin')->attempt($credentials, $remember_me)) {
            $request->session()->regenerate();
            return redirect()->intended(route('index.admin'))->with('success');
        }


        return back()->withErrors([
            'nickname' => 'email or password wrong!',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect(route('index'));
    }
    public function produk()
    {
        $produks = produk::all();
        $mebel = Mebel::all();
        return view('admin.admin', [
            'produks' => $produks,
            'mebel' => $mebel
        ]);
    }
    public function index()
    {
        // dd($user);

        return view('admin.index');
    }
    public function user()
    {
        $user = User::all();

        return view('admin.user', [
            'user' => $user
        ]);
    }
    public function order(Request $request)
    {
        $check = checkout::all();
        $status = status::all();
        return view('admin.pesanan', [
            'check' => $check,
            'status' => $status
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $mebel = Kategori::all();
        return view('admin.create', [
            'mebel' => $mebel,
        ]);
    }
    public function status(Request $request, $id)
    {
        $user = auth()->user();
        $status = checkout::where('id', $id)->get()->first();
        $status->status_id = $request->status_id;
        if ($request->status_id != 3) {
            $status->save();
        } else if ($request->status_id == 3) {
            $status->save();
            history::create([
                'status_id' => $request->status_id,
                'user_id' => $status->user_id,
                'produk' => $status->check_produk,
                'kuantitas' => $status->kuantitas,
                'harga' => $status->harga,
                'total' => $status->total,
                'alamat' => $status->alamat
            ]);
        }

        return redirect()->route('admin.order');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $kategori = Kategori::find($request->kategori_id);
        $request->validate([
            'produk' => 'required',
            'nama' => 'required',
            'harga' => 'required|numeric',
            'image' => 'required',
            'kategori_id' => 'required',
            'tags' => 'required'
        ]);
        $image = time() . '-' . $request->image->getClientOriginalName();
        $request->image->move(public_path('public/produk'), $image);
        $tags = explode(",", $request->tags);
        $produk  = produk::create([
            'produk' =>  $request->produk,
            'nama' =>  $request->nama,
            'harga' =>  $request->harga,
            'kategori_id' =>  $request->kategori_id,
            'kategori_name' =>  $kategori->name,
            'image' => $image
        ])->tag($tags);


        return redirect()->route('admin')->with('sukses', 'Data Berhasil Disimpan!');
    }
    public function tagCreate(Request $request)
    {
        Tag::create([
            'name' => $request->name,
            'slug' => str::slug($request->name)
        ]);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(produk $produk, $id)
    {
        $produk = produk::findOrfail($id);
        $mebel = Kategori::all();

        // dd($produk);
        return view('admin.edit', [
            'produk' => $produk,
            'mebel' => $mebel
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $kategori = Kategori::find($request->kategori_id);

        $request->validate([
            'produk' => 'required',
            'nama' => 'required',
            'harga' => 'required|numeric'
        ]);
        $dataproduk = produk::findOrfail($id);
        $dataproduk->produk = $request->produk;
        $dataproduk->nama = $request->nama;
        $dataproduk->harga = $request->harga;
        $dataproduk->kategori_id = $request->kategori_id;
        $dataproduk->kategori_name = $kategori->name;
        $dataproduk->save();
        return redirect()->route('admin')->with('sukses', 'data telah diganti');
    }
    public function kategoriView()
    {
        $kategori = Kategori::all();
        return view('admin.katView', ['kategori' => $kategori]);
    }
    public function kategoriCreate(Request $request)
    {

        $request->validate([
            'name' => 'required',
        ]);
        $kategori = new Kategori;
        $kategori->name = $request->name;
        $kategori->slug = Str::slug($request->name);
        $kategori->save();
        return redirect()->back()->with('sukses', 'kategori baru telah dibuat');
    }
    public function kategoriDestroy($id)
    {
        $kategori = Kategori::findOrfail($id);
        $kategori->delete();
        return redirect()->back()->with('sukses', 'kategori telah di hapus');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin, $id)
    {
        $produks = produk::findOrfail($id);

        if ($produks->delete()) {
            return redirect()
                ->route('admin')
                ->with([
                    'success' => 'Post has been deleted successfully'
                ]);
        } else {
            return redirect()
                ->route('admin')
                ->with([
                    'error' => 'Some problem has occurred, please try again'
                ]);
        }
    }
}
