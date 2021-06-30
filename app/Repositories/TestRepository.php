<?php


namespace App\Repositories;


use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class TestRepository
{
    CONST CACHE_KEY = 'USERS';

    public function all($orderBy){

        $key = 'all.'.$orderBy;

        $cacheKey = $this->getCacheKey($key) . '.USER' . Auth::id();

        return Cache::remember($cacheKey, Carbon::now()->addSeconds(5), function () use ($orderBy) {
            return $users = User::orderBy($orderBy)->get();
        });
    }

    public function get($id){

        $key = 'get.'.$id;

        $cacheKey = $this->getCacheKey($key);

        return Cache::remember($cacheKey, Carbon::now()->addSeconds(5), function () use ($id) {
            return $users = User::find($id);
        });
    }

    public function getCacheKey($key){
        $key = strtoupper($key);
        return self::CACHE_KEY .".$key";
    }

    public function getAuthId(){
        return strtoupper('user_' . Auth::id());
    }
}
