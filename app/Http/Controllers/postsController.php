<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
class postsController extends Controller
{
    public function addPost(request $req)
    {
   
        $all = "";    
        $id = 0;
        $date = date('Y-m-d');

        if($req->count == 0)
        {

            $check = DB::table('postss')->where(['title'=>$req->title])->get();
        if(count($check) !== 0)
        {
         return "nousername";
        }else{
            if($req->donation !== null)
            {
                $data = DB::table('type_donations')->where(["name"=> $req->donation])->get();
                foreach($data as $value)
                {
                    $id = $value->id;
                }
            }
            if(preg_match('/\p{Arabic}/u', $req->description))
            {
                DB::table('postss')->insert([
                    "title" => '<span style="float:right;">'. $req->title . '</span>',
                    "id_donation" => $id,
                    "id_user" => Session::get('donation'),
                    "name_donation" => $ba = $req->other == null ? "" : $req->other ,
                    "date" => $date,
                    "description" => '<span style="float:right;">'. $req->description . '</span>',
                    "images" => $all,
                    "share_link" => 'http://it-smv.com' . "/donation" . "/" . $req->title,
                    "type_post" => $req->type_post
                ]);

            }elseif(preg_match('/\p{Arabic}/u', $req->description)){
                DB::table('postss')->insert([
                    "title" => $req->title,
                    "id_donation" => $id,
                    "id_user" => Session::get('donation'),
                    "name_donation" => $ba = $req->other == null ? "" : $req->other ,
                    "date" => $date,
                    "description" => '<span style="float:right;">'. $req->description . '</span>',
                    "images" => $all,
                    "share_link" => 'http://it-smv.com' . "/donation" . "/" . $req->title,
                    "type_post" => $req->type_post
                ]); 
            }else{
                DB::table('postss')->insert([
                    "title" => $req->title,
                    "id_donation" => $id,
                    "id_user" => Session::get('donation'),
                    "name_donation" => $ba = $req->other == null ? "" : $req->other ,
                    "date" => $date,
                    "description" =>$req->description,
                    "images" => $all,
                    "share_link" => 'http://it-smv.com' . "/donation" . "/" . $req->title,
                    "type_post" => $req->type_post
                ]); 
            }
            return 'yes';
        }

        }else{
            $check = DB::table('postss')->where(['title'=>$req->title])->get();
        if(count($check) !== 0)
        {
         return "nousername";
        }else{
            for ($i=0; $i <$req->count ; $i++) { 
                $format = 'image' . strval($i);
                $path = uniqid() . '.jpg';
                $req->$format->storeAs("global",$path);
                $all .= $path . ';'; 
            }
            if($req->donation !== null)
            {
                $data = DB::table('type_donations')->where(["name"=> $req->donation])->get();
                foreach($data as $value)
                {
                    $id = $value->id;
                }
            }
            if(preg_match('/\p{Arabic}/u', $req->description))
            {
                DB::table('postss')->insert([
                    "title" => '<span style="float:right;">'. $req->title . '</span>',
                    "id_donation" => $id,
                    "id_user" => Session::get('donation'),
                    "name_donation" => $ba = $req->other == null ? "" : $req->other ,
                    "date" => $date,
                    "description" => '<span style="float:right;">'. $req->description . '</span>',
                    "images" => $all,
                    "share_link" => 'http://it-smv.com' . "/donation" . "/" . $req->title,
                    "type_post" => $req->type_post
                ]);

            }elseif(preg_match('/\p{Arabic}/u', $req->description)){
                DB::table('postss')->insert([
                    "title" => $req->title,
                    "id_donation" => $id,
                    "id_user" => Session::get('donation'),
                    "name_donation" => $ba = $req->other == null ? "" : $req->other ,
                    "date" => $date,
                    "description" => '<span style="float:right;">'. $req->description . '</span>',
                    "images" => $all,
                    "share_link" => 'http://it-smv.com' . "/donation" . "/" . $req->title,
                    "type_post" => $req->type_post
                ]); 
            }else{
                DB::table('postss')->insert([
                    "title" => $req->title,
                    "id_donation" => $id,
                    "id_user" => Session::get('donation'),
                    "name_donation" => $ba = $req->other == null ? "" : $req->other ,
                    "date" => $date,
                    "description" =>$req->description,
                    "images" => $all,
                    "share_link" => 'http://it-smv.com' . "/donation" . "/" . $req->title,
                    "type_post" => $req->type_post
                ]); 
            }
            return 'yes';
        }
        }
    }



    
    public function getAll()
    {
        return DB::table('postss')->orderBy('id','desc')->paginate(5);
    }

    public function postSession(request $req)
    {
        return Session::put('id_post',$req->id);
    }

    public function posts($title)
    {
        return view('posts',["title"=>$title]);
    }
    public function getpostByname(request $req)
    {
        if(preg_match('/\p{Arabic}/u', $req->title))
        {
            $req->title = '<span style="float:right;">'. $req->title . '</span>';
            $check = DB::table('postss')->where(["title"=>$req->title])->get();
        }else{
            $check = DB::table('postss')->where(["title"=>$req->title])->get();
        }
       if(count($check) !== 0)
       {
           foreach($check as $value)
           {
               if($value->type_post == 0)
               {
                return DB::table('postss')->where(['title'=>$req->title])->join('userss','postss.id_user','=','userss.id')
                ->join('type_donations','postss.id_donation','=','type_donations.id')->get();
               }else{
                return DB::table('postss')->where(['title'=>$req->title])->join('userss','postss.id_user','=','userss.id')->get();
               }
           }
       }else{
           return 'no';
       }
    }

    public function getRelatedPosts(request $req)
    {
            if($req->type_post == 0)
            {
                return DB::table('postss')->where(['id_donation'=>$req->id_donation])->limit(6)->get();
            }else{
                return DB::table('postss')->where(['type_post'=>$req->type_post])->orderBy('id','desc')->limit(6)->get();
            }     
        
    }

    public function getPostsByUser(request $req)
    {
        $data = DB::table('userss')->where(['username'=>$req->username])->get();
        foreach($data as $value)
        {
            return DB::table('postss')->where(['id_user'=>$value->id])->get();
        }
    }
}
