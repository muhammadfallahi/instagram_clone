<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $inputsearch = $request['inputsearch'];
        $keyResult = DB::table('users')
        ->where('username', 'like', '%' .$inputsearch. '%')
        ->get();
        echo $keyResult;
    }

    public function searchtags(Request $request)
    {
        $inputsearch = $request['inputsearch'];
        
            $inputsearch = ltrim($inputsearch, "#");
            $keyResult = DB::table('tags')
            ->where('title', 'like', '%' .$inputsearch. '%')
            ->get();
            echo $keyResult;
    }
}
