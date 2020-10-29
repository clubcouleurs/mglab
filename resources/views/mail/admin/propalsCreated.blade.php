
@component('mail::message', [
								'sujet' => $sujet,
								])






# Bonjour M. Administrator,

Le graphiste <strong><i>{{ $graphiste }}</i></strong> vient d'uploader les propositions de la conception
{{$conception->type}}.

Merci de valider dans les plus brefs délais.

@component('mail::button', ['url' => config('app.url') . '/conceptions/' . $conception->id])
Consulter le projet
@endcomponent
@endcomponent




