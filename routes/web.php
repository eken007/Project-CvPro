<?php

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


Auth::routes();


Route::get('/', [\App\Http\Controllers\AccueilController::class, 'index'])->name('accueil');

Route::get('/choix', [\App\Http\Controllers\ChoixController::class, 'index'])->name('choix');

Route::get('/LoginEntreprise', [\App\Http\Controllers\EntrepriseController::class, 'index'])->name('entreprise');

Route::namespace('admin')->prefix('admin')->name('admin.')->middleware('can:manage-users')->group(function(){
    Route::resource('users', '\App\Http\Controllers\admin\UsersController');
});

Route::get('/get-all-user', [\App\Http\Controllers\EmpController::class, 'getAllUsers']);

Route::get('/download-pdf', [\App\Http\Controllers\FormCreateCvController::class, 'downloadPDF'])->middleware('auth')->name('download');

Route::get('/form-creation-cv', [\App\Http\Controllers\FormCreateCvController::class, 'index'])->middleware('auth')->name('createcv');

Route::post('/sav-creation-cv', [\App\Http\Controllers\FormCreateCvController::class, 'store'])->middleware('auth')->name('savcreatecv');

Route::get('/mon-cv', [\App\Http\Controllers\MonCvController::class, 'index'])->name('moncv');

Route::get('/generate-pdf', [\App\Http\Controllers\MonCvController::class, 'createPDF'])->name('generate-pdf');

Route::get('/form-annonce', [\App\Http\Controllers\AnnonceController::class, 'index'])->name('annonce');

Route::post('/sav-annonce', [\App\Http\Controllers\AnnonceController::class, 'store'])->name('savannonce');

Route::get('/emploie', [\App\Http\Controllers\AnnonceController::class, 'emploie'])->name('emploie');

Route::delete('/supprimerAnnone/{annonce}', [\App\Http\Controllers\AnnonceController::class, 'destroy'])->name('supprimerAnnonce');

Route::get('/editerAnnonce/{annonce}', [\App\Http\Controllers\AnnonceController::class, 'edit'])->name('editeAnnonce');

Route::put('/modifierAnnone/{annonce}', [\App\Http\Controllers\AnnonceController::class, 'update'])->name('modifierAnnonce');

Route::get('/deposer-cv', [\App\Http\Controllers\DeposerCvController::class, 'index'])->name('deposerCv');

Route::post('/depot-cv', [\App\Http\Controllers\DeposerCvController::class, 'store'])->middleware('auth')->name('depotcv');

Route::get('/cv', [\App\Http\Controllers\DeposerCvController::class, 'viewcv'])->name('Cv');

Route::delete('/supprimerCv/{cv}', [\App\Http\Controllers\DeposerCvController::class, 'destroy'])->name('supprimerCv');

Route::get('/editerCv/{cv}', [\App\Http\Controllers\DeposerCvController::class, 'edit'])->name('editeCv');

Route::put('/modifierCv/{cv}', [\App\Http\Controllers\DeposerCvController::class, 'update'])->name('modifierCv');

Route::put('/boosterCv/{cv}', [\App\Http\Controllers\DeposerCvController::class, 'booster'])->name('boosterCv');

Route::put('/nonboosterCv/{cv}', [\App\Http\Controllers\DeposerCvController::class, 'nonbooster'])->name('deboosterCv');

Route::get('/telechargerCv/{cv}', [\App\Http\Controllers\DeposerCvController::class, 'show'])->name('telechargerCv');

Route::get('/stage', [\App\Http\Controllers\AnnonceController::class, 'stage'])->name('stage');

Route::get('/embauche', [\App\Http\Controllers\AnnonceController::class, 'embauche'])->name('embauche');

Route::get('/mesannonces', [\App\Http\Controllers\AnnonceController::class, 'mesannonces'])->middleware('auth')->name('mesAnnonces');

Route::get('/send-mail/{annonce}', [\App\Http\Controllers\MailController::class, 'sendEmail'])->name('sendMail');




