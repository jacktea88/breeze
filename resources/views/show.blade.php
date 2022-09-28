<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>good to eat</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
</head>

<body>
    {!! Form::open(['action'=>'App\Http\Controllers\FormController@store','method'=>'POST','files'=>true]) !!}

        {!! Form::label('title', '標題', ['class' => 'myclass']) !!}
        {!! Form::text('title', null) !!}<br><br>
    {!! Form::close() !!}

    <div class="container">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>推薦的小伙伴名單 </h2>
                </div>
                <div class="pull-right">
                    {{-- <a class="btn btn-success" href="{{ route('users.create') }}"> Add New Post</a> --}}
                </div>
            </div>
        </div>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <table class="table table-bordered">
            <tr>
                <th>Name</th>
                <th>E-mail</th>
                <th>討厭的食材</th>
            </tr>
            {{-- @foreach ($keys as $uid)
                {{ $uid }}
                @php
                    // $user = $showUsers->find($uid);
                @endphp

            <tr>
                <td>{{ $showUsers->find($uid)->name }}</td>
                <td>{{ $showUsers->find($uid)->email }}</td>
                {{-- <td>{{ $user->name }}</td> --}}
                {{-- <td>{{ $user->email }}</td> --}}
                <td>
                    {{-- @php $categories = $user->tasks ? $user->tasks : []; @endphp --}}
                    {{-- @php $categories = $showUsers->find($uid)->tasks ? $showUsers->find($uid)->tasks : []; @endphp

                    @foreach ($categories as $category)
                        {{ $category->title }},
                    @endforeach --}}
                </td>
            </tr>
            {{-- @endforeach --}}

        </table>
    </div>
</body>

</html>
