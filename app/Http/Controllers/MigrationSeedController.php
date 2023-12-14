<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class MigrationSeedController extends Controller
{
    public function migrateFreshSeed()
    {
        Artisan::call('migrate:fresh --seed');

        toastr()->success('Migrasi berhasil!', ['closeButton' => true]);
        return redirect('/admin');
    }
}
