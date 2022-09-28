<html lang="zh-Hant-TW">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up Form</title>
    {{-- <link rel="stylesheet" href="https://codepen.io/gymratpacks/pen/VKzBEp#0"> --}}
    <link href='https://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>
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
            max-width: 300px;
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
            width: 100%;
            background-color: #e8eeef;
            color: #8a97a0;
            box-shadow: 0 1px 0 rgba(0, 0, 0, 0.03) inset;
            margin-bottom: 30px;
        }

        input[type="radio"],
        input[type="checkbox"] {
            margin: 0 4px 8px 0;
        }

        select {
            padding: 6px;
            height: 32px;
            border-radius: 2px;
        }

        button {
            padding: 19px 39px 18px 39px;
            color: #FFF;
            background-color: #4bc970;
            font-size: 18px;
            text-align: center;
            font-style: normal;
            border-radius: 5px;
            width: 100%;
            border: 1px solid #3ac162;
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
            display: block;
            margin-bottom: 8px;
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

        @media screen and (min-width: 480px) {

            form {
                max-width: 480px;
            }

        }
    </style>
</head>

<body>
    <div class="row">
        <div class="col-md-12">
            @if (count($errors) > 0)
                @foreach ($errors->all() as $error)
                    <p class="alert alert-danger">{{ $error }}</p>
                @endforeach
            @endif



            <form action="{{ route('register') }}" method="post">
                <h1> 填寫基本資料(必填) </h1>
                @csrf

                {{-- 基本資料欄位 --}}
                {{-- 基本資料欄位 --}}

                <fieldset>

                    <legend><span class="number">1</span> 登入資訊</legend>
                    {{-- 如果已經登入則不用再填帳號密碼信箱 --}}
                    {{-- @if (Auth::check()) //檢查是否已登入，是的話回傳true --}}
                    @if (Auth::guest())
                        {{-- 進來這裏表示尚未註冊，所以須填帳號密碼 --}}
                        {{-- 為了建立關連<label> for和<input> id 的值必須相同 --}}
                        <label for="name">名稱:<span style="color:red;">
                                @error('user_name')
                                    {{ $message }}
                                @enderror
                            </span></label>
                        <input type="text" id="name" name="user_name" value="{{ old('user_name') }}">
                        {{-- <input type="text" id="name" name="user_name" value="{{ $name }}"> --}}

                        <label for="email">Email:<span style="color:red;">
                                @error('user_email')
                                    {{ $message }}
                                @enderror
                            </span></label>
                        <input type="email" id="email" name="user_email" value="{{ old('user_email') }}">
                        {{-- <input type="email" id="email" name="user_email" value="{{ $newUser->email }}"> --}}

                        <label for="password">Password:
                            <span style="color:red;">
                                @error('user_password')
                                    {{ $message }}
                                @enderror
                            </span></label>
                        <input type="password" id="password" name="user_password" value="{{ old('user_password') }}">
                    @endif
                    {{-- 加速開發過程，暫時mark掉 --}}
                    @if (false)
                        <label for="male">性別: <span style="color:red;">
                                {{-- @error後面要直接無空格接('sex'){{$message }}也不能斷行 會報錯 --}}
                                @error('user_sex')
                                    {{ $message }}
                                @enderror
                            </span></label>
                        <br>
                        <input type="radio" id="male" value="male" name="user_sex"
                            @if (old('user_sex') == 'male') checked @endif><label for="male"
                            class="light">男</label><br>
                        <input type="radio" id="female" value="female" name="user_sex"
                            @if (old('user_sex') == 'female') checked @endif><label for="female"
                            class="light">女</label>
                    @endif
                </fieldset>
                {{-- 自我介紹欄位 --}}
                {{-- 自我介紹欄位 --}}
                @if (false)
                    <fieldset>

                        <legend><span class="number">2</span> Your Profile</legend>

                        <label for="bio">自我介紹: <span style="color:red;">

                                @error('user_bio')
                                    {{ $message }}
                                @enderror
                            </span></label>
                        <textarea id="bio" name="user_bio" value="">{{ old('user_bio') }}</textarea>



                        <label for="user_position">鄰近地標:
                            <span style="color:red;">
                                @error('user_position')
                                    {{ $message }}
                                @enderror
                            </span></label>

                        <select id="user_position" name="user_position">

                            <option value="">請選擇</option>

                            <optgroup label="北市">
                                <option value="TP01" {{ old('user_position') == 'TP01' ? 'selected' : '' }}>台北火車站
                                </option>
                                <option value="TP02" {{ old('user_position') == 'TP02' ? 'selected' : '' }}>中正紀念堂
                                </option>
                                <option value="TP03" {{ old('user_position') == 'TP03' ? 'selected' : '' }}>台北101
                                </option>
                                <option value="TP04" {{ old('user_position') == 'TP04' ? 'selected' : '' }}>台北市立動物園
                                </option>
                                <option value="TP05" {{ old('user_position') == 'TP05' ? 'selected' : '' }}>市立美術館
                                </option>
                                <option value="TP06" {{ old('user_position') == 'TP06' ? 'selected' : '' }}>故宮博物院
                                </option>
                            </optgroup>

                            <optgroup label="桃園">
                                <option value="TY01"{{ old('user_position') == 'TY01' ? 'selected' : '' }}>埔心農場
                                </option>
                                <option value="TY02" {{ old('user_position') == 'TY02' ? 'selected' : '' }}>楊梅車站
                                </option>
                                <option value="TY03" {{ old('user_position') == 'TY03' ? 'selected' : '' }}>
                                    大江購物中心</option>
                            </optgroup>
                            <optgroup label="台南">
                                <option value="TN01" {{ old('user_position') == 'TN01' ? 'selected' : '' }}>赤崁樓
                                </option>
                                <option value="TN02" {{ old('user_position') == 'TN02' ? 'selected' : '' }}>安平古堡
                                </option>
                            </optgroup>
                        </select>
                        @php
                            $dislikes = App\Models\Dislike::all();
                            $showDislike = 1;
                        @endphp
                        <label>我不愛吃:<span style="color:red;">
                                @error('dislike')
                                    {{ $message }}
                                @enderror
                            </span></label>
                        @foreach ($dislikes as $dislike)
                            <input id="dislike" type="checkbox" value="{{ $dislike->id }}" name="dislike[]"
                                @if (is_array(old('dislike')) && in_array('{{ $dislike->foodName }}', old('dislike'))) checked @endif>
                            <label class="light" for="dislike">{{ $dislike->foodName }}</label><br>
                        @endforeach

                    </fieldset>
                @endif
                {{-- 發送按鈕區域 --}}
                {{-- 發送按鈕區域 --}}

                <button type="submit" name="action" value="register">先完成註冊</button>
                <button type="submit" name="action" value="register-pair">繼續填寫配對資料</button>

                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                {{-- Add for google login button --}}
                {{-- Add for google login button --}}
                <div class="flex items-center justify-end mt-4 align-middle ">
                    <a href="{{ route('auth.google') }}">
                        <img src="https://developers.google.com/identity/images/btn_google_signin_dark_normal_web.png"
                            style="margin-left: 3em;">
                    </a>
                </div>


            </form>
        </div>
    </div>

</body>

</html>
