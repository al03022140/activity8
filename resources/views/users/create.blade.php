<h1>Create User</h1>

<form action="{{ route('users.store') }}" method="POST">
    @csrf

    <label>Name *</label>
    <input type="text" name="name" required />

    <br><br>

    <label>Email *</label>
    <input type="email" name="email" required />

    <br><br>

    <label>Password *</label>
    <input type="password" name="password" required />

    <br><br>

    <input type="submit" value="Create" />
</form>
