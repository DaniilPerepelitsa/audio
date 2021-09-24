<?php

namespace App\Http\Controllers;
use App\Http\Requests;
use App\Models\User;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

class BestInterviewQuestionController extends Controller
{
    public function pdfview(Request $request)
    {
        $items = User::all();
        view()->share('items', $items);
        if($request->has('download')){
            $pdf = PDF::loadView('pdfview');
            $pdf->save(public_path('images/pdfview.pdf'), 'UTF-8');
            return response()->download(public_path('images/pdfview.pdf'));
        }
        return view('pdfview');
    }
}
