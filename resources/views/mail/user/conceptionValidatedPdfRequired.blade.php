
@component('mail::message', [
								'sujet' => $sujet
								])






# Bonjour M. {{$client}},

Votre création <strong><i>{{$conception->type}}</i></strong> est validée. Votre fichier final sera prêt dans très peu de temps. Un email vous sera envoyé quand ledit fichier sera disponible pour le téléchargement.

Merci pour votre confiance et à très bientôt chez mongraphisme.com.

@component('mail::button', ['url' => config('app.url') . '/conceptions/' . $conception->id])
Consulter le projet
@endcomponent
@endcomponent




