<?php

namespace App\Http\Controllers;


use App\Models\UserSignUp;
use Illuminate\Http\Request;
use App\Http\Requests\YumFormValidation;
use Illuminate\Support\Facades\Validator;

class UserSignUpController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request)  //列出資料集所有資料
  {
    $search = $request->search;



    //return view('UserSignUp.index');

    $UserSignUps = UserSignUp::latest()->get();
    //不用加 route的search陽春作法
    //要加->paginate(4)  才會出現所有搜尋結果，不然只會出線索顯示該頁的搜尋結果
    // $UserSignUps = UserSignUp::when($search, function ($query, $search) {
    //   return $query->where('dislikefood', 'like', "%{$search}%")
    //     //->orWhere('name', 'LIKE', "%{$search}%")
    //     ->paginate(4);
    // });

    $UserSignUps = UserSignUp::paginate(4); //加這行頁面才會畫出頁碼，但沒加action的陽春搜尋會無法正確執行


    return view('UserSignUp.index', [
      'UserSignUps' => $UserSignUps,
    ]);

    //他人參考資料
    //$showEmployeeData = Employee::paginate(4); //Eloquent ORM
    //return view('Employee.view', compact('showEmployeeData'));

    //   $pizzas = Pizza::latest()->get();
    //   return view('pizzas.index', [
    //   'pizzas' => $pizzas,
    //   ]);

  }


  public function indexold()  //列出資料集所有資料
  {
    //return view('UserSignUp.index');

    $UserSignUps = UserSignUp::latest()->get();

    return view('UserSignUp.index-old', [
      'UserSignUps' => $UserSignUps,
    ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('UserSignUp.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(YumFormValidation $request)
  {
    //error_log(request('user_name'));

    //return $request->input(); //確認可拿到token後清掉


    //前面key區塊的名稱為表單名
    // $request->validate([
    //   'user_name' => 'required',
    //   'user_email' => 'required|email',
    //   'user_password' => 'required',
    //   'user_sex' => 'required',
    //   'user_bio' => 'required',
    //   'user_position' => 'required|not_in:0',
    //   'dislike_food' => 'required_without_all|max:3|min:1',
    // ]);

    // $rules = [
    //   'user_name' => 'required',
    //   'user_email' => 'required|email',
    //   'user_password' => 'required',
    //   'user_sex' => 'required',
    //   'user_bio' => 'required',
    //   'user_position' => 'required|not_in:0',
    //   //'dislike_food' => 'required_without_all|max:3|min:1',
    // ];

    // $validator = Validator::make($request->all(), $rules);
    // // $validator = Validator::make($request->all(), $rules, $messages);
    // if ($validator->fails()) {
    //   $error = $validator->errors()->all();
    //   //return response()->json(['status' => false, 'error' => $error], 400);
    // }


    $UserSignUp = new UserSignUp();
    //$input = $request->all();
    //dd($request->all());

    //深咖啡字 用的  資料庫中的欄位名稱
    $UserSignUp->name = request('user_name');
    $UserSignUp->email = request('user_email');
    $UserSignUp->password = request('user_password');
    $UserSignUp->sex = request('user_sex');
    $UserSignUp->aboutme = request('user_bio');
    $UserSignUp->landmark = request('user_position');

    //$UserSignUp->dislikefood = json_encode(request('dislike_food'));  //存入DB格式  	["3","5","7"]
    //$UserSignUp->dislikefood = implode(',', request('dislike_food')); //存入DB格式  "1,3,6"
    //要加 JSON_UNESCAPED_UNICODE ，存入DB的資料才不會是亂碼
    $UserSignUp->dislikefood = json_encode(request('dislike_food'), JSON_UNESCAPED_UNICODE);
    $UserSignUp->save();  //存DB

    //dump($UserSignUp);
    return redirect('/yum')->with('mssg', '感謝填寫!');  //
    //return view('/UserSignUp/index', compact(['UserSignUps']));  //






  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\UserSignUp  $userSignUp
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $UserSignUp = UserSignUp::findOrFail($id);
    return view('UserSignUp.show', [
      'UserSignUp' => $UserSignUp,
    ]);

    //$pizza = Pizza::findOrFail($id);
    //   return view('pizzas.show', ['pizza' => $pizza]);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\UserSignUp  $userSignUp
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $UserSignUp = UserSignUp::findOrFail($id);
    return view('UserSignUp.edit', compact(['UserSignUp']));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\UserSignUp  $userSignUp
   * @return \Illuminate\Http\Response
   */
  public function update(YumFormValidation $request, $id)
  {
    $UserSignUp = UserSignUp::findOrFail($id);
    $UserSignUp->update(
      [
        'name' => request('user_name'),
        'email' => request('user_email'),
        'password' => request('user_password'),
        'sex' => request('user_sex'),
        'aboutme' => request('user_bio'),
        'landmark' => request('user_position'),
        'dislikefood' => json_encode(request('dislike_food'), JSON_UNESCAPED_UNICODE)
      ]
    );
    return redirect('/yum')->with('completed', 'theForm has been updated');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\UserSignUp  $userSignUp
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $UserSignUp = UserSignUp::findOrFail($id);
    $UserSignUp->delete();
    //return back()->with('destory', 'success');
    return redirect('/yum');
  }

  public function search(Request $request)
  {
    // Get the search value from the request
    $search = $request->input('search');

    // Search in the title and body columns from the posts table
    $UserSignUps = UserSignUp::query()
      ->where('dislikefood', 'LIKE', "%{$search}%")
      ->orWhere('name', 'LIKE', "%{$search}%")
      ->get();

    // Return the search view with the resluts compacted
    return view('UserSignUp.searchResult', compact('UserSignUps'));

    // return view('UserSignUp.index', [
    //   'UserSignUps' => $UserSignUps,
    // ]);

  }
}