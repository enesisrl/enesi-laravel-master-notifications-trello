<?php

use Illuminate\Support\Facades\Route;

Route::any('/trello/token', [\Front\Main\Controllers\TrelloController::class, 'authorize'])->name('trello.token');
Route::any('/trello/auth', [\Front\Main\Controllers\TrelloController::class, 'auth'])->name('trello.auth');
