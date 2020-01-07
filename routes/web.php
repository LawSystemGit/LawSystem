<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

// this is comment
Route::get('/', 'AuthController@index');

// login routes
Route::get('/login', 'AuthController@index')->name('login');
Route::post('/post-login', 'AuthController@postLogin')->name('postLogin');

// registrations routes
Route::get('/registration', 'AuthController@registration')->name('registration');
Route::post('/post-registration', 'AuthController@postRegistration')->name('postRegistration');

// logout route
Route::get('/logout', 'AuthController@logout')->name('logout');

Route::middleware(['auth'])->group(function () {


// law Rotes
    Route::get('laws', 'LawsController@index')->name('getLaws');
    Route::get('laws-list', 'LawsController@lawsList');
    Route::get('/laws/create', 'LawsController@create')->name('addNewLaw');
    Route::post('/laws/store', 'LawsController@store')->name('saveLaw');
    Route::get('/laws/{law}/showlaw', 'LawsController@show')->name('showlaw');
    Route::get('/laws/{lawID}/edit', 'LawsController@edit')->name('editLaw');
    Route::patch('/laws/{lawID}/ushowlawpdate', 'LawsController@update')->name('updateLaw');
    Route::delete('/law/delete/{lawID}', 'LawsController@destory')->name('delteLaw');
    Route::get('/laws/{lawID}/addArticles', 'LawsController@AddArticles')->name('addArticle');
    Route::post('/laws/SaveLawArticle', 'LawsController@SaveLawArticles')->name('SaveLawArticle');
    Route::get('/laws/{law}/showArticles', 'LawsController@showArticles')->name('showrticles');
    Route::get('/laws/{articleID}/editArticle', 'LawsController@editArticle')->name('editArticle');
    Route::patch('/laws/{articleID}/updateArticle', 'LawsController@updateArticle')->name('updateArticle');
    Route::delete('/laws/{articleID}/deleteArticle', 'LawsController@deleteArticle')->name('deleteArticle');
    Route::get('/laws/{lawID}/off', 'LawsController@lawOFF')->name('lawOFF');
    Route::get('/laws/{lawID}/on', 'LawsController@lawON')->name('lawON');
    Route::get('/laws/{articleID}/show', 'lawfrontController@show')->name('showArticle');
    Route::get('/laws/{articleID}/relatedJudgments', 'lawfrontController@relatedJudgments')->name('relatedJudgments');
    Route::get('/laws/SearchArticles/{articleNo}', 'LawsController@SearchArticles')->name('searchArticle');

// judgments routes

    Route::get('/judgments', 'JudgmentsController@index')->name('getJudgments');
    Route::get('judgments-list', 'JudgmentsController@judgmentsList');
    Route::get('/judgments/create/{lastJudgment?}', 'JudgmentsController@create')->name('addJudgments');
    Route::post('/judgments/store', 'JudgmentsController@store')->name('saveJudgments');
    Route::get('/judgments/{judgment}/showjudgment', 'JudgmentsController@show')->name('showjudgment');
    Route::get('/judgments/{lastJudgment}/updateLastInput', 'JudgmentsController@updateLastInput')->name('updateLastInput');
    Route::patch('/judgments/{lastJudgment}/saveLastInput', 'JudgmentsController@saveLastInput')->name('saveLastInput');
    Route::get('/judgments/{judgmentID}/edit', 'JudgmentsController@edit')->name('editJudgment');
    Route::patch('/judgments/{JudgmentID}/update', 'JudgmentsController@update')->name('updateJudgment');
    Route::get('/judgments/addNote/{judgmentID}', 'JudgmentNotesController@addNote')->name('addNote');
    Route::post('/judgments/saveNote/{judgmentID}', 'JudgmentNotesController@store')->name('saveNote');
    Route::get('/judgments/{judgmentID}/showNotes', 'JudgmentNotesController@showNotes')->name('showNotes');
    Route::delete('/judgments/{noteID}/deleteNote', 'JudgmentNotesController@deleteNote')->name('deleteNote');


    // Al Kuwait Alyoum Routes
    Route::get('KuwaitAlyoum', 'KuwaiTodayController@index')->name('KuwaitAlyoum');
    Route::get('KuwaitAlyoum-list', 'KuwaiTodayController@KuwaitAlyoumList')->name('KuwaitAlyoumList');
    Route::get('/KuwaitAlyoum/create/{lastVersion?}', 'KuwaiTodayController@create')->name('addVersion');
    Route::post('/KuwaitAlyoum/store', 'KuwaiTodayController@store')->name('saveVersion');
    Route::get('/KuwaitAlyoum/{lastVersion}/updateLastInput', 'KuwaiTodayController@updateLastInput')->name('updateLastVersion');
    Route::patch('/KuwaitAlyoum/{lastVersion}/saveLastInput', 'KuwaiTodayController@saveLastInput')->name('saveLastVersion');
    Route::get('/KuwaitAlyoum/{version}/show', 'KuwaiTodayController@show')->name('showVersion');


});

Route::get('/test/', function () {

    $files = array_filter(Storage::disk('local')->files('/public/KuwaitAlyoum_unfinished'),
        function ($item) {
            return strpos($item, 'pdf');
        });
    $realfilesName = [];
    foreach ($files as $file) {
        $data = explode("/", $file);
        $realfilesName [] = $data[2];
    }
    return $realfilesName;

});
Route::get('test2', function () {
    $files = Storage::allFiles('/public/KuwaitAlyoum_unfinished');
    $realfilesName = [];
    foreach ($files as $file) {
        $data = explode("/", $file);
        $realfilesName [] = $data[2];
    }
    return $realfilesName;

});


