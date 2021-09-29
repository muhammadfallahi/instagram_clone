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
}
