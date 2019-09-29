<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request) {
        $search = $request->get('search');
        if($search===null) {
            return redirect()->back();
        }
        return view('search')->with(compact($search));
    }
}
