<table>
    <thead>
    <tr>
        <th>名稱</th>
        <th>Email</th>
        <th>建立日期</th>
        <th>修改日期</th>

    </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->created_at->format('Y-m-d') }}</td>
            <td>{{ $user->updated_at->format('Y-m-d') }}</td>

        </tr>
    @endforeach
    </tbody>
</table>
