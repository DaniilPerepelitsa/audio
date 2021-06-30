<?php

namespace App\Http\Controllers;


use Facades\App\Repositories\TestRepository;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    public function test(){
        DB::enableQueryLog();

        dd('Cache:', TestRepository::all('name'), 'DB: ', DB::getQueryLog());
    }
}
