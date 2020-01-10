<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

Route::middleware(['auth'])->group(function () {

});
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


// law Rotes القوانين والمواد
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

// judgments routes  الاحكام

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


    // Al Kuwait Alyoum Routes الكويت اليوم
    Route::get('KuwaitAlyoum', 'KuwaiTodayController@index')->name('KuwaitAlyoum');
    Route::get('KuwaitAlyoum-list', 'KuwaiTodayController@KuwaitAlyoumList')->name('KuwaitAlyoumList');
    Route::get('/KuwaitAlyoum/create/{lastVersion?}', 'KuwaiTodayController@create')->name('addVersion');
    Route::post('/KuwaitAlyoum/store', 'KuwaiTodayController@store')->name('saveVersion');
    Route::get('/KuwaitAlyoum/{lastVersion}/updateLastInput', 'KuwaiTodayController@updateLastInput')->name('updateLastVersion');
    Route::patch('/KuwaitAlyoum/{lastVersion}/saveLastInput', 'KuwaiTodayController@saveLastInput')->name('saveLastVersion');
    Route::get('/KuwaitAlyoum/{version}/show', 'KuwaiTodayController@show')->name('showVersion');

    // Al Kuwait Alyoum announcements  الاعلانات
    Route::get('KuwaitAlyoum/{versionID}/Announcements/addAnnouncement', 'AlKuwaitAlyoum\AnnouncementsController@create')->name('add_Announcement');
    Route::post('KuwaitAlyoum/{versionID}/Announcements/saveAnnouncement', 'AlKuwaitAlyoum\AnnouncementsController@store')->name('save_Announcement');
    Route::get('KuwaitAlyoum/Announcements/{Announcement}/edit', 'AlKuwaitAlyoum\AnnouncementsController@edit')->name('edit_Announcement');
    Route::patch('KuwaitAlyoum/Announcements/{Announcement}/update', 'AlKuwaitAlyoum\AnnouncementsController@update')->name('update_Announcement');
    Route::delete('KuwaitAlyoum/Announcements/{Announcement}/delete', 'AlKuwaitAlyoum\AnnouncementsController@update')->name('delete_Announcement');

    // Al Kuwait Alyoum  penal Provision Penalprovision الاحكام الجزائية
    Route::get('KuwaitAlyoum/{versionID}/Penalprovisions/addProvision', 'AlKuwaitAlyoum\PenalprovisionController@create')->name('add_Provision');
    Route::post('KuwaitAlyoum/{versionID}/Penalprovisions/saveProvision', 'AlKuwaitAlyoum\PenalprovisionController@store')->name('save_Provision');
    Route::get('KuwaitAlyoum/Penalprovision/{provision}/edit', 'AlKuwaitAlyoum\PenalprovisionController@edit')->name('edit_Provision');
    Route::patch('KuwaitAlyoum/Penalprovision/{provision}/update', 'AlKuwaitAlyoum\PenalprovisionController@update')->name('update_Provision');
    Route::delete('KuwaitAlyoum/Penalprovision/{provision}/delete', 'AlKuwaitAlyoum\PenalprovisionController@delete')->name('delete_Provision');

    // Al Kuwait Alyoum  Directives  Directive التعليمات
    Route::get('KuwaitAlyoum/{versionID}/Directives/addDirective', 'AlKuwaitAlyoum\DirectivesController@create')->name('add_Directive');
    Route::post('KuwaitAlyoum/{versionID}/Directives/saveDirective', 'AlKuwaitAlyoum\DirectivesController@store')->name('save_Directive');
    Route::get('KuwaitAlyoum/Directives/{directive}/edit', 'AlKuwaitAlyoum\DirectivesController@edit')->name('edit_Directive');
    Route::patch('KuwaitAlyoum/Directives/{directive}/update', 'AlKuwaitAlyoum\DirectivesController@update')->name('update_Directive');
    Route::delete('KuwaitAlyoum/Directives/{directive}/delete', 'AlKuwaitAlyoum\DirectivesController@delete')->name('delete_Directive');

    // Al Kuwait Alyoum  Directives  Directive المراسيم
    Route::get('KuwaitAlyoum/{versionID}/Decrees/addDecree', 'AlKuwaitAlyoum\DecreeController@create')->name('add_Decree');
    Route::post('KuwaitAlyoum/{versionID}/Decrees/saveDecree', 'AlKuwaitAlyoum\DecreeController@store')->name('save_Decree');
    Route::get('KuwaitAlyoum/Decrees/{decree}/edit', 'AlKuwaitAlyoum\DecreeController@edit')->name('edit_Decree');
    Route::patch('KuwaitAlyoum/Decrees/{decree}/update', 'AlKuwaitAlyoum\DecreeController@update')->name('update_Decree');
    Route::delete('KuwaitAlyoum/Decrees/{decree}/delete', 'AlKuwaitAlyoum\DecreeController@delete')->name('delete_Decree');

    // Al Kuwait Alyoum  Notice  Notice التنويهات
    Route::get('KuwaitAlyoum/{versionID}/Notices/addNotice', 'AlKuwaitAlyoum\NoticeController@create')->name('add_Notice');
    Route::post('KuwaitAlyoum/{versionID}/Notices/saveNotice', 'AlKuwaitAlyoum\NoticeController@store')->name('save_Notice');
    Route::get('KuwaitAlyoum/Notices/{notice}/edit', 'AlKuwaitAlyoum\NoticeController@edit')
        ->name('edit_Notice');
    Route::patch('KuwaitAlyoum/Notices/{notice}/update', 'AlKuwaitAlyoum\NoticeController@update')->name('update_Notice');
    Route::delete('KuwaitAlyoum/Notices/{notice}/delete', 'AlKuwaitAlyoum\NoticeController@delete')->name('delete_Notice');

    // Al Kuwait Alyoum  Decisions  decision القرارات
    Route::get('KuwaitAlyoum/{versionID}/Decisions/addDecision', 'AlKuwaitAlyoum\DecisionController@create')->name('add_Decision');
    Route::post('KuwaitAlyoum/{versionID}/Decisions/saveDecision', 'AlKuwaitAlyoum\DecisionController@store')->name('save_Decision');
    Route::get('KuwaitAlyoum/Decisions/{decision}/edit', 'AlKuwaitAlyoum\DecisionController@edit')
        ->name('edit_Decision');
    Route::patch('KuwaitAlyoum/Decisions/{decision}/update', 'AlKuwaitAlyoum\DecisionController@update')->name('update_Decision');
    Route::delete('KuwaitAlyoum/Decisions/{decision}/delete', 'AlKuwaitAlyoum\DecisionController@delete')->name('delete_Decision');

    // Al Kuwait Alyoum  meeting record محضر إجتماع MeetingRecordController
    Route::get('KuwaitAlyoum/{versionID}/MeetingRecord/addmeetingRecord', 'AlKuwaitAlyoum\MeetingRecordController@create')->name('add_meetingRecord');
    Route::post('KuwaitAlyoum/{versionID}/MeetingRecord/savemeetingRecord', 'AlKuwaitAlyoum\MeetingRecordController@store')->name('save_meetingRecord');
    Route::get('KuwaitAlyoum/MeetingRecord/{meetingRecord}/edit', 'AlKuwaitAlyoum\MeetingRecordController@edit')
        ->name('edit_meetingRecord');
    Route::patch('KuwaitAlyoum/MeetingRecord/{meetingRecord}/update', 'AlKuwaitAlyoum\MeetingRecordController@update')->name('update_meetingRecord');
    Route::delete('KuwaitAlyoum/MeetingRecord/{meetingRecord}/delete', 'AlKuwaitAlyoum\MeetingRecordController@delete')->name('delete_meetingRecord');


});



