<x-guest-layout>
    <form method="POST" action="{{ route('login') }}" class="auth-form">
        @csrf

        <h2>Connexion</h2>

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <input type="email" name="email" placeholder="Adresse e-mail" required autofocus value="{{ old('email') }}">

        @error('password')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <input type="password" name="password" placeholder="Mot de passe" required>

        <label>
            <input type="checkbox" name="remember"> Se souvenir de moi
        </label>

        <button type="submit">Connexion</button>

        <p><a href="{{ route('password.request') }}">Mot de passe oublié ?</a></p>
        <p><a href="{{ route('register') }}">Creer un compte</a></p>
    </form>
</x-guest-layout>
