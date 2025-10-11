<h1>Edit {{ $kit->name }}</h1>

<form action="{{ route('robotics.update', $kit->id) }}" method="POST">
    @csrf
    @method('patch')

    <label>Name *</label>
    <input type="text" name="name" value="{{ $kit->name }}" required />

    <input type="submit" value="Edit" />
</form>
