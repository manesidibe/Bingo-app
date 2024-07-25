<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <form action="{{ route('register') }}" method="POST">
        @csrf
        <div class="login-container">
            <div class="logo-container">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="logo">
            </div>
        <div class="form-group">
            <b><span class="required">*</span></b><input type="text" id="username" name="username" placeholder="Username" required>
            @error('username')
            <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <b><span class="required">*</span></b><input type="password" id="password" name="password" placeholder="Password" required>
            <i class="fas fa-eye eye-icon" onclick="togglePasswordVisibility()"></i>
            @error('password')
            <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <b><span class="required">*</span></b><input type="password" id="password_confirmation" name="password_confirmation" placeholder="password_confirmation" required>
            <i class="fas fa-eye eye-icon" onclick="togglePasswordVisibility()"></i>
            @error('password_confirmation')
            <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <b><span class="required">*</span> </b><select id="role" name="role" required>
                <option value="admin">Admin</option>
                <option value="user">User</option>
            </select>
            @error('role')
            <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit">Register</button>
        </div>
    <p>Already have an account? <a href="{{ route('login') }}">Login here</a></p>
</form>
    <script>
        function togglePasswordVisibility() {
            const passwordField = document.getElementById('password');
            const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordField.setAttribute('type', type);
            const eyeIcon = document.querySelector('.eye-icon');
            eyeIcon.classList.toggle('fa-eye');
            eyeIcon.classList.toggle('fa-eye-slash');
        }
    </script>


</body>
</html>
