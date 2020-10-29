
@component('mail::message', [
								'sujet' => $sujet
								])






# Bonjour M. {{$client}},

Votre création <strong><i>{{$conception->type}}</i></strong> est finalisée et validée et votre fichier pour impression est prêt.
Vous pourrez ainsi le télécharger à tout moment sur notre plateforme.

Merci pour votre confiance et à très bientôt chez mongraphisme.com.

@component('mail::button', ['url' => config('app.url') . '/conceptions/' . $conception->id])
Consulter le projet
@endcomponent
@endcomponent




