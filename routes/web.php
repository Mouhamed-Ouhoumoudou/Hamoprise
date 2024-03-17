<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\operation;

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

Route::get('/', function () {
    return view('kassouwa');
})->name('home');
Route::get('/boutique' , function(){
    return view('boutique');
})->name('boutique-route');
Route::get('/BoutiqueAdmin' , function(){
    return view('BoutiqueAdmin');
})->name('BoutiqueAdmin-route');

Route::get('/boutique/produit' , function(){
    return view('produit');
});
Route::get('/inscription' , function(){
    return view('inscription');
});
Route::get('/connexion' , function(){
    return view('connexion');

});
Route::get('/formulaire', function(){
    return view('formulaire');
});
Route::get('/boutique/profil',function(){
    return view('profil');
});
Route::get('/boutique/commande', function(){
    return view('commande');
});
Route::get('/boutique/message', function (){
    return view('message');
});
Route::get('/boutique/afficheMessage',function(){
    return view('afficheMessage');
});
Route::get('/' ,'App\Http\Controllers\operation@afficherBoutique');
Route::get('/rechercher' ,'App\Http\Controllers\operation@rechercher');
Route::post('/inscription/ajouter' ,'App\Http\Controllers\operation@ajouter');
Route::post('/connexion/connecter' ,'App\Http\Controllers\operation@connecter');
Route::post('/boutique/ajouterP', 'App\Http\Controllers\operation_sur_produit@ajouterP');
Route::get('/boutique/suprimer', 'App\Http\Controllers\operation_sur_produit@suprimer');
// Route::post('/boutique/profil/modifier' ,'App\Http\Controllers\navigation_dans_la_boutique@modifier');
Route::get('/boutique/produit', 'App\Http\Controllers\operation_sur_produit@afficher');
Route::post('/boutique/produit/commande','App\Http\Controllers\operation_sur_produit@commande');
Route::post('/boutique/produit/modifier','App\Http\Controllers\operation_sur_produit@modifier');
Route::post('/boutique/profil/modifierProfil','App\Http\Controllers\operation_sur_produit@modifierProfil');
Route::post('/boutique/message/envoi','App\Http\Controllers\operation_sur_produit@envoi');
Route::post('/boutique/profil/deconnecter','App\Http\Controllers\operation_sur_produit@deconnecter');


// Route::get('/boutique/message','App\Http\Controllers\operation_sur_produit@message');
// Route::get('/boutique/message','App\Http\Controllers\operation_sur_produit@message');



