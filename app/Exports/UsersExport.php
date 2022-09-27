<?php

namespace App\Exports;

use App\Models\User;
// use Illuminate\Support\Facades\View; //不是這個，下面的才是正確的
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromCollection;

//使用內建的格式產出excel，但是格式很陽春，沒有欄位名稱
class UsersExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return User::all();
    }
}

//可自行規劃格式，以view blade方式來顯示，用此法時要將上面的內建方式註解掉，否則會有衝突
class UsersExport implements FromView
{
    public function view(): View
    {
        return view('exports.users', [
            'users' => User::all()
        ]);
    }
}

