<html lang="zh-Hant-TW">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up Form</title>
    {{-- <link rel="stylesheet" href="https://codepen.io/gymratpacks/pen/VKzBEp#0"> --}}
    <link href='https://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>
    {{-- <link href="/web111a/laravel/breeze/public/vendor/laratrust/laratrust.css" rel="stylesheet"> --}}

    <style>
        *:before,
        *:after {
            -moz-box-sizing: border-box;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
        }

        body {
            font-family: 'Nunito', sans-serif;
            color: #384047;
        }

        form {
            max-width: 600px;
            margin: 10px auto;
            padding: 10px 20px;
            background: #f4f7f8;
            border-radius: 8px;
        }

        h1 {
            margin: 0 0 30px 0;
            text-align: center;
        }

        input[type="text"],
        input[type="password"],
        input[type="date"],
        input[type="datetime"],
        input[type="email"],
        input[type="number"],
        input[type="search"],
        input[type="tel"],
        input[type="time"],
        input[type="url"],
        textarea,
        select {
            background: rgba(255, 255, 255, 0.1);
            border: none;
            font-size: 16px;
            height: auto;
            margin: 0;
            outline: 0;
            padding: 15px;
            /* width: 100%; */
            width: 300px;
            background-color: #e8eeef;
            color: #8a97a0;
            box-shadow: 0 1px 0 rgba(0, 0, 0, 0.03) inset;
            margin-bottom: 30px;
        }

        /* input[type="radio"],
        input[type="checkbox"] {
            margin: 0 4px 8px 0;
        } */

        /* select {
            padding: 6px;
            height: 32px;
            border-radius: 2px;
        } */

        button {
            padding: 19px 39px 18px 39px;
            color: #FFF;
            background-color: #4bc970;
            font-size: 18px;
            text-align: center;
            font-style: normal;
            border-radius: 5px;
            width: 300px;
            /* width: 32%; */

            border: 1px solid #999;
            border-width: 1px 1px 3px;
            box-shadow: 0 -1px 0 rgba(255, 255, 255, 0.1) inset;
            margin-bottom: 10px;
        }

        fieldset {
            margin-bottom: 30px;
            border: none;
        }

        legend {
            font-size: 1.4em;
            margin-bottom: 10px;
        }

        label {
            /* display: block; */
            margin-bottom: 8px;
            width: 300px;
            display: inline;

        }

        label.light {
            font-weight: 300;
            display: inline;
        }

        .number {
            background-color: #5fcf80;
            color: #fff;
            height: 30px;
            width: 30px;
            display: inline-block;
            font-size: 0.8em;
            margin-right: 4px;
            line-height: 30px;
            text-align: center;
            text-shadow: 0 1px 0 rgba(255, 255, 255, 0.2);
            border-radius: 100%;
        }



        .form-checkbox:checked {
            background-image: url("data:image/svg+xml;charset=utf-8,%3Csvg viewBox='0 0 16 16' fill='%23fff' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M5.707 7.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4a1 1 0 00-1.414-1.414L7 8.586 5.707 7.293z'/%3E%3C/svg%3E");
            border-color: transparent;
            background-color: currentColor;
            background-size: 100% 100%;
            background-position: 50%;
            background-repeat: no-repeat;
        }

        .form-checkbox {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            -webkit-print-color-adjust: exact;
            color-adjust: exact;
            display: inline-block;
            vertical-align: middle;
            background-origin: border-box;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            flex-shrink: 0;
            height: 1em;
            width: 1em;
            color: #4299e1;
            background-color: #fff;
            border-color: #e2e8f0;
            border-width: 1px;
            border-radius: .25rem;
        }

        @media screen and (min-width: 480px) {

            form {
                max-width: 340px;
                /* max-width: 780px; */

            }

        }
    </style>
    {{-- for livewire --}}
    @livewireStyles
</head>

<body>
    <div class="row">
        <div class="col-md-12">
            {{-- @if (count($errors) > 0)
                @foreach ($errors->all() as $error)
                    <p class="alert alert-danger">{{ $error }}</p>
                @endforeach
            @endif --}}



            <form action="{{ route('register') }}" method="post">
                <h1> 填寫基本資料(必填) </h1>
                @csrf

                {{-- 登入資訊欄位 --}}
                {{-- 登入資訊欄位 --}}

                <fieldset>

                    <legend><span class="number">1</span> 登入資訊</legend>
                    {{-- 如果已經登入則不用再填帳號密碼信箱 --}}
                    {{-- @if (Auth::check()) //檢查是否已登入，是的話回傳true --}}
                    @if (Auth::guest())
                        {{-- 進來這裏表示尚未註冊，所以須填帳號密碼 --}}
                        {{-- 為了建立關連<label> for和<input> id 的值必須相同 --}}
                        <label for="name">名&nbsp;稱:&nbsp;
                            <span style="color:red;">
                                @error('user_name')
                                    {{ $message }}
                                @enderror
                            </span></label>
                            <br>
                        <input type="text" id="name" name="user_name" value="{{ old('user_name') }}">
                        {{-- <input type="text" id="name" name="user_name" value="{{ $name }}"> --}}
<br>
                        <label for="email">信&nbsp;箱:&nbsp;&emsp;&emsp;
                            <span style="color:red;">
                                @error('user_email')
                                    {{ $message }}
                                @enderror
                            </span></label>
                        <input type="email" id="email" name="user_email" value="{{ old('user_email') }}">
                        {{-- <input type="email" id="email" name="user_email" value="{{ $newUser->email }}"> --}}

                        <label for="password">密&nbsp;碼:&nbsp;
                            <span style="color:red;">
                                @error('user_password')
                                    {{ $message }}
                                @enderror
                            </span></label>
                        <input type="password" id="password" name="user_password" value="{{ old('user_password') }}">
                        {{-- <br> --}}
                    @endif

                </fieldset>
                {{-- 基本資料欄位 --}}
                {{-- 基本資料欄位 --}}
                {{-- 加速開發過程，暫時mark掉 --}}


                <fieldset>
                    @if (false)
                        <label for="male">性&nbsp;別:&emsp;&emsp;&emsp;&emsp;
                            <span style="color:red;">
                                {{-- @error後面要直接無空格接('sex'){{$message }}也不能斷行 會報錯 --}}
                                @error('user_sex')
                                    {{ $message }}
                                @enderror
                            </span></label>

                        <input type="radio" id="male" value="male" name="user_sex"
                            @if (old('user_sex') == 'male') checked @endif><label for="male"
                            class="light">男&emsp;&emsp;&emsp;&emsp;</label>
                        <input type="radio" id="female" value="female" name="user_sex"
                            @if (old('user_sex') == 'female') checked @endif><label for="female"
                            class="light">女&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</label>
                    @endif
                    <br>


                        <label for="user_position">鄰近地標:&nbsp;&nbsp;
                            <span style="color:red;">
                                @error('user_position')
                                    {{ $message }}
                                @enderror
                            </span></label>

{{-- use livewire to render city and landmark --}}
                            @livewire('select')

                            @if (false)

                        <label for="birthday">生&nbsp;日:&nbsp;
                            <span style="color:red;">
                                @error('birthday')
                                    {{ $message }}
                                @enderror
                            </span></label>
                        <input type="date" id="birthday" name="birthday">

                        <label for="photo">大頭貼:&nbsp;&emsp;</label>
                        <input type="file" id="photo" name="photo"><br><br>
                </fieldset>

                {{-- 飲食喜好欄位 --}}
                {{-- 飲食喜好欄位 --}}


                <label>我不愛吃:<span style="color:red;">
                        @error('dislike')
                            {{ $message }}
                        @enderror
                    </span></label><br>
                @foreach (App\Models\DislikeFood::all() as $dislike)
                    {{-- @foreach ($dislikes as $dislike) --}}

                    <input id="dislike" type="checkbox" value="{{ $dislike->id }}" name="dislike[]"
                        class="form-checkbox h-4 w-4" @if (is_array(old('dislike')) && in_array('{{ $dislike->df_name }}', old('dislike'))) checked @endif>
                    <label class="light" for="dislike">{{ $dislike->df_name }}</label>
                @endforeach

                <br><br><label>??到訪必吃地方美食:<span style="color:red;">
                        @error('dislike')
                            {{ $message }}
                        @enderror
                    </span></label><br>
                @foreach (App\Models\DislikeFood::all() as $dislike)
                    {{-- @foreach ($dislikes as $dislike) --}}

                    <input id="dislike" type="checkbox" value="{{ $dislike->id }}" name="dislike[]"
                        class="form-checkbox h-4 w-4" @if (is_array(old('dislike')) && in_array('{{ $dislike->df_name }}', old('dislike'))) checked @endif>
                    <label class="light" for="dislike">{{ $dislike->df_name }}</label>
                @endforeach

                <br><br><label>特殊飲食族群:<span style="color:red;">
                        @error('dietGroup')
                            {{ $message }}
                        @enderror
                    </span></label><br>
                @foreach (App\Models\DietGroup::all() as $dietGroup)
                    {{-- @foreach ($dislikes as $dislike) --}}

                    <input id="dietGroup" type="checkbox" value="{{ $dietGroup->id }}" name="dietGroup[]"
                        class="form-checkbox h-4 w-4" @if (is_array(old('dietGroup')) && in_array('{{ $dietGroup->dg_name }}', old('dietGroup'))) checked @endif>
                    <label class="light" for="dietGroup">{{ $dietGroup->dg_name }}</label>
                @endforeach



                <br><br><label>偶會光顧的連鎖餐店:<span style="color:red;">
                        @error('chainDiner')
                            {{ $message }}
                        @enderror
                    </span></label><br>
                @foreach (App\Models\ChainDiner::all() as $chainDiner)
                    {{-- @foreach ($dislikes as $dislike) --}}

                    <input id="chainDiner" type="checkbox" value="{{ $chainDiner->id }}" name="dislike[]"
                        class="form-checkbox h-4 w-4" @if (is_array(old('chainDiner')) && in_array('{{ $chainDiner->cd_name }}', old('chainDiner'))) checked @endif>
                    <label class="light" for="chainDiner">{{ $chainDiner->cd_name }}</label>
                @endforeach

                <br><br><label>其他飲食習慣:<span style="color:red;">
                        @error('dietBehavior')
                            {{ $message }}
                        @enderror
                    </span></label><br>
                @foreach (App\Models\DietBehavior::all() as $dietBehavior)
                    {{-- @foreach ($dislikes as $dislike) --}}

                    <input id="dietBehavior" type="checkbox" value="{{ $dietBehavior->id }}" name="dietBehavior[]"
                        class="form-checkbox h-4 w-4" @if (is_array(old('dietBehavior')) && in_array('{{ $dietBehavior->db_name }}', old('dietBehavior'))) checked @endif>
                    <label class="light" for="dietBehavior">{{ $dietBehavior->db_name }}</label>
                @endforeach

                <br><br><br>

                <label for="often_diner">店&nbsp;名:&nbsp;<span style="color:red;">
                        @error('often_diner')
                            {{ $message }}
                        @enderror
                    </span></label>

                <label for="often_meal">餐&nbsp;點&nbsp;名:&nbsp;<span style="color:red;">
                        @error('often_meal')
                            {{ $message }}
                        @enderror
                    </span></label>

                <label for="often_address">約略地址:&nbsp;<span style="color:red;">
                        @error('often_meal')
                            {{ $message }}
                        @enderror
                    </span></label>
                <br>
                <input type="text" id="often_diner" name="often_diner1" value="{{ old('often_diner1') }}" style="width: 25%">
                <input type="text" id="often_meal" name="often_meal1" value="{{ old('often_meal1') }}" style="width: 30%">
                <input type="text" id="often_address" name="often_address1" value="{{ old('often_address1') }}" style="width: 40%">
                <br>
                <input type="text" id="often_diner" name="often_diner2" value="{{ old('often_diner2') }}" style="width: 25%">
                <input type="text" id="often_meal" name="often_meal2" value="{{ old('often_meal2') }}" style="width: 30%">
                <input type="text" id="often_address" name="often_address2" value="{{ old('often_address2') }}" style="width: 40%">
                <br>
                <input type="text" id="often_diner" name="often_diner3" value="{{ old('often_diner3') }}" style="width: 25%">
                <input type="text" id="often_meal" name="often_meal3" value="{{ old('often_meal3') }}" style="width: 30%">
                <input type="text" id="often_address" name="often_address3" value="{{ old('often_address3') }}" style="width: 40%">



                @endif
                {{-- 發送按鈕區域 --}}
                {{-- 發送按鈕區域 --}}
                <br><br>

                <span>想不想認識與自己口味接近的新朋友?</span><br>
                <button type="submit" name="action" value="register-pair">好，填寫配對資料</button>
                {{-- <button type="submit" name="action" value="register">先不用，完成註冊</button> --}}
                <button type="submit" name="action" value="register-vendor">繼續填寫餐廳資料</button>

                <br>
                @livewire('checker1')

                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('已經註冊?') }}
                </a>

                {{-- Add for google login button --}}
                {{-- Add for google login button --}}
                <div class="flex items-center justify-end mt-4 align-middle ">
                    <a href="{{ route('auth.google') }}">
                        <img src="https://developers.google.com/identity/images/btn_google_signin_dark_normal_web.png"
                            style="margin-left: 0em;">
                    </a>
                </div>


            </form>
        </div>
    </div>
    @livewireScripts

</body>

</html>
