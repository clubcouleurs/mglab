
@component('mail::message', [
								'sujet' => $sujet,
								])






# Bonjour M. Administrator,

Le graphiste <strong><i>{{ $graphiste }}</i></strong> vient d'uploader la modification demandée par le client pour la conception {{$conception->type}}.

Merci de valider dans les plus brefs délais.

@component('mail::button', ['url' => config('app.url') . '/conceptions/' . $conception->id . '/propositions' ])
Consulter le projet
@endcomponent
@endcomponent




