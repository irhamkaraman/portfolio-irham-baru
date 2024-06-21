<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ResumeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/storage-link', function () {
    $targetFolder = base_path() . '/storage/app/public';
    $linkFolder =  $_SERVER['DOCUMENT_ROOT'] . '/storage';

    if (!file_exists($linkFolder)) {
        symlink($targetFolder, $linkFolder);
        return redirect()->back()->with('success', 'Penyimpanan di server sudah diaktifkan!');
    } else {
        return redirect()->back()->with('error', 'Penyimpanan di server telah tersedia!');
    }
})->name('storage-link');

Route::get('/', [Controller::class, 'index'])->name('home');
Route::get('auth', [LoginController::class, 'auth'])->name('login');
Route::post('auth/login', [LoginController::class, 'login'])->name('login.submit');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

Route::group(['middleware' => 'auth'], function () {

    Route::prefix('dashboard')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    });

    Route::prefix('/about')->group(function () {
        Route::get('/', [AboutController::class, 'index'])->name('about');
        Route::put('/update', [AboutController::class, 'aboutUpdate'])->name('about.update');
        Route::get('/services', [AboutController::class, 'services'])->name('services');
        Route::get('/services/edit/{id}', [AboutController::class, 'serviceEdit'])->name('services.edit');
        Route::put('/services/update/{id}', [AboutController::class, 'serviceUpdate'])->name('services.update');

        Route::get('/team', [AboutController::class, 'team'])->name('team');
        Route::put('/team/update/{id}', [AboutController::class, 'teamUpdate'])->name('team.update');
        Route::get('/team/add', [AboutController::class, 'teamAdd'])->name('team.add');
        Route::post('/team/store', [AboutController::class, 'teamStore'])->name('team.store');
        Route::post('/team/delete/{id}', [AboutController::class, 'teamDelete'])->name('team.delete');
        Route::get('/team/edit/{id}', [AboutController::class, 'teamEdit'])->name('team.edit');

        Route::get('/tech-images', [AboutController::class, 'techImages'])->name('tech-images');
        Route::get('/tech-images/add', [AboutController::class, 'techImagesAdd'])->name('tech-images.add');
        Route::post('/tech-images/store', [AboutController::class, 'techImagesStore'])->name('tech-images.store');
        Route::post('/tech-images/delete/{id}', [AboutController::class, 'techImagesDelete'])->name('tech-images.delete');
    });

    Route::prefix('/resume')->group(function () {
        Route::get('/education', [ResumeController::class, 'education'])->name('education');
        Route::get('/education/add', [ResumeController::class, 'educationAdd'])->name('education.add');
        Route::post('/education/store', [ResumeController::class, 'educationStore'])->name('education.store');
        Route::get('/education/edit/{id}', [ResumeController::class, 'educationEdit'])->name('education.edit');
        Route::put('/education/update/{id}', [ResumeController::class, 'educationUpdate'])->name('education.update');
        Route::post('/education/delete/{id}', [ResumeController::class, 'educationDelete'])->name('education.delete');

        Route::get('/experience', [ResumeController::class, 'experience'])->name('experience');
        Route::get('/experience/add', [ResumeController::class, 'experienceAdd'])->name('experience.add');
        Route::post('/experience/store', [ResumeController::class, 'experienceStore'])->name('experience.store');
        Route::get('/experience/edit/{id}', [ResumeController::class, 'experienceEdit'])->name('experience.edit');
        Route::put('/experience/update/{id}', [ResumeController::class, 'experienceUpdate'])->name('experience.update');
        Route::post('/experience/delete/{id}', [ResumeController::class, 'experienceDelete'])->name('experience.delete');

        Route::get('/skills', [ResumeController::class, 'skills'])->name('skills');
        Route::get('/skills/add', [ResumeController::class, 'skillsAdd'])->name('skills.add');
        Route::post('/skills/store', [ResumeController::class, 'skillsStore'])->name('skills.store');
        Route::get('/skills/edit/{id}', [ResumeController::class, 'skillsEdit'])->name('skills.edit');
        Route::put('/skills/update/{id}', [ResumeController::class, 'skillsUpdate'])->name('skills.update');
        Route::post('/skills/delete/{id}', [ResumeController::class, 'skillsDelete'])->name('skills.delete');
    });

    Route::prefix('/portfolio')->group(function () {
        Route::get('/', [PortfolioController::class, 'index'])->name('portfolio');
        Route::get('/add', [PortfolioController::class, 'add'])->name('portfolio.add');
        Route::get('/edit/{id}', [PortfolioController::class, 'edit'])->name('portfolio.edit');
        Route::post('/store', [PortfolioController::class, 'store'])->name('portfolio.store');
        Route::put('/update/{id}', [PortfolioController::class, 'update'])->name('portfolio.update');
        Route::post('/delete/{id}', [PortfolioController::class, 'delete'])->name('portfolio.delete');

        Route::get('/kategori', [PortfolioController::class, 'category'])->name('category');
        Route::get('/kategori/add', [PortfolioController::class, 'categoryAdd'])->name('category.add');
        Route::post('/kategori/store', [PortfolioController::class, 'categoryStore'])->name('category.store');
        Route::get('/kategori/edit/{id}', [PortfolioController::class, 'categoryEdit'])->name('category.edit');
        Route::put('/kategori/update/{id}', [PortfolioController::class, 'categoryUpdate'])->name('category.update');
        Route::post('/kategori/delete/{id}', [PortfolioController::class, 'categoryDelete'])->name('category.delete');
    });

    Route::prefix('/blog')->group(function () {
        Route::get('/', [BlogController::class, 'index'])->name('blog');
        Route::get('/add', [BlogController::class, 'add'])->name('blog.add');
        Route::get('/edit/{id}', [BlogController::class, 'edit'])->name('blog.edit');
        Route::post('/store', [BlogController::class, 'store'])->name('blog.store');
        Route::put('/update/{id}', [BlogController::class, 'update'])->name('blog.update');
        Route::post('/delete/{id}', [BlogController::class, 'delete'])->name('blog.delete');
    });

    Route::prefix('/contact')->group( function () {
       Route::get('/', [ContactController::class, 'index'])->name('contact');
       Route::post('/store', [ContactController::class, 'store'])->name('contact.store');
       Route::post('/delete/{id}', [ContactController::class, 'delete'])->name('contact.delete');
    });

});
