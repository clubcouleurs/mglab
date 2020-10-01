
@component('mail::message', [
								'sujet' => $sujet,
								])






# Bonjour M. {{$graphiste}},

Le client vient de faire une demande de modification pour sa création  {{$conception->type}}.

Merci de regarder pour la suite.

@component('mail::button', ['url' => config('app.url') . '/conceptions/' . $conception->id ])
Consulter le projet
@endcomponent
@endcomponent




