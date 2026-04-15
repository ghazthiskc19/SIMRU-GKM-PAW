<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Mahasiswa</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/login_mahasiswa_style.css'])

</head>
<body>
    <div class="mobile-container">
        <img src="{{ asset('images/decor_top_orange.svg') }}" alt="" class="decor-top">
        <img src="{{ asset('images/decor_bottom_orange.svg') }}" alt="" class="decor-bottom-orange">
        <img src="{{ asset('images/decor_bottom_blue.svg') }}" alt="" class="decor-bottom-blue">

        <div class="login-card">
            <h2>Welcome back!</h2>
            <p class="subtitle">Login to your  account</p>
            @if(session('error'))
                <div style="
                    background-color:#ffdddd;
                    color:#a94442;
                    padding:10px;
                    border-radius:5px;
                    margin-bottom:10px;
                    text-align:center;
                ">
                    {{ session('error') }}
                </div>
            @endif

            <form action="{{ route('login_mahasiswa.process') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                </div>
                
                
                <button type="submit" class="btn-login">Login</button>
                
            </form>

            <div class="forgot-password">
                <a href="">Lupa password</a>
            </div>

            <div class="register-link">
                 Don't have account? <a href="#">Daftar Akun Baru</a>
            </div>

        </div>
    </div>
</body>
</html>