<h1>Create a new Robotics Kit</h1>

<form action="{{ route('robotics.store') }}" method="POST">
    @csrf

    <label>Name *</label>
    <input type="text" name="name" required />

    <input type="submit" value="Create" />
</form>
