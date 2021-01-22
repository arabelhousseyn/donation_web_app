<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\sendMailRecover;
use Session;
class homeController extends Controller
{
    public function index()
    {
        homeController::checkLanguage();
            return view('home');   
    }

    public function checkAuth()
    {
        if(Session::has('donation'))
        {
           return "yes";
        }else{
            return "no";
        }
    }

    public function checkLanguage()
    {
        if(Session::has('language'))
        {
            if(Session::get('language') == 'fr')
            {
                Session::put('language','fr');
                return 'fr';
            }else if(Session::get('language') == 'ar')
            {
                Session::put('language','ar');
                return 'ar';
            }else if(Session::get('language')){
                Session::put('language','en');
               return 'en';
            }
        }else{
            Session::put('language','fr');
            return 'fr';
        }
    }

    public function alertGretting()
    {
        if(Session::has("verified"))
        {
            Session::forget("verified");
           return "yes";
        }else{
            return "no";
        }
    }

    public function en()
    {
         Session::put('language','en');
         homeController::checkLanguage();
         return "en";
    }

    public function fr()
    {
         Session::put('language','fr');
         homeController::checkLanguage();
         return "fr";
    }

    public function ar()
    {
         Session::put('language','ar');
         homeController::checkLanguage();
         return "ar";
    }

    public function profile($username)
    {
        return view('profile',["username"=>$username]);
    }

    public function checkUsername(request $req)
    {
        $data = DB::table('userss')->where(["username"=>$req->username])->get();
         foreach($data as $value)
         {
            if($value->id == Session::get('donation'))
            {
                return "yes";
            }else{
                return "no";
            }
         }
         
    }

    public function checkpoint()
    {
        return view('forget');
    }

    public function checkPointUsername(request $req)
    {
        $data = DB::table('userss')->where(['username'=>$req->username])->get();
        if(count($data) !== 0)
        {
            $code = rand(1000,10000);
            Session::put('username',$req->username);
            Session::put('checkpoint',Hash::make($code));

            if(Session::get('language') == 'fr')
            {
                $details = [
                    'title' => 'récupérer mot de passe',
                    'body' =>  'entrez ce code pour récupérer votre mot de passe ' . $code 
                ];
            }else if(Session::get('language') == 'en')
            {
                $details = [
                    'title' => 'recover password',
                    'body' =>  'enter this code to retrieve your password ' . $code 
                ];
            }else{
                $details = [
                    'title' => 'إستعادة كلمة المرور',
                    'body' =>  'أدخل هذا الرمز لاسترداد كلمة المرور الخاصة بك ' . $code 
                ];
            }

            foreach($data as $value)
            {
                Mail::to($value->email)->send(new sendMailRecover($details));
            }

            return "yes";
        }else{
            return "no";
        }
    }
    
    public function recover()
    {
      return view('check',['code'=>Session::get('checkpoint')]);   
    }

    public function verifyCode(request $req)
    {
         if(Hash::check($req->enter, $req->code))
         {
          return "yes";
         }else{
             return "no";
         }
    }

    public function changePassword(request $req)
    {
        if($req->new == $req->rnew)
        {
            $data = DB::table('userss')->where(['username'=>Session::get('username')])->update([
                  'password' => Hash::make($req->rnew)
            ]);
            Session::forget('username');
            Session::forget('checkpoint');
            return "yes";
        }else{
            return "no";
        }
    }
}
