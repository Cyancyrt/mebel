<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\check;
use App\Models\Mebel;
use App\Models\produk;
use App\Models\history;
use App\Models\checkout;
use App\Models\comment;
use App\Models\Kategori;
use App\Models\tag;
use Conner\Tagging\Model\Tag as ModelTag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;

class MebelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home.landing');
    }
    public function info()
    {
        return view('home.about');
    }
    public function home(Request $request)
    {
        $user = User::all();
        $cari = $request->cari;
        $produks = produk::all();
        return view('home.dashboard', [
            'user' => $user,
            'produks' => $produks,
            'cari' => $cari
        ]);
    }
    public function about()
    {
        return view('home.about');
    }
    public function produk(Request $request)
    {
        $produks = produk::all();
        $cari = $request->cari;
        $produks = produk::where('nama', 'like', "%" . $cari . "%")
            ->orWhere('produk', 'like', "%" . $cari . "%")
            ->orWhere('kategori_name', 'like', "%" . $cari . "%")->paginate(6);
        $kategori = kategori::all();
        return view('home.produk.index', [
            'produks' => $produks,
            'kategori' => $kategori,
            'cari' => $cari
        ]);
    }
    public function addToCart(Request $request)
    {
        // dd($produk);
        $user = auth()->user();
        $dd = check::where('user_id', $user->id)->get();
        if ($dd == true) {
            if ($cart = $user->check->where('produk_id', $request->produk_id)->first()) {
                $cart->kuantitas += 1;
                $sum = $cart->harga * $cart->kuantitas;
                $cart->total = $sum;
                // dd($cart);
                $cart->save();
                return redirect()->back()->with('success', 'Updated');
            } else {
                check::create([
                    'produk_id' => $request->produk_id,
                    'user_id'  => $user->id,
                    'harga' => $request->harga,
                    'check_produk' => $request->check_produk,
                    'kuantitas' => 1,
                    'total' => $request->harga
                ]);
            }
        }




        return back()->with('success', 'Product is Added to Cart Successfully !');
    }
    public function kategori(produk $produks, Kategori $kategori)
    {
        $produks = produk::where('kategori_id', $produks->kategori_id)->get();
        $produks = $kategori->produk->load('kategori');
        return view('home.produk.kategori', [
            'produks' => $produks
        ]);
    }
    public function tags(produk $produks, tag $tags)
    {
        $tag = tag::where('tag_id', $tags->id)->get();
        $tags = $tag->produk->load('produk');
        return view('home.produk.tags', [
            'tags' => $tags
        ]);
    }
    public function detail(Request $request, $id)
    {
        $komen = comment::where('produk_id', $id)->get()->all();
        $user = user::all();
        // dd($komen);
        $produk = produk::all()->where('id', $id)->first();
        return view('home.produk.detail', [
            'produk' => $produk,
            'komen' => $komen,
            'user' => $user
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }
    public function cart(Request $request)
    {

        // $check = check::where('id', 6)->get();
        // dd($check);
        $check = check::all();
        $user = Auth::user();

        if (!empty($user->check)) {
            $subtotal = $user->check->pluck('total');
            $harga = $subtotal->sum();
        }

        $checkout = checkout::all();

        return view('home.produk.cart', [
            'check' => $check,
            'harga' => $harga,
            'user' => $user,
            'checkout' => $checkout,
        ]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function inc($id)
    {
        $cart = check::where('id', $id)->get()->first();
        // dd($cart);
        $op = $cart->kuantitas += 1;
        $sum = $cart->harga * $op;
        $cart->total = $sum;
        $cart->save();
        return back()->with('success', 'pesanan telah ditambahkan');
    }
    public function dec($id)
    {
        $cart = check::where('id', $id)->get()->first();
        $op = $cart->kuantitas -= 1;
        $sum = $cart->harga * $op;
        $cart->total = $sum;
        $cart->save();
        return back()->with('success', 'pesanan telah dikurangi');
    }

    public function check()
    {
        $check = checkout::all();
        $user =  Auth::user();

        // dd($user->checkout);
        return view('home.check.out', [
            'check' => $check,
            'user' => $user
        ]);
    }
    public function checkStore(Request $request)
    {
        $user = Auth::user();
        $check = check::all();
        $newCheck = checkout::all();
        foreach ($check as $key) {
            $newCheck = $key->replicate();
            $newCheck->user_id = $user->id;
            $newCheck->nama_user = $user->name;
            $newCheck->alamat = $user->alamat;
            $newCheck->email = $user->email;
            $newCheck->status_id = 1;
            $newCheck->setTable('checkouts');
            $newCheck->save();

            $key->delete();
        }
        // return back();
        return redirect()->route('check');
    }
    public function history()
    {
        $history = history::all();
        $user =  Auth::user();
        return view('home.check.history', [
            'history' => $history,
            'user' => $user
        ]);
    }
    public function cari(Request $request)
    {
        $cari = $request->cari;
        $produks = produk::where('nama', 'like', "%" . $cari . "%")
            ->orWhere('produk', 'like', "%" . $cari . "%")
            ->orWhere('kategori_name', 'like', "%" . $cari . "%")->paginate(6);
        return view('home.produk.index', [
            'produks' => $produks,
            'cari' => $cari
        ]);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mebel  $mebel
     * @return \Illuminate\Http\Response
     */
    public function show(Mebel $mebel)
    {
        //
    }
    public function search()
    {
        $group = produk::with('produks.nama');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mebel  $mebel
     * @return \Illuminate\Http\Response
     */
    public function komenStore(Request $request, $id)
    {
        $produk = produk::where('id', $id)->get()->first();
        // $produk = produk::all();
        // dd($produk);
        $user = auth()->user();
        comment::create([
            'body' => $request->body,
            'user_id' => $user->id,
            'produk_id' => $produk->id
        ]);
        return back();
    }
    public function edit(Mebel $mebel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mebel  $mebel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mebel  $mebel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $check = check::findOrfail($id);

        if ($check->delete()) {
            return back()->with('success', 'has been deleted');
        }
    }
}




// $produks = produk::findOrFail($id);
//         $user = User::find($id);
//         $cart = session()->get('cart', []);

//         if (isset($cart[$id])) {
//             $cart[$id]['quantity']++;

//         } else {
//             $cart[$id] = [
//                 "name" => $produks->nama,
//                 "quantity" => 1,
//                 "price" => $produks->harga,
//             ];
//         }
//         session()->put('cart', $cart);
//         return redirect()->back()->with('success', 'Product added to cart successfully!');
