<h1>Users List</h1>
<table>
    <thead>
        <tr>
            <th style="text-align: center">Username</th>
            <th style="text-align: center">Firstname</th>
            <th style="text-align: center">Lastname</th>
            <th style="text-align: center">Posts</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->username }}</td>
                <td>{{ $user->profile->firstname }}</td>
                <td>{{ $user->profile->lastname }}</td>
                <td>
                    <ul>
                        @foreach ($user->posts as $post)
                            <li>{{ $post->title }}</li>
                        @endforeach
                    </ul>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
