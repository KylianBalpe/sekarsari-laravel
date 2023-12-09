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
            'email' => 'balpamula@gmail.com',
            'password' => bcrypt('password'),
            'is_admin' => true
        ]);

        User::create([
            'name' => 'Jotaro Kujo',
            'username' => 'jojo',
            'email' => 'jojo@gmail.com',
            'password' => bcrypt('password'),
            'is_admin' => false
        ]);

        User::create([
            'name' => 'Bal Iqbal',
            'username' => 'baliqbal',
            'email' => 'baliqbal@gmail.com',
            'password' => bcrypt('password'),
            'is_admin' => false
        ]);

        Product::create([
            'nama' => 'Paket Satu',
            'slug' => 'paket-hemat',
            'deskripsi' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. At, natus.onsectetur laboriosam, temporibus officiis cum expedita inventore dolores quam. Cum quisquam ipsam suscipit a maxime laudantium impedit nihil, quam provident cupiditate at atque aspernatur recusandae dignissimos dolorem dolorum libero natus assumenda distinctio quia voluptatem quidem.</p><p>Dolore, esse minus! Id minus quod voluptas magni nulla vel qui fuga error veniam. Ducimus nisi unde minus autem laudantium.CAccusamus, necessitatibus? Fugit dolore commodi animi corporis amet. Sapiente ipsam fugiat minima, perspiciatis possimus accusantium. Excepturi facere voluptates iusto expedita vitae a ducimus natus incidunt minus dicta eum eaque ullam aliquid amet eveniet dolorum, eius laborum error officia, dolor, delectus voluptate odio! At nobis dolores id ut quasi, voluptatibus nihil sit nemo suscipit assumenda necessitatibus.</p>',
            'harga' => 32000
        ]);

        Product::create([
            'nama' => 'Paket Dua',
            'slug' => 'paket-dua',
            'deskripsi' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. At, natus.onsectetur laboriosam, temporibus officiis cum expedita inventore dolores quam. Cum quisquam ipsam suscipit a maxime laudantium impedit nihil, quam provident cupiditate at atque aspernatur recusandae dignissimos dolorem dolorum libero natus assumenda distinctio quia voluptatem quidem.</p><p>Dolore, esse minus! Id minus quod voluptas magni nulla vel qui fuga error veniam. Ducimus nisi unde minus autem laudantium.CAccusamus, necessitatibus? Fugit dolore commodi animi corporis amet. Sapiente ipsam fugiat minima, perspiciatis possimus accusantium. Excepturi facere voluptates iusto expedita vitae a ducimus natus incidunt minus dicta eum eaque ullam aliquid amet eveniet dolorum, eius laborum error officia, dolor, delectus voluptate odio! At nobis dolores id ut quasi, voluptatibus nihil sit nemo suscipit assumenda necessitatibus.</p>',
            'harga' => 35000
        ]);

        Order::create([
            'user_id' => 2,
            'product_id' => 2,
            'alamat' => 'Kertosono',
            'disajikan' => Carbon::now(),
            'total' => 5,
            'price' => 175000,
            'status_payment' => 'Belum Dibayar'
        ]);

        Order::create([
            'user_id' => 2,
            'product_id' => 1,
            'alamat' => 'Patianrowo',
            'disajikan' => Carbon::now(),
            'total' => 2,
            'price' => 64000,
            'status_payment' => 'Sudah Dibayar'
        ]);

        Order::create([
            'user_id' => 3,
            'product_id' => 1,
            'alamat' => 'Patianrowo',
            'disajikan' => Carbon::now(),
            'total' => 5,
            'price' => 160000,
            'status_payment' => 'Sudah Dibayar'
        ]);

        Order::create([
            'user_id' => 3,
            'product_id' => 2,
            'alamat' => 'Kertosono',
            'disajikan' => Carbon::now(),
            'total' => 5,
            'price' => 160000,
            'status_payment' => 'Sudah Dibayar'
        ]);
    }
}
