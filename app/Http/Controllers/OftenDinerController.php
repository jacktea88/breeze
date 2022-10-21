<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOftenDinerRequest;
use App\Http\Requests\UpdateOftenDinerRequest;
// use Illuminate\Support\Facades\Request;
use App\Models\OftenDiner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OftenDinerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $OftenDiners = OftenDiner::orderBy('id', 'desc')->get();
        $OftenDiners = OftenDiner::orderBy('id', 'desc')->paginate(10);
        //return view('ChainDiner.index');
        //return view('ChainDiner.indexBasic', [
        return view('OftenDiner.index', [
            'OftenDiners' => $OftenDiners,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('OftenDiner.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOftenDinerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //前面key區塊的名稱為表單名    //該表格4個欄位名 cd_no  cd_name  cd_type cd_remark
        $request->validate([
            'of_diner' => 'required',
            'of_meal' => 'required',

        ]);

        $OftenDiner = new OftenDiner();

        $OftenDiner->of_diner = request('of_diner');
        $OftenDiner->of_meal = request('of_meal');
        $OftenDiner->of_address = request('of_address');
        $OftenDiner->user_id = Auth::id();

        $OftenDiner->save(); //存DB

        return redirect('/OftenDiner')->with('success', '新增資料成功'); //bootstrap alert

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OftenDiner  $oftenDiner
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $OftenDiner = OftenDiner::findOrFail($id);
        return view('OftenDiner.show', [
            'OftenDiner' => $OftenDiner,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OftenDiner  $oftenDiner
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $OftenDiner = OftenDiner::findOrFail($id);
        // dump($OftenDiner);
        return view('OftenDiner.edit', compact(['OftenDiner']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOftenDinerRequest  $request
     * @param  \App\Models\OftenDiner  $oftenDiner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'of_diner' => 'required',
            'of_meal' => 'required',

        ]);

        $OftenDiner = OftenDiner::findOrFail($id);
        $OftenDiner->update(
            [
                'of_diner' => request('of_diner'),
                'of_meal' => request('of_meal'),
                'of_address' => request('of_address'),
            ]
        );
        return redirect('/OftenDiner')->with('success', '更新資料成功');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OftenDiner  $oftenDiner
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $OftenDiner = OftenDiner::findOrFail($id);
        $OftenDiner->delete();
        return redirect('/OftenDiner')->with('success', '刪除資料成功');
    }

    public function search(Request $request)
    {
        // Get the search value from the request
        $search = $request->input('search');
        // Search in the title and body columns from the posts table
        $OftenDiners = OftenDiner::query()
            ->where('of_diner', 'LIKE', "%{$search}%") //要寫確實存在的欄位名稱
            ->orWhere('of_meal', 'LIKE', "%{$search}%")->orderBy('id', 'desc')
            ->get();

        // Return the search view with the resluts compacted
        return view('OftenDiner.searchResult', compact('OftenDiners'));
    }
}
