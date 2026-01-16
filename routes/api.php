<?php

use App\Http\Controllers\Api\ChatbotController;
use App\Http\Controllers\Web\ApiController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Public API Routes
Route::get('/posts/last-update', [ApiController::class, 'lastPostUpdate'])->name('api.posts.last-update');
Route::get('/tags/suggestions', [ApiController::class, 'tagSuggestions'])->name('api.tags.suggestions');
Route::get('/search', [ApiController::class, 'search'])->name('api.search');

// Chatbot API
Route::post('/chatbot', [ChatbotController::class, 'chat'])->name('api.chatbot.chat');
