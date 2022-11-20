<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\User;
use App\Models\Mebel;
use App\Models\produk;
use App\Models\Kategori;
use App\Models\status;
use App\Models\tag;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::create([
            'name' => 'Cyret',
            'email' => 'yahooholo@gmail.com',
            'image' => 'lily.jpg',
            'alamat' => 'jakarta',
            'phone_number' => '0819222222',
            'password' => bcrypt('user')

        ]);
        User::create([
            'name' => 'Cyan',
            'email' => 'wkhahack@gmail.com',
            'image' => 'lily.jpg',
            'alamat' => 'solo',
            'phone_number' => '0819222223',
            'password' => bcrypt('user')

        ]);
        Admin::create([
            'nickname' => 'admin',
            'password' => bcrypt('admin')
        ]);
        produk::create([
            'produk' => 'kursi',
            'nama' => 'kursi TK',
            'image' => 'kursi tk.jpeg',
            'harga' => 1000,
            'kategori_name' => 'kayu kalimantan',
            'kategori_id' => '1',

        ]);
        produk::create([
            'produk' => 'meja',
            'nama' => 'meja sd',
            'image' => 'meja sd.jpeg',
            'harga' => 4000,
            'kategori_name' => 'kayu jati',
            'kategori_id' => '2',

        ]);
        Kategori::create([
            'name' => 'kayu kalimantan',
            'slug' => 'kayu-kalimantan'
        ]);
        Kategori::create([
            'name' => 'kayu jati',
            'slug' => 'kayu-jati'
        ]);
        status::create([
            'name' => 'proses',
        ]);
        status::create([
            'name' => 'dikirim',
        ]);
        status::create([
            'name' => 'selesai',
        ]);
    }
}
