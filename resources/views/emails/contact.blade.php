<h1>Nouveau message de contact</h1>

<p><strong>Nom :</strong> {{ $data['name'] }}</p>
<p><strong>Téléphone :</strong> {{ $data['phone'] ?? 'Non renseigné' }}</p>
<p><strong>Email :</strong> {{ $data['email'] }}</p>
<p><strong>Message :</strong><br>{{ nl2br(e($data['message'])) }}</p>
