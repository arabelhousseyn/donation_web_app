<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Mail\sendMailVerification;
use Session;
use Illuminate\Support\Facades\Mail;
class userController extends Controller
{
    public function getUser(request $req)
    {
       return DB::table('userss')->where(['id'=> $req->id])->get();
    }

    public function register(request $req)
    {

        $string = strval(uniqid()) . '.jpg';
        $data = DB::table('userss')->where(['username'=>$req->username])->get();

        $exp = explode(";",$req->state);

        $code = rand("1000","100000");

        if(count($data) !== 0)
        {
            return "nono";
        }else{
            if($req->avatar !== null)
            {
            if($req->avatar->extension() == 'png' || $req->avatar->extension() == 'jpeg' || $req->avatar->extension() == 'jpg')
            {
                      $req->avatar->storeAs('avatars', $string);
                      DB::table('userss')->insert([
                        "fullName" => $req->name,
                        "username" => $req->username,
                        "email" => $req->email,
                        "phone" => $req->phone,
                        "password" => Hash::make($req->pass),
                        "id_country" => $exp[1],
                        "id_town" => $exp[0],
                        "avatar" => $string,
                        "verified" => 1,
                        "code_verification" => $code
                      ]);

                      if(Session::get("language") == "fr")
                      {

                        $details = [
                            "title" => "vérification du code",
                            "body" => "bonjour ".$code." c'est votre code de vérification"
                        ];
                      }else if(Session::get("language") == "ar")
                      {
                        $details = [
                            "title" => "رمز التحقق",
                            "body" => "مرحبا ".$code." هذا هو رمز التحقق الخاص بك"
                        ];
                      }else if(Session::get("language") == "en")
                      {
                        $details = [
                            "title" => "code verification",
                            "body" => "Hello ".$code." this is your verification code "
                        ];
                      }

                      Mail::to($req->email)->send(new sendMailVerification($details));
                      
                      Session::put("username",$req->username);
                      return "yes";
   
            }else{
                return "no";
            }
        }else{

            DB::table('userss')->insert([
                "fullName" => $req->name,
                "username" => $req->username,
                "email" => $req->email,
                "phone" => $req->phone,
                "password" => Hash::make($req->pass),
                "id_country" => $exp[1],
                "id_town" => $exp[0],
                "avatar" => "",
                "verified" => 1,
                "code_verification" => $code
              ]);

              if(Session::get("language") == "fr")
              {

                $details = [
                    "title" => "vérification du code",
                    "body" => "bonjour ".$code." c'est votre code de vérification"
                ];
              }else if(Session::get("language") == "ar")
              {
                $details = [
                    "title" => "رمز التحقق",
                    "body" => "مرحبا ".$code." هذا هو رمز التحقق الخاص بك"
                ];
              }else if(Session::get("language") == "en")
              {
                $details = [
                    "title" => "code verification",
                    "body" => "Hello ".$code." this is your verification code "
                ];
              }

              Mail::to($req->email)->send(new sendMailVerification($details));
              
              Session::put("username",$req->username);
              return "yes";

        } 
        }
    
    }

    public function verification()
    {
        return view("verification");
    }

    public function verifcationCode(request $req)
    {
         $data = DB::table('userss')->where(["username"=>Session::get("username")])->get();

         foreach($data as $value)
         {
             if($value->code_verification == $req->code)
             {
               DB::table('userss')->where(["id"=> $value->id])->update([
                  "verified" => 0,
                  "code_verification" => ""
               ]);
               Session::put("verified","ok");
               return "yes";
             }else{
                 return "no";
             }
         }


    }

    public function resendCode()
    {
        $code = rand("1000","10000");
        $data = DB::table('userss')->where(["username"=>Session::get("username")])->get();

        DB::table('userss')->where(["username"=>Session::get("username")])->update([
            "code_verification" => $code
        ]);

        if(Session::get("language") == "fr")
                      {

                        $details = [
                            "title" => "vérification du code",
                            "body" => "bonjour ".$code." c'est votre code de vérification"
                        ];
                      }else if(Session::get("language") == "ar")
                      {
                        $details = [
                            "title" => "رمز التحقق",
                            "body" => "مرحبا ".$code." هذا هو رمز التحقق الخاص بك"
                        ];
                      }else if(Session::get("language") == "en")
                      {
                        $details = [
                            "title" => "code verification",
                            "body" => "Hello ".$code." this is your verification code "
                        ];
                      }

                      foreach($data as $value)
                      {
                        Mail::to($value->email)->send(new sendMailVerification($details));
                      }

                      return "yes";
    }


    public function login(request $req)
    {
         $data = DB::table('userss')->where(["username"=>$req->username])->get();
         if(count($data) !== 0)
         {
             foreach($data as $value)
             {
                 if($value->verified == 1)
                 {
                     Session::put("username",$req->username);
                   return "verify";
                 }else{
                    if(Hash::check($req->password, $value->password))
                    {
                        Session::put("donation",$value->id);
   
                        return 'yes';
                    }else{
                        return "nono";
                    }
                 }
             }
         }else{
             return "no";
         }
    }

    public function getUserById()
    {
         return DB::table('userss')->where(["id"=>Session::get('donation')])->get();
    }

    public function logout()
    {
        Session::forget("donation");
        return view('redirect');
    }

    public function getUserByUsername(request $req)
    {
      $data = DB::table('userss')->where(['username'=>$req->username])->get();
      if(count($data )!== 0)
      { 
             return DB::table('userss')->where(['username'=>$req->username])->join('proviances','userss.id_town','=','proviances.id')->get();
      }else{
        return "no";
      }
    }

    public function settings($username)
    {
      return view('settings',['username'=>$username]);
    }
    
    public function changeUserInformation(request $req)
    {
      $bool = false;
      $data = DB::table('userss')->get();
      foreach($data as $value)
      {
        if($value->id != Session::get('donation'))
        {
          if($value->phone == $req->phone)
          {
             $bool = true;
             break;
          }
        }
      }
      if(!$bool)
      {
           DB::table('userss')->where(['id'=>Session::get('donation')])->update([
             'fullName' => $req->fullName,
             'phone' => $req->phone
           ]);
           return "yes";
      }else{
        return "no";
      }
    }

    public function changePassword(request $req)
    {
      if(Hash::check($req->old,$req->basic))
      {
        if($req->new == $req->rnew)
        {
          DB::table('userss')->where(['id'=>Session::get('donation')])->update([
            'password' => Hash::make($req->rnew)
          ]);
          Session::forget('donation');
          return "yes";
        }else{
            return 'nono';
        }
      
      }else{
        return "no";
      }
    }
}
