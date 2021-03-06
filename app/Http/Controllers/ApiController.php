<?php

namespace App\Http\Controllers;

use App\money;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ApiController extends Controller
{
    public function post(Request $request)
    {
        $now = Carbon::now();
        $today = Carbon::today();
        $param = [
            "created_at" => $today,
            "updated_at" => $now,
            "tukaimiti" => $request->tukaimiti,
            "money" => $request->money,
            "memo" => $request->memo,
        ];
        DB::insert('insert into money (created_at,updated_at,tukaimiti,money,memo)
            values (:created_at,:updated_at,:tukaimiti,:money,:memo)',$param);
        return response()->json();
    }
    public function show(Request $request)
    {
        $moneys =  money::all();
        return response()->json($moneys);
    }
}
