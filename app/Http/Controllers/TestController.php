<?php

namespace App\Http\Controllers;


use Facades\App\Repositories\TestRepository;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Cartalyst\Stripe\Stripe;
use Illuminate\Support\Str;


class TestController extends Controller
{
    public function test(){

        $stripe = Stripe::make(env('STRIPE_SECRET_KEY'));
//        $customer = $stripe->customers()->create([
//            'email' => 'john@doe.com',
//        ]);

        $customers = $stripe->customers()->all();

        $customer = $stripe->customers()->find('cus_KCCDkGdUbfAob8');

        $user = User::find(1);

        // Attach the Stripe Customer to the non Billable Entity
        $user->attachStripeCustomer('cus_5Nq3Ee9rD5wLde');

        dd($user);

        dd($stripe, $customers, $customer);

//        DB::enableQueryLog();
//
//        dd('Cache:', TestRepository::all('name'), 'DB: ', DB::getQueryLog());
    }
}
