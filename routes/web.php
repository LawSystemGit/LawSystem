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
    Route::get('/laws/create/{lastLaw?}', 'LawsController@create')->name('addNewLaw');
    Route::post('/laws/store', 'LawsController@store')->name('saveLaw');
    Route::get('/laws/{law}/showlaw', 'LawsController@show')->name('showlaw');
    Route::get('/laws/{lawID}/edit', 'LawsController@edit')->name('editLaw');
    Route::get('/laws/{lastLaw}/editLastLaw', 'LawsController@updateLastLaw')->name('updateLastLaw');
    Route::patch('/laws/{lastLaw}/saveLastLaw', 'LawsController@saveLastLaw')->name('saveLastLaw');
    Route::patch('/laws/{lawID}/lawUpdate', 'LawsController@update')->name('updateLaw');
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

    // Al Kuwait Alyoum announcements
    Route::get('KuwaitAlyoum/{versionID}/Announcements/addAnnouncement', 'AnnouncementsController@create')->name('add_Announcement');
    Route::post('KuwaitAlyoum/{versionID}/Announcements/saveAnnouncement', 'AnnouncementsController@store')->name('save_Announcement');
    Route::get('KuwaitAlyoum/Announcements/{Announcement}/edit', 'AnnouncementsController@edit')->name('edit_Announcement');
    Route::patch('KuwaitAlyoum/Announcements/{Announcement}/update', 'AnnouncementsController@update')->name('update_Announcement');
    Route::delete('KuwaitAlyoum/Announcements/{Announcement}/delete', 'AnnouncementsController@update')->name('delete_Announcement');

    // Al Kuwait Alyoum  penal Provision Penalprovision
    Route::get('KuwaitAlyoum/{versionID}/Penalprovisions/addProvision', 'PenalprovisionController@create')->name('add_Provision');
    Route::post('KuwaitAlyoum/{versionID}/Penalprovisions/saveProvision', 'PenalprovisionController@store')->name('save_Provision');
    Route::get('KuwaitAlyoum/Penalprovision/{provision}/edit', 'PenalprovisionController@edit')->name('edit_Provision');
    Route::patch('KuwaitAlyoum/Penalprovision/{provision}/update', 'PenalprovisionController@update')->name('update_Provision');
    Route::delete('KuwaitAlyoum/Penalprovision/{provision}/delete', 'PenalprovisionController@delete')->name('delete_Provision');

    // Al Kuwait Alyoum  Directives  Directive
    Route::get('KuwaitAlyoum/{versionID}/Directives/addDirective', 'DirectivesController@create')->name('add_Directive');
    Route::post('KuwaitAlyoum/{versionID}/Directives/saveDirective', 'DirectivesController@store')->name('save_Directive');
    Route::get('KuwaitAlyoum/Directives/{directive}/edit', 'DirectivesController@edit')->name('edit_Directive');
    Route::patch('KuwaitAlyoum/Directives/{directive}/update', 'DirectivesController@update')->name('update_Directive');
    Route::delete('KuwaitAlyoum/Directives/{directive}/delete', 'DirectivesController@delete')->name('delete_Directive');

    //





});



