<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\VoteController;
use App\Http\Controllers\Admin\CandidateController;

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
    return view('welcome');
});

Auth::routes();
Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('votes', [VoteController::class, 'index']);
    Route::get('votes/list', [VoteController::class, 'getVote'])->name('votes.list');
    Route::get('/candidates/{vote_id}', [VoteController::class, 'candidates'])->name('candidates');

    Route::get('/vote/add', [VoteController::class, 'new']);
    Route::post('/vote/add', [VoteController::class, 'addvote'])->name('newvote');
    Route::get('/vote/delete/{id}', [VoteController::class, 'deletevote']);
    Route::get('/vote/edit/{id}', [VoteController::class, 'editvote']);
    Route::post('/vote/edit', [VoteController::class, 'addeditvote'])->name('editvote');

    Route::get('/candidate/delete/{id}', [CandidateController::class, 'deletecandidate']);
    Route::get('/candidate/edit/{id}', [CandidateController::class, 'editcandidate']);
    Route::post('/candidate/edit', [CandidateController::class, 'addeditcandidate'])->name('editcandidate');
    Route::get('/candidate/add/{vote_id}', [CandidateController::class, 'add']);
    Route::post('/candidate/add', [CandidateController::class, 'addcandidate'])->name('newcandidate');
});
