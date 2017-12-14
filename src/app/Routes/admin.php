<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['prefix'=>'admin'], function(){
    
    // Módulo de Proyectos
    Route::get('project-dashboard', 'CustomAdminController@getIndex');
    Route::get('projects', 'CustomAdminController@allProjects');
    Route::get('project/{id}/{subpage?}', 'CustomAdminController@findProject');
    Route::get('project-task/{id}', 'CustomAdminController@findProjectTask');
    Route::get('project-issue/{id}', 'CustomAdminController@findProjecIssue');
    Route::get('wikis/{category?}', 'CustomAdminController@allWikis');
    Route::get('wiki/{id}', 'CustomAdminController@findWiki');

    // Módulo de Reportes
    //Route::get('project-report', 'ReportController@getProjectReport');

});