
@component('mail::message', [
								'sujet' => $sujet,

								])






# Bonjour M. {{ $graphiste }},

Vous êtes affecté au projet <strong><i>{{$conception->type}}</i></strong>.

Merci de le prendre en considération.

@component('mail::button', ['url' => config('app.url') . '/conceptions/' . $conception->id ])
Consulter le projet
@endcomponent
@endcomponent




