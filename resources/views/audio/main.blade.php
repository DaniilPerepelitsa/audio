@extends('layout')

@section('content')
    <div style="height: 100%; background-color: #1b1e21">
    <header>
        <div class="row" style="width: 100%; margin-top: 5px">
            <div class="col-6" style="text-align: left">
                <h4><b>My Music</b></h4>
            </div>
            <div class="col-3"></div>
            <div class="col-3" style="text-align: right">
                <h5>
                    <a href="/audio/player" style="color: white; text-decoration: none">My music</a>
                </h5>
            </div>
        </div>
    </header>
    <br>

    <div class="container-full-width">

        <div class="row">
            <div class="col" style="text-align: end">
            </div>
            <div class="col" style="text-align: center">
                <form method="post" action="{{ route('upload.audio') }}" enctype="multipart/form-data">
                    <input class="form-control" name="_token" type="hidden" value="{{ csrf_token() }}">
                    <div class="row">
                        <div class="col"></div>
                        <div class="col-6" style="text-align: left;">
                            <label class="custom-file-upload" style="border: 1px solid #F1C40F; text-align: center; display: inline-block; padding: 6px 12px; cursor: pointer; width: 250px; color: #F1C40F;">
                                <input type="file" style="display: none" multiple name="file[]">
                                Choose files
                            </label><br>
                            <hr>
                        </div>
                        <div class="col"></div>
                    </div>
                    <div class="row">
                        <div class="col"></div>
                        <div class="col-6">
                            <button class="button" type="submit" style="color: #F1C40F;  width: 250px; height: 25px; font-size: 14px; text-decoration:none">
                                Upload <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                            width="18" height="18"
                                            viewBox="0 0 225 225"
                                            style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,225.99419v-225.99419h225.99419v225.99419z" fill="none"></path><g fill="#f1c40f"><path d="M130.5,20.39063c-22.53515,0 -43.13672,13.07813 -53.01562,33.04688c-5.11524,-3.375 -11.17969,-5.20312 -17.4375,-5.20312c-16.66406,0 -30.25195,13.00781 -31.35937,29.39063c-17.01562,6.20508 -28.6875,22.60547 -28.6875,40.92188c0,23.99414 19.45899,43.45313 43.45313,43.45313h64.54688v-47.67187l-14.76562,14.90625c-1.75781,1.75781 -4.71094,1.75781 -6.46875,0c-1.75781,-1.75781 -1.75781,-4.71094 0,-6.46875l25.73438,-25.59375l25.73438,25.59375c1.75781,1.75781 1.75781,4.71094 0,6.46875c-0.8789,0.87891 -2.07422,1.26563 -3.23437,1.26563c-1.16015,0 -2.35547,-0.38672 -3.23437,-1.26562l-14.76562,-14.90625v47.67188h67.92188c22.0957,0 40.07813,-18 40.07813,-40.07812c0,-20.46094 -15.41601,-37.40625 -35.4375,-39.79687c0.05274,-0.8789 0.14063,-1.70508 0.14063,-2.53125c0,-32.625 -26.57812,-59.20312 -59.20312,-59.20312zM117,162h-9v31.5c0,2.4961 2.02149,4.5 4.5,4.5c2.47851,0 4.5,-2.0039 4.5,-4.5z"></path></g></g></svg>
                                <div class="button__horizontal"></div>
                                <div class="button__vertical" ></div>
                            </button>
                            {{--                    <button class="btn btn-outline-dark" style="margin-left: 25%; width: 50%" type="submit">Upload</button>--}}
                        </div>
                        <div class="col"></div>
                    </div>
                </form>
            </div>
            <div class="col">

            </div>
        </div>


    </div>
    </div>
@endsection
