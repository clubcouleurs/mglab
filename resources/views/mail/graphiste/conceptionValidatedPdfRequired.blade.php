
@component('mail::message', [
								'sujet' => $sujet,
								])






# Bonjour M. {{$graphiste}},

Le client vient de valider une proposition pour sa création  {{$conception->type}}.

Merci d'uploader le pdf finale de la création, conférmement à sa note sur son Cahier de charge, le plus tôt possible.

@component('mail::button', ['url' => config('app.url') . '/conceptions/' . $conception->id ])
Consulter le projet
@endcomponent
@endcomponent




