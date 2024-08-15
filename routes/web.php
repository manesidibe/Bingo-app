<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CampaignController;
use App\Http\Controllers\PrizeController;
// Routes d'authentification
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


// Routes de campagnes et tableau de bord
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [CampaignController::class, 'index'])->name('dashboard');
    Route::get('/template', [CampaignController::class, 'template'])->name('template');
    Route::get('/campaigns/create', [CampaignController::class, 'create'])->name('campaigns.create');
    Route::post('/campaigns/store', [CampaignController::class, 'store'])->name('campaigns.store');
    Route::get('/campaigns', [CampaignController::class, 'index'])->name('campaigns.index');
    Route::get('/campaigns/{id}/edit', [CampaignController::class, 'edit'])->name('campaigns.edit');
    Route::put('/campaigns/{id}', [CampaignController::class, 'update'])->name('campaigns.update');
    Route::post('/campaigns/{id}/archive', [CampaignController::class, 'archive'])->name('campaigns.archive');
    Route::get('/campaigns/archived', [CampaignController::class, 'archivedCampaigns'])->name('campaigns.archived');
    Route::put('/campaigns/{id}/restore', [CampaignController::class, 'restore'])->name('campaigns.restore');
    Route::get('/prizes', [PrizeController::class, 'index'])->name('prizes.index');
    Route::get('/prizes/create', [PrizeController::class, 'create'])->name('prizes.create');
    Route::post('/prizes', [PrizeController::class, 'store'])->name('prizes.store');
    // Route pour afficher les prix archivés
    Route::get('/prizes/archived', [PrizeController::class, 'archivedPrizes'])->name('prizes.archived');
    Route::put('/prizes/{id}/restore', [PrizeController::class, 'restore'])->name('prizes.restore');
    Route::post('/prizes/{id}/archive', [PrizeController::class, 'archive'])->name('prizes.archive');
    Route::get('/prizes/{id}/edit', [PrizeController::class, 'edit'])->name('prizes.edit');
    Route::put('/prizes/{id}', [PrizeController::class, 'update'])->name('prizes.update');


});

// Route par défaut (redirection vers la page de login)
Route::redirect('/', '/login');
