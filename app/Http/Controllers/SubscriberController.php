<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscriber;
use Illuminate\Support\Str;
use App\Http\Controllers\Session;
use Artesaos\SEOTools\Facades\SEOTools;
use Artesaos\SEOTools\Facades\SEOMeta;

class SubscriberController extends Controller
{
    public function subscriberlogin(Request $request){

        $data =request()->all();
        $phone='251'.substr($data['phone'],1);


        $sub = Subscriber::query()->where("phone",$phone)->first();

        if($sub != null){
            $result=1;
        }
        else{
            $result=0;
        }

        if ($result == 1){
            $request->session()->put('user',$phone);
            if(session()->has('backurl')){
                $back=session('backurl');
                session()->remove('backurl');
                return  redirect($back);
            }
            return redirect(app()->getLocale().'/home');
        }
        else if( $result == 0){
            $message="User not found , check your phone number or please Subscribe ";
        }
        $data['error'] = $message;
        return redirect(app()->getLocale().'/subscriber')->with('error' , 'User not found  check your phone number please Subscribe');

    }


    public function subscriberloginApi(Request $request){

        $data = $request->phone;

        $phone='251'.substr($data,1);
        $sub = Subscriber::query()->where("phone",$phone)->first();

        if($sub != null){
            $result=1;
        }
        else{
            $result=0;
        }

        if ($result == 1){
            $token = $data;
            return response()->json(['token'=>$token,'status'=>'true','message'=>'Successful Login'],200);
        }
        else if( $result == 0){
            return response()->json(['status'=>'false','message'=>'Please Subscribe by sending ok to xxxx']);
        }
    }


    public function subscriberloginApiCheck(Request $request){

        $data = $request->phone;
        $phone='251'.substr($data,0);
        $sub = Subscriber::query()->where("phone",$phone)->first();

        if($sub != null){
            $result=1;
        }
        else{
            $result=0;
        }

        if ($result == 1){
            $token = $data;
            return response()->json(['status'=>'true'],200);
        }
        else if( $result == 0){
            return response()->json(['status'=>'false','message'=>'Please check Subscription Service to xxxx'],200);
        }
    }


    public function logout(Request $request){
        $request->session()->flush();
        return redirect(url(app()->getLocale().'/subscriber'));
    }
}
