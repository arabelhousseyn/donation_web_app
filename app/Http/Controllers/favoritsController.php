<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
class favoritsController extends Controller
{
    public function LikePost(request $req)
    {
        $check = DB::table('favoritss')->where([['id_post','=',$req->id],["id_user",'=',Session::get('donation')]])->get();
        if(count($check) !== 0)
        {
           return "no";
        }else{
            $data =  DB::table('favoritss')->insert([
                'id_post' => $req->id,
                'id_user' => Session::get('donation')
            ]);
     
            return "yes";
        }
    }

    public function getAllFavoritsByUser(request $req)
    {
        $data = DB::table('userss')->where(['username'=>$req->username])->get();
        $ids = array();
        $d = 0;
        foreach($data as $value)
        {
            $d = $value->id;
          $data2 = DB::table('favoritss')->where(['id_user'=>$value->id])->get();
          foreach($data2 as $vl)
          {
              array_push($ids,$vl->id_post);
          }
        }
    
      
            return DB::table('favoritss')
            ->join('userss',function($join) use($d){
               $join->on('favoritss.id_user','=','userss.id')
               ->where('favoritss.id_user','=',$d);
            })->join('postss','favoritss.id_post','=','postss.id')
            ->get();

    }

    public function unlike(request $req)
    {
       $data = DB::table('favoritss')->where([['id_post','=',$req->id],['id_user','=',Session::get('donation')]])->delete();
       return "yes";
    }
}
