<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
class reportController extends Controller
{
    public function getAllReports()
    {
        return DB::table('types_reportss')->get();
    }
    public function report(request $req)
    {
          $date = date('Y-m-d');
          $data = DB::table('reports')->insert([
              'id_post' => Session::get('id_post'),
              'id_reporter'=> Session::get('donation'),
              'id_type_report' => $req->type,
              'date' => $date,
              'description' => $req->description
          ]);
          Session::forget('id_post');
          return "yes";
    }
}
