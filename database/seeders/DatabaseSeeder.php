<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Iqbal Pamula',
            'username' => 'iqbalpamula',
            'email' => 'iqbal@gmail.com',
            'password' => bcrypt('password'),
            'is_active' => 1,
            'role' => 1
        ]);

        User::create([
            'name' => 'Jotaro Kujo',
            'username' => 'jojo',
            'email' => 'jojo@gmail.com',
            'password' => bcrypt('password'),
            'is_active' => 1,
            'role' => 2
        ]);

        User::create([
            'name' => 'Bal Iqbal',
            'username' => 'baliqbal',
            'email' => 'baliqbal@gmail.com',
            'password' => bcrypt('password'),
            'is_active' => 1,
            'role' => 3
        ]);

        Product::create([
            'nama' => 'Paket Satu',
            'slug' => 'paket-satu',
            'deskripsi' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. At, natus.onsectetur laboriosam, temporibus officiis cum expedita inventore dolores quam.</p>',
            'harga' => 32000
        ]);

        Product::create([
            'nama' => 'Paket Dua',
            'slug' => 'paket-dua',
            'deskripsi' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. At, natus.onsectetur laboriosam, temporibus officiis cum expedita inventore dolores quam.</p>',
            'harga' => 35000
        ]);

        Product::create([
            'nama' => 'Paket Tiga',
            'slug' => 'paket-tiga',
            'deskripsi' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. At, natus.onsectetur laboriosam, temporibus officiis cum expedita inventore dolores quam.</p>',
            'harga' => 45000
        ]);

        Product::create([
            'nama' => 'Paket Empat',
            'slug' => 'paket-empat',
            'deskripsi' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. At, natus.onsectetur laboriosam, temporibus officiis cum expedita inventore dolores quam.</p>',
            'harga' => 55000
        ]);

        Product::create([
            'nama' => 'Paket Lima',
            'slug' => 'paket-lima',
            'deskripsi' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. At, natus.onsectetur laboriosam, temporibus officiis cum expedita inventore dolores quam.</p>',
            'harga' => 65000
        ]);

        Order::create([
            'user_id' => 2,
            'product_id' => 1,
            'alamat' => 'Kertosono',
            'disajikan' => Carbon::now(),
            'total' => 5,
            'price' => 175000,
            'status_payment' => 'Belum Dibayar'
        ]);

        Order::create([
            'user_id' => 3,
            'product_id' => 2,
            'alamat' => 'Patianrowo',
            'disajikan' => Carbon::now(),
            'total' => 2,
            'price' => 64000,
            'status_payment' => 'Sudah Dibayar'
        ]);

        Order::create([
            'user_id' => 2,
            'product_id' => 3,
            'alamat' => 'Patianrowo',
            'disajikan' => Carbon::now(),
            'total' => 5,
            'price' => 160000,
            'status_payment' => 'Sudah Dibayar'
        ]);

        Order::create([
            'user_id' => 3,
            'product_id' => 4,
            'alamat' => 'Kertosono',
            'disajikan' => Carbon::now(),
            'total' => 5,
            'price' => 160000,
            'status_payment' => 'Sudah Dibayar'
        ]);

        Order::create([
            'user_id' => 2,
            'product_id' => 5,
            'alamat' => 'Kertosono',
            'disajikan' => Carbon::now(),
            'total' => 5,
            'price' => 175000,
            'status_payment' => 'Belum Dibayar'
        ]);
    }
}
