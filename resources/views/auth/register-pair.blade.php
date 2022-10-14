<html lang="zh-Hant-TW">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>2nd Sign Up Form</title>
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
                /* max-width: 480px; */
                max-width: 780px;

            }

        }
    </style>
    {{-- for livewire --}}
    @livewireStyles
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
                <h1> 更多基本資料(選填) </h1>
                @csrf

                {{-- 更多基本資料欄位 --}}
                {{-- 更多基本資料欄位 --}}

                <fieldset>

                    <legend><span class="number">2</span> 填寫配對資料</legend>
                    @if (Auth::guest())
                        {{-- 進來這裏表示尚未完成註冊 --}}
                        {{-- 為了建立關連<label> for和<input> id 的值必須相同 --}}
                        <label for="user_religion">宗教信仰:&nbsp;&nbsp;
                            <span style="color:red;">
                                @error('user_religion')
                                    {{ $message }}
                                @enderror
                            </span></label>

                        <select id="user_religion" name="user_religion">

                            <option value="">請選擇</option>

                            <option value="佛教" {{ old('user_religion') == '佛教' ? 'selected' : '' }}>佛教
                            </option>
                            <option value="天主教" {{ old('user_religion') == '天主教' ? 'selected' : '' }}>天主教
                            </option>
                            <option value="基督教" {{ old('user_religion') == '基督教' ? 'selected' : '' }}>基督教
                            </option>
                        </select>

                        <label for="user_height">身&nbsp;高:&nbsp;<span style="color:red;">
                                @error('user_height')
                                    {{ $message }}
                                @enderror
                            </span></label>
                        <input type="number" id="user_height" name="user_height" value="{{ old('user_height') }}">
                        <br>

                        <label for="user_relation">感情狀態:&nbsp;&nbsp;
                            <span style="color:red;">
                                @error('user_relation')
                                    {{ $message }}
                                @enderror
                            </span></label>

                        <select id="user_relation" name="user_relation">

                            <option value="">請選擇</option>

                            <option value="交往中" {{ old('user_relation') == '交往中' ? 'selected' : '' }}>交往中
                            </option>
                            <option value="未婚" {{ old('user_relation') == '未婚' ? 'selected' : '' }}>未婚
                            </option>
                            <option value="已婚" {{ old('user_relation') == '已婚' ? 'selected' : '' }}>已婚
                            </option>
                        </select>



                        <label for="user_job">職&nbsp;業:&nbsp;
                            <span style="color:red;">
                                @error('user_job')
                                    {{ $message }}
                                @enderror
                            </span></label>
                        <input type="text" id="user_job" name="user_job" value="{{ old('user_job') }}">

                        <label for="user_education">最高學歷:&nbsp;&nbsp;
                            <span style="color:red;">
                                @error('user_education')
                                    {{ $message }}
                                @enderror
                            </span></label>

                        <select id="user_education" name="user_education">

                            <option value="">請選擇</option>

                            <option value="學士" {{ old('user_relation') == '學士' ? 'selected' : '' }}>學士
                            </option>
                            <option value="碩士" {{ old('user_relation') == '碩士' ? 'selected' : '' }}>碩士
                            </option>
                            <option value="博士" {{ old('user_relation') == '博士' ? 'selected' : '' }}>博士
                            </option>
                        </select>

                        <label for="photo">大頭貼:&nbsp;&emsp;</label>
                        <input type="file" id="photo" name="photo"><br>

                        <label for="user_interest">興趣專長:&nbsp;
                            <span style="color:red;">
                                @error('user_interest')
                                    {{ $message }}
                                @enderror
                            </span></label>
                        <input type="text" id="user_interest" name="user_interest"
                            value="{{ old('user_interest') }}">
                        <br>

                        <label for="user_social">社交連結:&nbsp;
                            <span style="color:red;">
                                @error('user_social')
                                    {{ $message }}
                                @enderror
                            </span></label>

                        <select id="user_social" name="user_social_type">

                            <option value="">請選擇</option>

                            <option value="Line" {{ old('user_social_type') == 'Line' ? 'selected' : '' }}>Line
                            </option>
                            <option value="Facebook" {{ old('user_social_type') == 'Facebook' ? 'selected' : '' }}>
                                Facebook
                            </option>
                            <option value="Instagram" {{ old('user_social_type') == 'Instagram' ? 'selected' : '' }}>
                                Instagram
                            </option>
                        </select>

                        <input type="text" id="user_social" name="user_social_url"
                            value="{{ old('user_social_rul') }}">
                        <br>
                        <label for="user_intro">自我介紹: <span style="color:red;">

                                @error('user_intro')
                                    {{ $message }}
                                @enderror
                            </span></label>
                        <br>
                        <textarea id="user_intro" name="user_intro" value="">{{ old('user_intro') }}</textarea>
                    @endif

                </fieldset>


                {{-- 配對資料欄位 --}}
                {{-- 配對資料欄位 --}}
                <fieldset>
                    @if (false)
                        <label for="pair_gender">性&nbsp;別:&emsp;
                            <span style="color:red;">
                                {{-- @error後面要直接無空格接('sex'){{$message }}也不能斷行 會報錯 --}}
                                @error('pair_gender')
                                    {{ $message }}
                                @enderror
                            </span></label>

                        <input type="radio" id="male" value="male" name="user_sex"
                            @if (old('user_sex') == 'male') checked @endif>
                        <label for="male" class="light">男&emsp;&emsp;</label>
                        <input type="radio" id="female" value="female" name="user_sex"
                            @if (old('user_sex') == 'female') checked @endif>
                        <label for="female" class="light">女&emsp;&emsp;</label>
                        <input type="radio" id="notcare" value="notcare" name="user_sex"
                            @if (old('user_sex') == 'notcare') checked @endif>
                        <label for="notcare" class="light">不拘&emsp;&emsp;&nbsp;</label>
                    @endif
                    @if (false)

                        <label for="pair_relation">感情狀態:&nbsp;&nbsp;
                            <span style="color:red;">
                                @error('pair_relation')
                                    {{ $message }}
                                @enderror
                            </span></label>

                        <select id="pair_relation" name="pair_relation">

                            <option value="">請選擇</option>

                            <option value="交往中" {{ old('pair_relation') == '交往中' ? 'selected' : '' }}>交往中
                            </option>
                            <option value="未婚" {{ old('pair_relation') == '未婚' ? 'selected' : '' }}>未婚
                            </option>
                            <option value="已婚" {{ old('pair_relation') == '已婚' ? 'selected' : '' }}>已婚
                            </option>
                        </select>
                        <br>
                        <label for="pair_age">年齡區間:&nbsp;<span style="color:red;">
                                @error('pair_age')
                                    {{ $message }}
                                @enderror
                            </span></label>
                        <input type="number" id="pair_age" name="pair_age_max"
                            value="{{ old('pair_age_max') }}">到
                        <input type="number" id="pair_age" name="pair_age_mini"
                            value="{{ old('pair_age_mini') }}">歲

                        <label for="pair_height">身&emsp;&emsp;高:&nbsp;<span style="color:red;">
                                @error('pair_height')
                                    {{ $message }}
                                @enderror
                            </span></label>
                        <input type="number" id="pair_height" name="pair_height_max"
                            value="{{ old('pair_height_max') }}">到
                        <input type="number" id="pair_height" name="pair_height_mini"
                            value="{{ old('pair_height_mini') }}">公分


                </fieldset>

                <label for="pair_distance">距離區間:&nbsp;&nbsp;
                    <span style="color:red;">
                        @error('pair_distance')
                            {{ $message }}
                        @enderror
                    </span></label>

                <select id="pair_distance" name="pair_distance">

                    <option value="">請選擇</option>

                    <option value="5公里" {{ old('pair_distance') == '交往中' ? 'selected' : '' }}>5公里
                    </option>
                    <option value="10公里" {{ old('pair_distance') == '未婚' ? 'selected' : '' }}>10公里
                    </option>
                    <option value="20公里" {{ old('pair_distance') == '已婚' ? 'selected' : '' }}>20公里
                    </option>
                    <option value="50公里" {{ old('pair_distance') == '已婚' ? 'selected' : '' }}>50公里
                    </option>
                    <option value="100公里" {{ old('pair_distance') == '已婚' ? 'selected' : '' }}>100公里
                    </option>
                </select>

                <label for="user_religion">宗教信仰:&nbsp;&nbsp;
                    <span style="color:red;">
                        @error('user_religion')
                            {{ $message }}
                        @enderror
                    </span></label>

                <select id="user_religion" name="user_religion">

                    <option value="">請選擇</option>

                    <option value="佛教" {{ old('user_religion') == '佛教' ? 'selected' : '' }}>佛教
                    </option>
                    <option value="天主教" {{ old('user_religion') == '天主教' ? 'selected' : '' }}>天主教
                    </option>
                    <option value="基督教" {{ old('user_religion') == '基督教' ? 'selected' : '' }}>基督教
                    </option>
                </select>

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

                @endif

                <br><br>
                {{-- 移到下面livewire來控制 --}}
                {{-- <input id="user_agree" type="checkbox" value="agree" name="user_agree" class="form-checkbox h-4 w-4">
                <span>我同意yumeal網站的隱私權及網站使用條款</span>
                <button type="submit" name="action" value="register">完成註冊</button> --}}

                <br>
            </form>
            {{-- 發送按鈕區域 --}}
            {{-- 發送按鈕區域 --}}
            @livewire('checker')


        </div>
    </div>
    {{-- for livewire --}}
    @livewireScripts
</body>

</html>
