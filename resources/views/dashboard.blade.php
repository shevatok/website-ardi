
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Pengguna</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        body {
            background-image: url('assets/images/new-cars-model/iuiu2.jpg'); /* Ganti dengan path gambar Anda */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 100vh;
            margin: 0;
            display: flex; /* Menggunakan flex untuk pusatkan konten */
            align-items: center; /* Vertikal center */
            justify-content: center; /* Horizontal center */
        }
        .card {
            background-color: white; /* Warna latar belakang putih */
            opacity: 0.9; /* Sedikit transparansi, bisa diubah sesuai kebutuhan */
            border-radius: 10px; /* Sudut membulat */
            padding: 20px; /* Ruang dalam card */
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1); /* Bayangan */
        }
    </style>
</head>

    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="card p-4 shadow-lg" style="width: 400px; border-radius: 20px; background: linear-gradient(135deg, #f3f4f6 0%, #cfd9df 100%);">
            <h2 class="mb-4 text-center" style="color: #007bff; font-family: 'Poppins', sans-serif; font-weight: bold;">Selamat Datang Admin</h2>
            <h4 class="mb-4 text-center" style="color: #007bff; font-family: 'Roboto', sans-serif;">Silahkan menambah user</h4>

            <!-- Display success or error messages -->
            @if(session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Form to add a user -->
            <form action="{{ route('admin.addUser') }}" method="POST">
                @csrf
                <div class="form-group mb-3">
                    <label for="name" style="font-weight: bold;">Nama</label>
                    <input type="text" name="name" class="form-control" placeholder="Masukkan nama lengkap" required style="border-radius: 10px;">
                </div>

                <div class="form-group mb-3">
                    <label for="email" style="font-weight: bold;">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Masukkan email" required style="border-radius: 10px;">
                </div>

                <div class="form-group mb-3">
                    <label for="password" style="font-weight: bold;">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Masukkan password" required style="border-radius: 10px;">
                </div>

                <div class="form-group mb-4">
                    <label for="role" style="font-weight: bold;">Login as:</label>
                    <select name="role" class="form-control" required style="border-radius: 10px;">
                        <option value="admin">Admin</option>
                        <option value="user">User</option>
                        <option value="anggota">Anggota</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary btn-block" style="border-radius: 25px; background: linear-gradient(90deg, #007bff 0%, #00c6ff 100%); font-weight: bold; transition: background-color 0.3s, transform 0.3s;">Tambahkan User</button>
            </form>

            <!-- Logout Button -->
            <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit" class="btn btn-danger mt-3 btn-block" style="border-radius: 25px; background: linear-gradient(90deg, #ff416c 0%, #ff4b2b 100%); font-weight: bold; transition: background-color 0.3s, transform 0.3s;">Logout</button>
            </form>
        </div>
    </div>

    <!-- Custom styles -->
    <style>
        .container {
            min-height: 100vh;
        }

        .card {
            background-color: #ffffff;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .btn-primary:hover {
            background-color: #0056b3;
            transform: scale(1.05);
        }

        .btn-danger:hover {
            background-color: #c82333;
            transform: scale(1.05);
        }

        h2, h4 {
            font-family: 'Poppins', sans-serif;
            font-weight: bold;
        }

        label {
            font-family: 'Roboto', sans-serif;
            font-size: 14px;
            color: #333;
        }

        input, select {
            font-family: 'Roboto', sans-serif;
            font-size: 14px;
        }

        .form-control:focus {
            box-shadow: 0 0 10px rgba(0, 123, 255, 0.5);
        }

        .alert {
            font-family: 'Roboto', sans-serif;
        }
    </style>



<body>

</body>
</html>
