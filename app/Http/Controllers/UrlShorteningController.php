<?php

namespace App\Http\Controllers;

use App\Models\UrlShortening;
use Illuminate\Http\Request;
use Str;


class UrlShorteningController extends Controller
{
    public function index(){
        $shortLinks = UrlShortening::latest()->get();
        return view('shortLink',compact('shortLinks'));
    }

    public function store(Request $request){
        $request->validate([
            'link'=>'required|url'
        ]);
        $input['link'] = $request->link;
        $input['code'] = Str::random(6);

        UrlShortening::create($input);
        return redirect('generate-shorten-link')->withSuccess('Shorten link generated successfully');

    }
    public function shortLink($code){
        $find = UrlShortening::where('code',$code)->first();
        return redirect($find->link);


    }
}
