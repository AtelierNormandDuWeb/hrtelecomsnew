<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" class="auth-form">
        @csrf

        <h2>Créer un compte</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul style="padding-left: 1rem; text-align: left;">
                    @foreach ($errors->all() as $error)
                        <li style="color: red;">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <input type="text" name="name" value="{{ old('name') }}" placeholder="Nom et prénom *" required>

        <input type="email" name="email" value="{{ old('email') }}" placeholder="Adresse email *" required>

        <input type="password" name="password" placeholder="Mot de passe *" required>

        <input type="password" name="password_confirmation" placeholder="Confirmer le mot de passe *" required>

        <button type="submit">Créer mon compte</button>

        <p class="auth-link">
            Déjà inscrit ? <a href="{{ route('login') }}">Se connecter</a>
        </p>
    </form>
</x-guest-layout>
