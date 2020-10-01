<?php


use App\Conception;
use App\Events\ChoixFaitModificationReceived;
use App\Events\ConceptionValidated;
use App\Events\DataConceptionReceived;
use App\Events\GraphisteAffected;
use App\Events\ModificationApplied;
use App\Events\ModificationValidated;
use App\Events\PropalsCreated;
use App\Events\PropalsValidated;
use App\Notifications\DataConceptionReceivedNotification;
use App\Notifications\DataConceptionReceivedNotificationToClient;
use App\Notifications\GraphisteAffectedNotification;
use App\Notifications\ModificationAppliedNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/form', function () {
    return view('form');
});

Route::get('mail', function () {
	
	$conception = Conception::find(11);
/*return (new ModificationAppliedNotification($conception))
                ->toMail(request()->user());*/
    GraphisteAffected::dispatch($conception) ;            
    //ConceptionValidated::dispatch($conception) ;
	//ModificationValidated::dispatch($conception);
	//ModificationApplied::dispatch($conception);
	//ChoixFaitModificationReceived::dispatch($conception) ;
	//PropalsValidated::dispatch($conception) ;
    //PropalsCreated::dispatch($conception) ;
    //GraphisteAffected::dispatch($conception) ;
	//DataConceptionReceived::dispatch($c) ;

	      /*  Notification::send(request()->user() ,
                            new DataConceptionReceivedNotificationToClient($c)) ;


	
    return (new DataConceptionReceivedNotificationToClient($Conception))
                ->toMail(request()->user());*/
});



Route::middleware('auth')->group(function(){

Route::post('/conceptions', 'ConceptionController@store')->middleware('can:create,conception');
Route::get('/conceptions/{conception}/edit', 'ConceptionController@edit')->middleware('can:update,conception');

Route::patch('/conceptions/{conception}', 'ConceptionController@update')->middleware('can:update,conception');

Route::get('/conceptions/{conception}', 'ConceptionController@show')->middleware('can:view,conception');



Route::get('/', 'ConceptionController@index')->name('home');

Route::get('/conceptions_en_attente', 'ConceptionController@crea_attente')
									->middleware('can:voir_conceptions_en_attente_config');
Route::get('/conceptions_en_cours', 'ConceptionController@crea_en_cours')
									->name('crea_en_cours')
									->middleware('can:voir_conceptions_en_cours_crea');
Route::get('/conceptions_validees', 'ConceptionController@crea_valide')
									->middleware('can:voir_conceptions_validées');



Route::get('/dashboard', 'ConceptionController@dashboard')->name('dashboard')
													->middleware('can:voir_dashboard');

// Routes for propals and modification
Route::get('/conceptions/{conception}/propositions', 'PropalController@index') ; //->middleware('can:view,Propal');

Route::put('/conceptions/{conception}/propositions/{propal}', 'PropalController@update') ; //->middleware('can:view,Propal');

Route::post('/conceptions/{conception}/propositions', 'PropalController@store') ; //->middleware('can:view,Propal');

Route::get('/propositions/{propal}/create', 'PropalController@create') ; //->middleware('can:view,Propal');


Route::get('/propositions/{propal}/create', 'PropalController@create') ; //->middleware('can:view,Propal');

Route::get('/propositions/{propal}/edit', 'PropalController@edit') ; //->middleware('can:view,Propal');

Route::get('/propositions/{propal}', 'PropalController@show') ; //->middleware('can:view,Propal');


//Routes for modification

Route::post('/propositions/{propal}/modifications', 'ModificationController@store') ; //->middleware('can:view,Propal');

Route::post('conceptions/{conception}/modifications/{modification}/propositions', 'PropalController@storeAsPropalAfterModification') ; //->middleware('can:view,Propal');

});

Auth::routes();

