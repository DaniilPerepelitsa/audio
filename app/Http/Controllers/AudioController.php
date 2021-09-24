<?php

namespace App\Http\Controllers;

use App\Models\Audio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use wapmorgan\Mp3Info\Mp3Info;

class AudioController extends Controller
{
    public function uploadForm(){
        return view('audio/main');
    }

    public function myMusic(){
        return view('audio/my_music', ['auth_id' => Auth::id()]);
    }

    public function uploadAudio(Request $request){

        $audio = new Audio();

        foreach ($request->file('file') as $file) {
            $path = Storage::disk('mp3')->putFileAs('/', $file, $file->getClientOriginalName());
//            $url = Storage::disk('mp3')->url($path);
            $track = new Mp3Info(Storage::disk('mp3')->path($path));
            $audio->title = $file->getClientOriginalName();
            $audio->path = $path;
            $audio->duration = floor($track->duration / 60).'.'.floor($track->duration % 60);
            $audio->duration_in_sec = $track->duration;
            $audio->user_id = Auth::id();
            $audio->save();
        }

        return redirect('audio/player');
    }


    public function playerView(){
        return view('audio/player');
    }

    public function getPlaylist(){

        $playlist = Audio::where('user_id', Auth::id())
            ->orderBy('id', 'DESC')
            ->paginate(50)
            ->toArray();

        $playlist['data'] = array_map(function(array $audio) {
            return [
                'id' => $audio['id'],
                'title' => $audio['title'],
                'path' => Storage::disk('mp3')->url($audio['path']),
                'duration' => $audio['duration'],
                'duration_in_sec' => $audio['duration_in_sec'],
            ];
        },$playlist['data']);

        return response()->json($playlist);
    }
}
