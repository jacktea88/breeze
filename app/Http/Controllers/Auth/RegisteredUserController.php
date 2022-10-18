<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\YumFormValidation;
use App\Http\Requests\GmailFormValidation;

class RegisteredUserController extends Controller
{
    /**
     * When user click Register link then Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create(Request $request)
    {

        // dd($request);

        return view('auth.register-basic');

    }

    /**
     * 當完成google帳號認證，繼續回到第一頁表單.
     *
     * @return \Illuminate\View\View
     */
    public function createGoogle(Request $request)
    {

        // dd($request);
        // $query = $request->query();
        // $user = $request->query('user');
        // $name = $user[name]; //會報錯
        // $email = $user[email]; //會報錯
        // $name = Arr::get($user, 'name'); //正確方式
        // $email = Arr::get($user, 'email'); //正確方式
        $gname = session('gname');
        $gmail = session('gmail');
        $gid =  session('gid');
        // echo $name;
        // dump($query);
        // dump($gname);
        // dump($gmail);
        // dump($user);


        return view('auth.register-google',compact('gname','gmail','gid'));    //因已有google帳號，所以不須再填帳號密碼

    }

    /**
     * When user click to input pair data then Display the 2nd registration pair data view.
     *
     * @return \Illuminate\View\View
     */
    public function createPair(Request $request)
    {

        // dd($uri);
        // return "pair form here";
        return view('auth.register-pair');

    }




    /**
     * when user 完成第一頁資料填寫
     * Handle an incoming registration post request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(YumFormValidation $request)
    {
        // dd($request);
        // dump($request->user['given_name']);

        // dd($guser);
// if (false) {
if (true) {


        // change to use same validation rule: YumFormValidation
        // $request->validate([
        //     'name' => ['required', 'string', 'max:255'],
        //     'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        //     'password' => ['required', 'confirmed', Rules\Password::defaults()],
        // ]);

        $user = User::create([
            'name' => $request->user_name,
            'email' => $request->user_email,
            'password' => Hash::make($request->user_password),
        ]);
        // todo: need create dislikeFood column
        // $User->dislikefood = json_encode(request('dislike'), JSON_UNESCAPED_UNICODE);
        $user->dislikes()->sync($request->dislike);
        // dump($user);
        $user->syncRoles([3]);          //default attach new user's role as User(role_id = 3)
        $user->syncPermissions([1,4]);  //default attach new user's permissions as index & update(id = 1 & 4)
        event(new Registered($user));
        // todo: study 是否要設$remember = true，原本的code是沒有設
        Auth::login($user); //記得此新註冊的user，直到登出為止
        // Auth::login($user, $remember = true); //記得此新註冊的user，直到登出為止

    }
        if ($request->action == 'register'){

            return redirect(RouteServiceProvider::HOME);
        }
        else{

        return view('auth.register-pair');   //to show pair form

        }

    }

    /**
     * 用google認證情況下，且完成資料填寫送出表單
     * 將資料存進資料庫
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function storeGoogle(GmailFormValidation $request)
    {
        // dump(session('gid'));
        // dd($request);
        // dd($guser);
        // dump($request->user['given_name']);
// if (false) {
if (true) {


        // change to use same validation rule: YumFormValidation
        // $request->validate([
        //     'name' => ['required', 'string', 'max:255'],
        //     'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        //     'password' => ['required', 'confirmed', Rules\Password::defaults()],
        // ]);

        $user = User::create([
            'name' => $request->user_name,
            'email' => $request->user_email,
            'google_id'=> session('gid'),
            'password' => Hash::make('google'),   //Gmail認證不須在本站存密碼，但須存一個dummy的給資料庫
        ]);
        // todo: need create dislikeFood column
        // $User->dislikefood = json_encode(request('dislike'), JSON_UNESCAPED_UNICODE);
        $user->dislikes()->sync($request->dislike);
        // User::dislikes->sync($request->dislike);

        // dump($user);
        $user->syncRoles([3]);          //default attach new user's role as User(role_id = 3)
        $user->syncPermissions([1,4]);  //default attach new user's permissions as index & update(id = 1 & 4)
        event(new Registered($user));
        // todo: study 是否要設$remember = true，原本的code是沒有設
        Auth::login($user); //記得此新註冊的user，直到登出為止
        // Auth::login($user, $remember = true); //記得此新註冊的user，直到登出為止

    }
        if ($request->action == 'register'){

            return redirect(RouteServiceProvider::HOME);
        }
        else{

        return view('auth.register-pair');   //to show pair form

        }

    }

    /**
     * 處理第二步配對資訊輸入儲存 post request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function storePair(YumFormValidation $request)
    {
        // dd($request);
        // change to use same validation rule: YumFormValidation
        // $request->validate([
        //     'name' => ['required', 'string', 'max:255'],
        //     'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        //     'password' => ['required', 'confirmed', Rules\Password::defaults()],
        // ]);
        $user = Auth::user(); // Retrieve the currently authenticated user...
        // dump($user);
        // dd($user);

        // $user = User::create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password),
        // ]);
        // $user->syncRoles([3]);          //default attach new user's role as User(role_id = 3)
        // $user->syncPermissions([1,4]);  //default attach new user's permissions as index & update(id = 1 & 4)
        // event(new Registered($user));


        return redirect(RouteServiceProvider::HOME);


    }
}
