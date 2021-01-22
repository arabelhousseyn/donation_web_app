<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class stateController extends Controller
{
    public function getAllstatesByIdCountry()
    {
       return  DB::table('proviances')->where(['id_country'=> 1])->get();
    }
}
