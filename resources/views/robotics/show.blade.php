<h1>{{ $kit->name }}</h1>

<p>ID: {{ $kit->id }}</p>

<a href="{{ route('robotics.edit', $kit->id) }}">Edit</a>

<hr>

<h2>Courses attached</h2>

<ul>
@forelse($kit->courses as $course)
	<li>{{ $course->name }}</li>
@empty
	<p>There are no courses attached.</p>
@endforelse
</ul>

<hr>

<form action="{{ route('robotics.destroy', $kit->id) }}" method="POST">
	@csrf
	@method('delete')

	<input type="submit" value="Delete record" />

	</form>
