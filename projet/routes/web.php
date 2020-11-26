<?php

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
Route::get('page-produit','welcomeController@pageproduitindex')->name('page-produit');
Route::get('/', 'welcomeController@index')->name('welcome');
Route::get('description-produit/{id}','DescproduitController@index')->name('descproduit');
Route::resource('contacts', 'ContactController');
Auth::routes();
Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
Route::get('/home', 'HomeController@index')->name('home');
Route::resource('produits', 'ProduitController');
Route::resource('partenaires', 'PartenaireController');
Route::resource('categories', 'CategorieController');
Route::resource('propos', 'AproposController');
Route::resource('imageproduits', 'ProduitimageController');
Route::resource('temoignages', 'TemoignageController');
Route::get('showFromNotification/{contact}/{notification}','ContactController@showFromNotification')->name('showFromNotification');
Route::get('produitsimage/{id}','ProduitController@produitimage')->name('produitimage');
Route::get('produitsmois/{id}','ProduitController@produitmois')->name('produitmois');
Route::post('produits.addimage','ProduitController@addimage')->name('addimage');
Route::post('produits.updateproduit', 'ProduitController@updateproduit')->name('produits.updateproduit');
Route::post('produits.updateproduitmois', 'ProduitController@updateproduitmois')->name('updateproduitmois');
Route::post('produits.updateproduitvedette', 'ProduitController@updateproduitvedette')->name('updateproduitvedette');
Route::post('produits.produit-mois','ProduitController@addproduitmois')->name('addproduitmois');
Route::post('produits.produitvedette','ProduitController@addproduitvedette')->name('addproduitvedette');
Route::resource('admin/produit-mois', 'ProduitmoisController');
});
