<style>
    /* Variables */
    :root {
        --primary-color: #4a6cf7;
        --secondary-color: #6c757d;
        --success-color: #28a745;
        --danger-color: #dc3545;
        --light-gray: #f8f9fa;
        --medium-gray: #e9ecef;
        --dark-gray: #495057;
        --white: #ffffff;
        --box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        --border-radius: 6px;
        --transition-speed: 0.3s;
    }

    /* User form section styles */
    .user-form-section {
        max-width: 600px;
        margin: 2rem auto;
        padding: 2rem;
        background-color: var(--white);
        border-radius: var(--border-radius);
        box-shadow: var(--box-shadow);
        animation: fadeIn 0.4s ease-out;
    }

    .user-form-section .form-title {
        font-size: 1.5rem;
        color: var(--dark-gray);
        margin-bottom: 1.5rem;
        padding-bottom: 0.8rem;
        border-bottom: 1px solid var(--medium-gray);
        text-align: center;
    }

    .user-form-section .user-form {
        display: flex;
        flex-direction: column;
        gap: 1.25rem;
    }

    .user-form-section .form-group {
        position: relative;
        display: flex;
        flex-direction: column;
        gap: 0.5rem;
    }

    .user-form-section .form-group label {
        font-weight: 500;
        font-size: 0.9rem;
        color: var(--dark-gray);
        margin-bottom: 0.25rem;
    }

    .user-form-section .form-group input {
        padding: 0.75rem 1rem;
        border: 1px solid var(--medium-gray);
        border-radius: var(--border-radius);
        font-size: 1rem;
        transition: border-color var(--transition-speed), box-shadow var(--transition-speed);
    }

    .user-form-section .form-group input:focus {
        outline: none;
        border-color: var(--primary-color);
        box-shadow: 0 0 0 3px rgba(74, 108, 247, 0.2);
    }

    .user-form-section .form-group input::placeholder {
        color: #a7acb1;
        font-size: 0.9rem;
    }

    .user-form-section .form-group .error-msg {
        color: var(--danger-color);
        font-size: 0.8rem;
        margin-top: 0.25rem;
        display: flex;
        align-items: center;
    }

    .user-form-section .form-group .error-msg:before {
        content: "⚠️";
        margin-right: 0.5rem;
        font-size: 0.9rem;
    }

    .user-form-section .form-buttons {
        display: flex;
        justify-content: space-between;
        margin-top: 0.5rem;
        padding-top: 1.5rem;
        border-top: 1px solid var(--medium-gray);
    }

    .user-form-section .form-buttons .btn {
        padding: 0.75rem 1.5rem;
        border-radius: var(--border-radius);
        font-weight: 500;
        font-size: 1rem;
        cursor: pointer;
        transition: all var(--transition-speed);
        border: none;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-width: 120px;
    }

    .user-form-section .form-buttons .btn-cancel {
        background-color: var(--light-gray);
        color: var(--dark-gray);
        border: 1px solid var(--medium-gray);
    }

    .user-form-section .form-buttons .btn-cancel:hover {
        background-color: #e9ecef;
    }

    .user-form-section .form-buttons .btn-submit {
        background-color: var(--primary-color);
        color: var(--white);
    }

    .user-form-section .form-buttons .btn-submit:hover {
        background-color: #3a56c5;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(74, 108, 247, 0.3);
    }

    .user-form-section .form-buttons .btn-submit:active {
        transform: translateY(0);
        box-shadow: none;
    }

    /* Responsive styles */
    @media (max-width: 768px) {
        .user-form-section {
            padding: 1.5rem;
            margin: 1rem;
            width: auto;
        }

        .user-form-section .form-buttons {
            flex-direction: column-reverse;
            gap: 1rem;
        }

        .user-form-section .form-buttons .btn {
            width: 100%;
        }
    }

    /* Animation for form appear */
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(10px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>
<div class="user-form-section">
    <h2 class="form-title">{{ isset($user) ? 'Modifier un utilisateur' : 'Créer un utilisateur' }}</h2>

    <form action="{{ isset($user) ? route('admin.user.update', ['user' => $user->id]) : route('admin.user.store') }}"
        method="POST" class="user-form">
        @csrf
        @if (isset($user))
            @method('PUT')
        @endif

        <div class="form-group">
            <label for="name">Nom</label>
            <input type="text" name="name" id="name" value="{{ old('name', $user->name ?? '') }}"
                placeholder="Nom complet" required>
            @error('name')
                <p class="error-msg">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="email">Adresse email</label>
            <input type="email" name="email" id="email" value="{{ old('email', $user->email ?? '') }}"
                placeholder="Email" required>
            @error('email')
                <p class="error-msg">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="email_verified_at">Email vérifié le</label>
            <input type="text" name="email_verified_at" id="email_verified_at"
                value="{{ old('email_verified_at', $user->email_verified_at ?? '') }}"
                placeholder="YYYY-MM-DD HH:MM:SS">
            @error('email_verified_at')
                <p class="error-msg">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="password">Mot de passe</label>
            <input type="password" name="password" id="password" placeholder="Mot de passe"
                {{ isset($user) ? '' : 'required' }}>
            @error('password')
                <p class="error-msg">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-buttons">
            <a href="{{ route('admin.user.index') }}" class="btn btn-cancel">Annuler</a>
            <button type="submit" class="btn btn-submit">{{ isset($user) ? 'Modifier' : 'Créer' }}</button>
        </div>
    </form>
</div>
