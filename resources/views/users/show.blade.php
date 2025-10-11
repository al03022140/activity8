<h1>{{ $user->name }}</h1>

<p>ID: {{ $user->id }}</p>
<p>Email: {{ $user->email }}</p>

<a href="{{ route('users.edit', $user->id) }}">Edit</a>

<hr>

<h2>Courses enrolled</h2>

<ul>
@forelse($user->courses as $course)
    <li>{{ $course->name }}</li>
@empty
    <p>There are no courses enrolled.</p>
@endforelse
</ul>

<hr>

<form action="{{ route('users.destroy', $user->id) }}" method="POST">
    @csrf
    @method('delete')

    <input type="submit" value="Delete record" />
</form>
