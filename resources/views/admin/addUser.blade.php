<form action="{{ route('admin.addUser') }}" method="POST">
    @csrf
    <!-- input fields -->
    <button type="submit">Tambahkan User</button>
</form>

