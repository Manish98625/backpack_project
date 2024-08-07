<?php

use Illuminate\Support\Facades\Route;

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix' => config('backpack.base.route_prefix', 'admin'),
    'middleware' => array_merge(
        (array) config('backpack.base.web_middleware', 'web'),
        (array) config('backpack.base.middleware_key', 'admin')
    ),
    'namespace' => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
    Route::crud('user', 'UserCrudController');

});

Route::group([
// this should be the absolute last line of this file
    'prefix' => config('backpack.base.route_prefix', 'admin'),
    'middleware' => array_merge(
        (array) config('backpack.base.web_middleware', 'web'),
        (array) config('backpack.base.middleware_key', 'admin')
    ),
    'namespace' => 'App\Http\Controllers',
], function () { // custom admin routes
    Route::crud('student', 'StudentCrudController');
    Route::crud('gender', 'GenderCrudController');
    Route::crud('skill', 'SkillCrudController');
    Route::crud('articles', 'ArticlesCrudController');
    Route::crud('blog', 'BlogCrudController');
    Route::crud('district', 'DistrictCrudController');
    Route::crud('cities', 'CitiesCrudController');
    Route::crud('categories', 'CategoriesCrudController');
    Route::crud('state', 'StateCrudController');
    Route::crud('appsetting', 'AppsettingCrudController');
}); // this should be the absolute last line of this file