<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentairesController;
use App\Http\Controllers\CoursCatController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InstructeurController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\coursController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\StudentsController;
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


Route::get('/', [HomeController::class,'index']);
Route::get('/search', [SearchController::class,'index']);
Route::post('/commentaires/store', [HomeController::class,'store'])->name('FrontStudent.commentaires.store');
Route::get('/commentaires/edit/{id}', [HomeController::class,'edit'])->name('FrontStudent.commentaires.edit');
Route::put('/commentaires/update/{id}', [HomeController::class,'update'])->name('FrontStudent.commentaires.update');
Route::get('/commentaires/create/', [HomeController::class,'create'])->name('FrontStudent.commentaires.create');
Route::get('/commentaires/destroy/{id}', [HomeController::class,'destroy'])->name('FrontStudent.commentaires.destroy');
Route::post('/message/enroll', [MessageController::class,'enroll'])->name('message.enroll');
Route::get('/cours', [CoursCatController::class,'index'])->name('cours');
Route::get('/category/{id}', [CoursCatController::class,'coursCat'])->name('coursCat');
Route::get('/category/{id}/cour/{c_id}', [CoursCatController::class,'show'])->name('cour.show');
//Route::get('/category/{id}/cour/{c_id}', [HomeController::class,'show'])->name('cour.show');


Route::prefix('/dashboard')->group(function(){Route::get('/login', [AuthController::class,'login'])->name('admin.login');
Route::post('/login', [AuthController::class,'doLogin'])->name('admin.doLogin');

Route::middleware('adminAuth:admin')->group(function(){
Route::get('/', [AdminController::class,'index'])->name('index');
Route::get('/logout', [AuthController::class,'logout'])->name('admin.logout');
Route::get('/categories', [CategoryController::class,'index'])->name('admin.categories.index');
Route::get('/categories/create', [CategoryController::class,'create'])->name('admin.categories.create');
Route::post('/categories/store', [CategoryController::class,'store'])->name('admin.categories.store');
Route::get('/categories/edit/{id}', [CategoryController::class,'edit'])->name('admin.categories.edit');
Route::put('/categories/update/{id}', [CategoryController::class,'update'])->name('admin.categories.update');
Route::get('/categories/destroy/{id}', [CategoryController::class,'destroy'])->name('admin.categories.destroy');

Route::get('/instructeurs', [InstructeurController::class,'index'])->name('admin.instructeurs.index');
Route::get('/instructeurs/create', [InstructeurController::class,'create'])->name('admin.instructeurs.create');
Route::post('/instructeurs/store', [InstructeurController::class,'store'])->name('admin.instructeurs.store');
Route::get('/instructeurs/edit/{id}', [InstructeurController::class,'edit'])->name('admin.instructeurs.edit');
Route::put('/instructeurs/update/{id}', [InstructeurController::class,'update'])->name('admin.instructeurs.update');
Route::get('/instructeurs/destroy/{id}', [InstructeurController::class,'destroy'])->name('admin.instructeurs.destroy');

Route::get('/cours', [CoursController::class,'index'])->name('admin.cours.index');
Route::get('/cours/create', [CoursController::class,'create'])->name('admin.cours.create');
Route::post('/cours/store', [CoursController::class,'store'])->name('admin.cours.store');
Route::get('/cours/edit/{id}', [CoursController::class,'edit'])->name('admin.cours.edit');
Route::put('/cours/update/{id}', [CoursController::class,'update'])->name('admin.cours.update');
Route::get('/cours/destroy/{id}', [CoursController::class,'destroy'])->name('admin.cours.destroy');

Route::get('/students', [StudentsController::class,'index'])->name('admin.students.index');
Route::get('/students/create', [studentsController::class,'create'])->name('admin.students.create');
Route::post('/students/store', [studentsController::class,'store'])->name('admin.students.store');
Route::get('/students/edit/{id}', [studentsController::class,'edit'])->name('admin.students.edit');
Route::put('/students/update/{id}', [studentsController::class,'update'])->name('admin.students.update');
Route::get('/students/destroy/{id}', [studentsController::class,'destroy'])->name('admin.students.destroy');
Route::get('/students/showCours/{id}', [studentsController::class,'showCours'])->name('admin.students.showCours');
Route::get('/students/{id}/cours/{c_id}/approve', [studentsController::class,'approveCour'])->name('admin.students.approveCour');
Route::get('/students/{id}/cours/{c_id}/reject', [studentsController::class,'rejectCour'])->name('admin.students.rejectCour');
Route::get('/students/{id}/add-to-cour', [studentsController::class,'addCour'])->name('admin.students.addtCour');
Route::post('/students/{id}/add-to-cour', [studentsController::class,'storeCour'])->name('admin.students.storeCour');

Route::get('/commentaires', [CommentairesController::class,'index'])->name('admin.commentaires.index');

Route::get('/commentaires/destroy/{id}', [CommentairesController::class,'destroy'])->name('admin.commentaires.destroy');
});

});

