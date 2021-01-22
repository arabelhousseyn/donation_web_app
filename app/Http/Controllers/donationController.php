<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class donationController extends Controller
{
    public function getAll()
    {
        return DB::table('type_donations')->get();
    }

    public function removeDonation(request $req)
    {
        $data = DB::table('postss')->where(['id'=>$req->id])->delete();
        return "yes";
    }
}
