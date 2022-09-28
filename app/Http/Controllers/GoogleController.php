<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToGoogle()
    {

        return Socialite::driver('google')->redirect();

    }

    /**
     * Create a new controller instance.
     * 已通過google帳號驗證，在此進行後續處理
     * 這裏 只負責把google來的資料轉傳給註冊controller再統一存入資料庫
     *
     * @return void
     */

    public function handleGoogleCallback()
    {

        try {
            $user = Socialite::driver('google')->user();
            $finduser = User::where('google_id', $user->id)->first();
            // dump($user);
            // dump($finduser);
            if ($finduser) { //user已註冊，直接登入
                Auth::login($finduser);
                // dd($finduser);
                return redirect()->intended('dashboard');
            } else { //user尚未註冊，要走填表單的流程, 並且統一在RegisteredUserController才將資料寫入資料庫

                // 原本的寫法：
                // $newUser = User::updateOrCreate(['email' => $user->email],[
                //         'name' => $user->name,
                //         'google_id'=> $user->id,
                //         'password' => encrypt('123456dummy')    //due to we don't get password from google call back
                //     ]);

                // return redirect()->intended('dashboard');   //原本的流程
                session(['gname' => $user->name, 'gmail' => $user->email, 'gid' => $user->id]);

                return redirect()->route('register.google',compact('user'));   //重導向經過route連到第一頁註冊表單, 繼續填其他資料
                // return redirect()->route('register.google'); //重導向經過route連到第一頁註冊表單, 繼續填其他資料

                // return view('auth.register-basic');  //直接show第一頁註冊表單, 繼續填其他資料

            }

        } catch (Exception $e) {

            dd($e->getMessage());

        }

    }

}
