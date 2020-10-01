
@component('mail::message', [
								'sujet' => $sujet
								])






# Bonjour M. {{$client}},

La modification que vous avez demandé pour votre création <strong><i>{{$conception->type}}</i></strong> est prête et nous attendons votre retour.
Nous vous invitons à la consulter, la valider ou, si nécessaire, envoyez-nous les modifications que vous voulez apporter.

Merci pour votre confiance et à très bientôt chez mongraphisme.com.

@component('mail::button', ['url' => config('app.url') . '/conceptions/' . $conception->id . '/propositions'])
Consulter le projet
@endcomponent
@endcomponent




