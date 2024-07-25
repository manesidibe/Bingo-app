<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CampaignController;

// Routes d'authentification
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


// Routes de campagnes et tableau de bord
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [CampaignController::class, 'index'])->name('dashboard');
    Route::get('/campaigns/create', [CampaignController::class, 'create'])->name('campaigns.create');
    Route::post('/campaigns/store', [CampaignController::class, 'store'])->name('campaigns.store');
    Route::get('/campaigns', [CampaignController::class, 'index'])->name('campaigns.index');
    Route::get('/campaigns/{id}/edit', [CampaignController::class, 'edit'])->name('campaigns.edit');
    Route::put('/campaigns/{id}', [CampaignController::class, 'update'])->name('campaigns.update');
    Route::post('/campaigns/{id}/archive', [CampaignController::class, 'archive'])->name('campaigns.archive');
    Route::get('/campaigns/archived', [CampaignController::class, 'archivedCampaigns'])->name('campaigns.archived');
    Route::put('/campaigns/{campaign}/restore', [CampaignController::class, 'restore'])->name('campaigns.restore');

});

// Route par défaut (redirection vers la page de login)
Route::redirect('/', '/login');
