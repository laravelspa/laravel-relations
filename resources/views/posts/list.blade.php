<h1>Posts List</h1>
<table>
    <thead>
        <tr>
            <th style="text-align: center">Title</th>
            <th style="text-align: center">Username</th>
            <th style="text-align: center">Firstname</th>
            <th style="text-align: center">Lastname</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($posts as $post)
            <tr>
                <td>{{ $post->title }}</td>
                <td>{{ $post->user->username }}</td>
                <td>{{ $post->user->profile->firstname }}</td>
                <td>{{ $post->user->profile->lastname }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
