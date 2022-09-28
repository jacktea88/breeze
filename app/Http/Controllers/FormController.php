<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Dislike;
use Illuminate\Http\Request;

class FormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // return 'you can access index';
        $dislikes = Dislike::get()->pluck('foodName','id');
        // $dislikes = Dislike::get();

        return view('form',compact(['dislikes']));
        // return view('show');

    // return redirect('/forms');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //取用表格的某兩個欄位，作為選項的來源
    // $cgies = \App\Models\Cgy::pluck('title','id');
    // return view('items.create',compact('cgies'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        dd($request->all());
    //驗證表單是否正確

    //新增資料
    // $item = Item::create($request->all());
    //轉址出去
    return redirect('/forms');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //
        $someUser = User::with('dislikes')->find($request->uid); //根據當下的user $id 來取得一位使用者，並帶出關聯工作資料
        dump($someUser);
        // $users = User::with('dislikes')->get(); //取得所有的user並帶出關聯工作資料以待比較
        // dump($users);
        return 'done';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        //從cgies表格取出title和id這兩欄的資料，做成鍵值對陣列
    // $cgies = Cgy::pluck('title','id');

    // $item = Item::findOrFail($id);
    // return view('items.edit',compact('item','cgies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $item = Item::find($id);
    //驗證表單是否正確

    //更新資料
    $item = Item::updateOrCreate(['id'=>$id] ,$request->except(['_method','_token','id']));

    //轉址出去
    return redirect('/items');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
