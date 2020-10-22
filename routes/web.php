<?php


use App\Conception;
use App\Propal;

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

use Illuminate\Http\Request;


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



/*Route::get('/form', function () {
    return view('form');
});*/

/*Route::get('mail', function () {
	
	$c = Conception::find(26);
	//$c->createPdf ;
	//die();
/*return (new ModificationAppliedNotification($conception))
                ->toMail(request()->user());*/
    //GraphisteAffected::dispatch($conception) ;            
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
//});



Route::middleware('auth')->group(function(){
// Authorization OK
Route::get('/conceptions/{conception}/pdf', 'ConceptionController@createPDF')
					->middleware('can:update,conception');
// Authorization OK
Route::post('/conceptions', 'ConceptionController@store')
									->middleware('can:create,conception');
// Authorization OK
Route::get('/conceptions/{conception}/edit', 'ConceptionController@edit')
									->middleware('can:edit,conception');

// Authorization OK
Route::get('/{type}/conceptions', 'TypeController@index');

// Authorization OK
Route::post('/conceptions/{conception}', 'ConceptionController@downgrade')
									->middleware('can:update,conception');

// Authorization OK
Route::patch('/conceptions/{conception}', 'ConceptionController@update')
									->middleware('can:update,conception');
// Authorization OK
Route::delete('/conceptions/{conception}', 'ConceptionController@destroy')
									->middleware('can:update,conception');
// Authorization OK
Route::get('/conceptions/{conception}', 'ConceptionController@show')
									->middleware('can:view,conception');
// Authorization OK
Route::get('/conceptions/{conception}/confirm', 'ConceptionController@confirm')
									->middleware('can:view,conception');

Route::get('/', 'ConceptionController@index')->name('home');

/*Route::get('/conceptions_en_attente', 'ConceptionController@crea_attente')
									->middleware('can:voir_conceptions_en_attente_config');*/

/*Route::get('/conceptions_en_cours', 'ConceptionController@crea_en_cours')
									->name('crea_en_cours')
									->middleware('can:voir_conceptions_en_cours_crea');*/

/*Route::get('/conceptions_validees', 'ConceptionController@crea_valide')
									->middleware('can:voir_conceptions_validées');*/


Route::get('/data-required', 'ConceptionController@WaitingForData')
									->middleware('can:administrer');
// Authorization OK
Route::get('/creation-required', 'ConceptionController@WaitingForCreation')
									->name('crea_en_cours')
									->middleware('can:soumettre_proposition');
// Authorization OK
Route::get('/graphic-required', 'ConceptionController@WaitingForGraphiste')
									->middleware('can:affecter_graphistes');
// Authorization OK
Route::get('/response-required', 'ConceptionController@WaitingForClient')
									->middleware('can:administrer');
// Authorization OK
Route::get('/modify-required', 'ConceptionController@WaitingForModification')
									->middleware('can:soumettre_proposition');
// Authorization OK
Route::get('/validation-required', 'ConceptionController@WaitingForValidation')
									->middleware('can:valider_création');									
// Authorization OK
Route::get('/pdf-required', 'ConceptionController@WaitingForPDF')
									->middleware('can:soumettre_proposition');	

// Authorization OK
Route::get('/validated', 'ConceptionController@conceptionEnding')
									->middleware('can:voir_conceptions_validées');
// Authorization OK									
Route::get('/dashboard', 'ConceptionController@dashboard')->name('dashboard')
									->middleware('can:voir_dashboard');

// Routes for propals and modification
// Authorization OK									
Route::get('/conceptions/{conception}/propositions', 'PropalController@index')
									->middleware('can:viewPropal,conception');
/////////////////////////////////////////////////////////////////////////////////////

// Authorization OK				
Route::get('/conceptions/{conception}/propositions/{propal}', 'PropalController@show')
								->middleware('can:view,propal');

// Authorization OK	
Route::put('/conceptions/{conception}/propositions/{propal}', 'PropalController@update')
									->middleware('can:update,propal');

// Authorization OK	
Route::post('/conceptions/{conception}/propositions', 'PropalController@store')
									->middleware('can:update,conception');
/////////////////////////////////////////////////////////////////////////////////////

//Route::get('/propositions/{propal}/create', 'PropalController@create')
//									->middleware('can:create,App\propal');



// Authorization OK
Route::get('/propositions/{propal}/edit', 'PropalController@edit')
									->middleware('can:update,propal');



// Authorization OK
Route::get('/propositions/{propal}', 'PropalController@show')
									->middleware('can:view,propal');


//Routes for modification
// Authorization OK
Route::post('/propositions/{propal}/modifications', 'ModificationController@store')
									->middleware('can:update,propal');


Route::post('conceptions/{conception}/modifications/{modification}/propositions', 'PropalController@storeAsPropalAfterModification');//->middleware('can:update,propal');



// Route for notifications
Route::get('/notifications-lus' , 'NotificationController@showRead') ;
Route::get('/notifications-non-lus' , 'NotificationController@showUnread') ;

});

Auth::routes();

