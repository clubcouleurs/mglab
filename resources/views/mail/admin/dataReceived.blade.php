
@component('mail::message', [
								'sujet' => $sujet,
								])






# Bonjour M. Administrator,

Le client <strong><i>{{ $client }}</i></strong> vient d'envoyer ses données pour la réalisation
du projet {{$conception->type}}.

Merci d'affecter un graphiste dans les plus brefs délais.

@component('mail::button', ['url' => config('app.url') . '/conceptions/' . $conception->id ])
Consulter le projet
@endcomponent
@endcomponent




