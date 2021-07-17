<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\GraduateSchoolController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\MatrixController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\ResearcherProfileController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\testing;
use App\Http\Controllers\ThesisGeneratorController;
use App\Http\Controllers\ThesisResearchController;
use App\Http\Controllers\ThesisTemplateController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\UniversityController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

Route::group(['prefix' => 'auth'], function () {
    Route::post('/login', [AuthController::class, 'authenticate']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/check', [AuthController::class, 'check']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::get('/activate/{token}', [AuthController::class, 'activate']);
    Route::post('/password', [AuthController::class, 'password']);
    Route::post('/validate-password-reset', [AuthController::class, 'validatePasswordReset']);
    Route::post('/reset', [AuthController::class, 'reset']);
    Route::post('/social/token', 'SocialAuthController@getToken');

});

Route::group(['middleware' => ['jwt.auth']], function () {

    Route::get('/auth/user', [AuthController::class, 'getAuthUser']);

});

// Types CRUD
Route::get('/matrix', [MatrixController::class, 'generate']);
Route::get('/matrix2', [MatrixController2::class, 'generate']);
// Route::post('/types', 'MatrixController@store');
// Route::put('/types/{id}', 'MatrixController@update');
// Route::delete('/types/{id}', 'MatrixController@destroy');
// Route::get('/types/{id}', 'MatrixController@retrieveOne');

// Types CRUD
Route::get('/users', [UserController::class, 'index']);
Route::post('/users', [UserController::class, 'store']);
Route::put('/users/{id}', [UserController::class, 'update']);
Route::delete('/users/{id}', [UserController::class, 'destroy']);
Route::get('/users/{id}', [UserController::class, 'retrieveOne']);

// Countries CRUD
Route::get('/countries', [CountryController::class, 'index']);
Route::get('/countries/{id}', [CountryController::class, 'show']);
Route::post('/countries', [CountryController::class, 'store']);
Route::put('/countries/{id}', [CountryController::class, 'update']);
Route::delete('/countries/{id}', [CountryController::class, 'destroy']);
// Region CRUD
Route::get('/regions', [RegionController::class, 'index']);
Route::get('/regions/{id}', [RegionController::class, 'show']);
Route::post('/regions', [RegionController::class, 'store']);
Route::put('/regions/{id}', [RegionController::class, 'update']);
Route::delete('/regions/{id}', [RegionController::class, 'destroy']);
// Level CRUD
Route::get('/levels', [LevelController::class, 'index']);
Route::get('/levels/{id}', [LevelController::class, 'show']);
Route::post('/levels', [LevelController::class, 'store']);
Route::put('/levels/{id}', [LevelController::class, 'update']);
Route::delete('/levels/{id}', [LevelController::class, 'destroy']);
// University CRUD
Route::get('/universities', [UniversityController::class, 'index']);
Route::get('/universities/{id}', [UniversityController::class, 'show']);
Route::post('/universities', [UniversityController::class, 'store']);
Route::put('/universities/{id}', [UniversityController::class, 'update']);
Route::delete('/universities/{id}', [UniversityController::class, 'destroy']);
// Faculty CRUD
Route::get('/faculties', [FacultyController::class, 'index']);
Route::get('/faculties/{id}', [FacultyController::class, 'show']);
Route::post('/faculties', [FacultyController::class, 'store']);
Route::put('/faculties/{id}', [FacultyController::class, 'update']);
Route::delete('/faculties/{id}', [FacultyController::class, 'destroy']);
// GraduateSchool CRUD
Route::get('/graduate-schools', [GraduateSchoolController::class, 'index']);
Route::get('/graduate-schools/{id}', [GraduateSchoolController::class, 'show']);
Route::post('/graduate-schools', [GraduateSchoolController::class, 'store']);
Route::put('/graduate-schools/{id}', [GraduateSchoolController::class, 'update']);
Route::delete('/graduate-schools/{id}', [GraduateSchoolController::class, 'destroy']);
// Profiles CRUD
Route::get('/profiles', [ProfileController::class, 'index']);
Route::get('/profiles/{id}', [ProfileController::class, 'show']);
Route::post('/profiles', [ProfileController::class, 'store']);
Route::put('/profiles/{id}', [ProfileController::class, 'update']);
Route::delete('/profiles/{id}', [ProfileController::class, 'destroy']);
// Profiles CRUD
Route::get('/researcher-profiles', [ResearcherProfileController::class, 'index']);
Route::get('/researcher-profiles/{id}', [ResearcherProfileController::class, 'show']);
Route::post('/researcher-profiles', [ResearcherProfileController::class, 'store']);
Route::put('/researcher-profiles/{id}', [ResearcherProfileController::class, 'update']);
Route::delete('/researcher-profiles/{id}', [ResearcherProfileController::class, 'destroy']);
// Schools CRUD
Route::get('/schools', [SchoolController::class, 'index']);
Route::get('/schools/{id}', [SchoolController::class, 'show']);
Route::post('/schools', [SchoolController::class, 'store']);
Route::put('/schools/{id}', [SchoolController::class, 'update']);
Route::delete('/schools/{id}', [SchoolController::class, 'destroy']);
// Projects CRUD
Route::get('/projects', [ProjectController::class, 'index']);
Route::get('/projects/{id}', [ProjectController::class, 'show']);
Route::post('/projects', [ProjectController::class, 'store']);
Route::put('/projects/{id}', [ProjectController::class, 'update']);
Route::delete('/projects/{id}', [ProjectController::class, 'destroy']);
Route::get('/project/get', [ProjectController::class, 'getProject']);
Route::post('/project/config-status', [ProjectController::class, 'updateConfigStatus']);

// Types CRUD
Route::get('/types', [TypeController::class, 'index']);
Route::get('/types/{id}', [TypeController::class, 'show']);
Route::post('/types', [TypeController::class, 'store']);
Route::put('/types/{id}', [TypeController::class, 'update']);
Route::delete('/types/{id}', [TypeController::class, 'destroy']);

//USERS
Route::get('/user', 'UserController@index');
Route::post('/user/change-password', 'AuthController@changePassword');
Route::post('/user/update-profile', 'UserController@updateProfile');
Route::post('/user/update-avatar', 'UserController@updateAvatar');
Route::post('/user/remove-avatar', 'UserController@removeAvatar');
Route::delete('/user/{id}', 'UserController@destroy');
Route::get('/user/dashboard', 'UserController@dashboard');

//otros

Route::get('/researcher-profile/get-countries', [ResearcherProfileController::class, 'getCountries']);

Route::get('/thesis-template', [ThesisTemplateController::class, 'getTemplate']);
Route::get('/thesis-template/styles', [ThesisTemplateController::class, 'getStyles']);
Route::get('/thesis-template/all', [ThesisTemplateController::class, 'index']);
Route::get('/thesis-template/cover-page', [ThesisTemplateController::class, 'getCoverPage']);

Route::post('/project/thesis-research', [ThesisResearchController::class, 'store']);
Route::post('/project/thesis-research/update', [ThesisResearchController::class, 'update']);
Route::get('/project/thesis-research/variables-types', [ThesisResearchController::class, 'getTypesOfResearchVariables']);
Route::get('/project/thesis-research/get', [ThesisResearchController::class, 'getResearch']);

Route::post('/word', [ThesisGeneratorController::class, 'generateThesis']);
Route::get('/test', [testing::class, 'generate']);
