<h1>Robotics Kits</h1>

<a href="{{ route('robotics.create') }}">Create</a>

<br><br>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($kits as $kit)
            <tr>
                <td>{{ $kit->id }}</td>
                <td>{{ $kit->name }}</td>
                <td>
                    <a href="{{ route('robotics.show', $kit->id) }}">View</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
