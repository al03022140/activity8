<h1>Edit {{ $user->name }}</h1>

<form action="{{ route('users.update', $user->id) }}" method="POST">
    @csrf
    @method('patch')

    <label>Name *</label>
    <input type="text" name="name" value="{{ $user->name }}" required />

    <br><br>

    <label>Email *</label>
    <input type="email" name="email" value="{{ $user->email }}" required />

    <br><br>

    <label>Password (leave blank to keep current)</label>
    <input type="password" name="password" />

    <br><br>

    <input type="submit" value="Edit" />
</form>
