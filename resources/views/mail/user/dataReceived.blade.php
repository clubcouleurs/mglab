@component('mail::message', [
								'sujet' => $sujet
								])






# Bonjour M. {{$client}},

Nous vous confirmons la bonne réception de votre dossier de création graphique
<strong><i>{{$conception->type}}</i></strong>.
Et que la machine créative démarre ...

Merci pour votre confiance et à très bientôt chez mongraphisme.com.

@component('mail::button', ['url' => config('app.url') . '/conceptions/' . $conception->id ])
Consulter le projet
@endcomponent
@endcomponent




