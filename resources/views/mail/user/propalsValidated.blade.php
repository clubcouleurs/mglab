@component('mail::message', [
								'sujet' => $sujet
								])






# Bonjour M. {{$client}},

Les propositions pour votre création <strong><i>{{$conception->type}}</i></strong> sont prêtes et nous attendons votre retour.
Nous vous invitons à les consulter, choisir la meilleure proposition qui vous convient. Si nécessaire, envoyez-nous les modifications que vous voulez apporter.

Merci pour votre confiance et à très bientôt chez mongraphisme.com.

@component('mail::button', ['url' => config('app.url') . '/conceptions/' . $conception->id])
Consulter le projet
@endcomponent
@endcomponent



