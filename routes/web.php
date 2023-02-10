<?php

use App\Http\Controllers\AdminFuncController;
use App\Http\Controllers\AdminViewController;
use App\Http\Controllers\Auth\SocialiteController;
use App\Http\Controllers\CharaEquipmentController;
use App\Http\Controllers\CharaInventoryController;
use App\Http\Controllers\ProbabilityController;
use App\Http\Controllers\ScenarioController;
use App\Http\Controllers\StartSceneController;
use App\Http\Controllers\UserCharacterController;
use App\Models\CharaEquipment;
use Illuminate\Support\Facades\Auth;
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

Route::group(['middleware' => 'auth'], function(){
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);
});


Auth::routes();

Route::get('/character-creation', [UserCharacterController::class, 'charaCreation']);
Route::post('/character-creation/race', [UserCharacterController::class, 'pickRaces']);
Route::post('/character-creation/class', [UserCharacterController::class, 'pickClass']);
Route::post('/character-creation/stats', [UserCharacterController::class, 'addStats']);


//ADMIN
Route::get('admin/dash', [AdminViewController::class, 'viewIndex']);
//RACE
Route::get('admin/dash/race', [AdminViewController::class, 'viewRace']);
Route::get('admin/dash/race/add', [AdminViewController::class, 'addRace']);
Route::get('admin/dash/race/edit/{id}', [AdminViewController::class, 'editVRace']);
Route::get('admin/dash/race/trashed', [AdminViewController::class, 'trashedRace']);
Route::post('admin/dash/race/add', [AdminFuncController::class, 'createRace']);
Route::put('admin/dash/race/edit/{id}', [AdminFuncController::class, 'editRace']);
Route::delete('admin/dash/race/{id}', [AdminFuncController::class, 'destroyRace']);

//CLASS
Route::get('admin/dash/class', [AdminViewController::class, 'viewClass']);
Route::get('admin/dash/class/add', [AdminViewController::class, 'addClass']);
Route::get('admin/dash/class/edit/{id}', [AdminViewController::class, 'editVClass']);
Route::get('admin/dash/class/trashed', [AdminViewController::class, 'trashedClass']);
Route::post('admin/dash/class/add', [AdminFuncController::class, 'createClass']);
Route::put('admin/dash/class/edit/{id}', [AdminFuncController::class, 'editClass']);
Route::delete('admin/dash/class/{id}', [AdminFuncController::class, 'destroyClass']);

//ITEM
Route::get('admin/dash/item', [AdminViewController::class, 'viewItem']);
Route::get('admin/dash/item/add', [AdminViewController::class, 'addItem']);
Route::get('admin/dash/item/edit/{id}', [AdminViewController::class, 'editVItem']);
Route::get('admin/dash/item/trashed', [AdminViewController::class, 'trashedItem']);
Route::post('admin/dash/item/add', [AdminFuncController::class, 'createItem']);
Route::put('admin/dash/item/edit/{id}', [AdminFuncController::class, 'editItem']);
Route::delete('admin/dash/item/{id}', [AdminFuncController::class, 'destroyItem']);

//StartScene
Route::get('admin/dash/start-scene', [AdminViewController::class, 'viewStartScene']);
Route::get('admin/dash/start-scene/add', [AdminViewController::class, 'addStartScene']);
Route::post('admin/dash/start-scene/add', [AdminFuncController::class, 'createStartScene']);

//Scenarios
Route::get('admin/dash/scenarios', [AdminViewController::class, 'viewScene']);
Route::get('admin/dash/scenarios/add', [AdminViewController::class, 'addScene']);
Route::get('admin/dash/scenarios/{id}', [AdminViewController::class, 'showScene']);
Route::post('admin/dash/scenarios', [AdminFuncController::class, 'storeScene']);

//ItemInventory
Route::post('item/inventory/check', [CharaInventoryController::class, 'getItem']);


//STORE IMG
Route::post('admin/dash/store-img', [AdminFuncController::class, 'storeImage']);

/**
 * socialite auth
 */
Route::get('/auth/{provider}', [SocialiteController::class, 'redirectToProvider']);
Route::get('/auth/{provider}/callback', [SocialiteController::class, 'handleProvideCallback']);

Route::get('/test', [ProbabilityController::class, 'test']);


//GET DATA ITEM
Route::post('/item/data/230aasidjasodjoijasodijoijfaoisdopajsdpjpjbkbkjayrsydtuuydklilasodopjppoaisd908qwid09sia0d9i', [AdminFuncController::class, 'getItemData'])->name('data.item');

//EQUIP ITEM
Route::post('equip/item', [CharaEquipmentController::class, 'equipItem']);
//START SCENE
Route::post('start/scenes', [StartSceneController::class, 'showStartScenes']);
//GET SCENES
Route::post('scene/call', [ScenarioController::class, 'callScene']);