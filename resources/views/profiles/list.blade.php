<h1>Profiles List</h1>
<table>
    <thead>
        <tr>
            <th style="text-align: center">Username</th>
            <th style="text-align: center">Firstname</th>
            <th style="text-align: center">Lastname</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($profiles as $profile)
            <tr>
                <td>{{ $profile->user->username }}</td>
                <td>{{ $profile->firstname }}</td>
                <td>{{ $profile->lastname }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
