<?php

use Illuminate\Support\Facades\Route;
use Inveteratus\Neon\Controllers\LoginController;
use Inveteratus\Neon\Controllers\LogoutController;
use Inveteratus\Neon\Controllers\PasswordRecoveryController;
use Inveteratus\Neon\Controllers\PasswordResetController;
use Inveteratus\Neon\Controllers\RegisterController;
use Inveteratus\Neon\Controllers\VerifyPasswordController;

Route::middleware('guest')->group(function () {
    Route::prefix('login')->group(function () {
        Route::view('', 'neon::login')->name('login');
        Route::post('', LoginController::class);
    });
    Route::prefix('register')->group(function () {
        Route::view('', 'neon::register')->name('register');
        Route::post('', RegisterController::class);
    });
    Route::prefix('password')->group(function () {
        Route::prefix('recover')->group(function () {
            Route::view('', 'neon::password.recover')->name('password.recover');
            Route::post('', PasswordRecoveryController::class);
        });
        Route::prefix('reset')->group(function () {
            Route::view('{token}', 'neon::password.reset')->name('password.reset');
            Route::post('', PasswordResetController::class)->name('password.reset.store');
        });
    });
});

Route::middleware('auth')->group(function () {
    Route::post('logout', LogoutController::class)->name('logout');
    Route::prefix('verify')->group(function () {
        Route::prefix('password')->group(function () {
            Route::view('', 'neon::verify.password')->name('password.confirm');
            Route::post('', VerifyPasswordController::class);
        });
    });
});
