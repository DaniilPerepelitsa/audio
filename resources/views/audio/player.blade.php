@extends('layout')

@section('title')
    My Music
@endsection

@section('content')
    <div class="container-full-width">
{{--        {!! \SimpleSoftwareIO\QrCode\Facades\QrCode::size(200)->generate('www.google.com.ua') !!}--}}
{{--        <div class="row">--}}
{{--            <div class="col-4"></div>--}}
{{--            <div class="col-4">--}}
{{--                {!!--}}
{{--                    \SimpleSoftwareIO\QrCode\Facades\QrCode::size(300)->wiFi([--}}
{{--                        'ssid' => 'Esprit@Home',--}}
{{--                        'encryption' => 'WPA2',--}}
{{--                        'password' => 'alexey1977'--}}
{{--                    ])--}}
{{--                !!}--}}
{{--            </div>--}}
{{--            <div class="col-4"></div>--}}
{{--        </div>--}}

{{--        <br>--}}
{{--        <br>--}}
        <player></player>
    </div>
@endsection
