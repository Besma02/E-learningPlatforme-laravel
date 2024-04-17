<?php

use App\Http\Controllers\AdminControllerApi;
use App\Http\Controllers\AuthControllerApi;
use App\Http\Controllers\CategoryControllerApi;
use App\Http\Controllers\CommentairesControllerApi;
use App\Http\Controllers\CoursCatControllerApi;
use App\Http\Controllers\CoursControllerApi;
use App\Http\Controllers\HomeControllerApi;
use App\Http\Controllers\InstructeurControllerApi;
use App\Http\Controllers\MessageControllerApi;
use App\Http\Controllers\SearchControllerApi;
use App\Http\Controllers\StudentsControllerApi;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('register', [AuthControllerApi::class, 'store'])->name('auth-api.store');
Route::post('/login', [AuthControllerApi::class,'doLogin'])->name('auth-api.doLogin');
Route::get('/logout', [AuthControllerApi::class,'logout'])->name('auth-api.logout');


Route::middleware('auth:sanctum')->get('/commentaires', [HomeControllerApi::class,'index']);
Route::middleware('auth:sanctum')->get('/search/', [SearchControllerApi::class,'index']);
Route::middleware('auth:sanctum')->post('/commentaires/store', [HomeControllerApi::class,'store'])->name('FrontStudent.commentaires-api.store');
Route::middleware('auth:sanctum')->put('/commentaires/update/{id}', [HomeControllerApi::class,'update'])->name('FrontStudent.commentaires-api.update');
Route::middleware('auth:sanctum')->get('/commentaires/destroy/{id}', [HomeControllerApi::class,'destroy'])->name('FrontStudent.commentaires-api.destroy');
Route::middleware('auth:sanctum')->post('/message/enroll', [MessageControllerApi::class,'enroll'])->name('message-api.enroll');
Route::middleware('auth:sanctum')->get('/category/{id}', [CoursCatControllerApi::class,'coursCat'])->name('coursCat-api');
Route::middleware('auth:sanctum')->get('/category/{id}/cour/{c_id}', [CoursCatControllerApi::class,'show'])->name('cour.show-api');
Route::prefix('/dashboard')->group(function(){
Route::middleware('role:admin')->group(function(){
Route::middleware('auth:sanctum')->get('/categories', [CategoryControllerApi::class,'index'])->name('admin.categories-api.index');
Route::middleware('auth:sanctum')->post('/categories/store', [CategoryControllerApi::class,'store'])->name('admin.categories-api.store');
Route::middleware('auth:sanctum')->put('/categories/update/{id}', [CategoryControllerApi::class,'update'])->name('admin.categories-api.update');
Route::middleware('auth:sanctum')->get('/categories/destroy/{id}', [CategoryControllerApi::class,'destroy'])->name('admin.categories-api.destroy');

Route::middleware('auth:sanctum')->get('/instructeurs', [InstructeurControllerApi::class,'index'])->name('admin.instructeurs-api.index');
Route::middleware('auth:sanctum')->post('/instructeurs/store', [InstructeurControllerApi::class,'store'])->name('admin.instructeurs-api.store');
Route::middleware('auth:sanctum')->put('/instructeurs/update/{id}', [InstructeurControllerApi::class,'update'])->name('admin.instructeurs-api.update');
Route::middleware('auth:sanctum')->get('/instructeurs/destroy/{id}', [InstructeurControllerApi::class,'destroy'])->name('admin.instructeurs-api.destroy');

Route::middleware('auth:sanctum')->get('/cours', [CoursControllerApi::class,'index'])->name('admin.cours-api.index');
Route::middleware('auth:sanctum')->post('/cours/store', [CoursControllerApi::class,'store'])->name('admin.cours-api.store');
Route::middleware('auth:sanctum')->put('/cours/update/{id}', [CoursControllerApi::class,'update'])->name('admin.cours-api.update');
Route::middleware('auth:sanctum')->get('/cours/destroy/{id}', [CoursControllerApi::class,'destroy'])->name('admin.cours-api.destroy');

Route::middleware('auth:sanctum')->get('/students', [StudentsControllerApi::class,'index'])->name('admin.students-api.index');
Route::middleware('auth:sanctum')->post('/students/store', [StudentsControllerApi::class,'store'])->name('admin.students-api.store');
Route::middleware('auth:sanctum')->put('/students/update/{id}', [StudentsControllerApi::class,'update'])->name('admin.students-api.update');
Route::middleware('auth:sanctum')->get('/students/destroy/{id}', [StudentsControllerApi::class,'destroy'])->name('admin.students-api.destroy');
Route::middleware('auth:sanctum')->get('/students/showCours/{id}', [StudentsControllerApi::class,'showCours'])->name('admin.students-api.showCours');
Route::middleware('auth:sanctum')->get('/students/{id}/cours/{c_id}/approve', [StudentsControllerApi::class,'approveCour'])->name('admin.students-api.approveCour');
Route::middleware('auth:sanctum')->get('/students/{id}/cours/{c_id}/reject', [StudentsControllerApi::class,'rejectCour'])->name('admin.students-api.rejectCour');
Route::middleware('auth:sanctum')->post('/students/{id}/add-to-cour', [StudentsControllerApi::class,'storeCour'])->name('admin.students-api.storeCour');

Route::middleware('auth:sanctum')->get('/commentaires', [CommentairesControllerApi::class,'index'])->name('admin.commentaires-api.index');

Route::middleware('auth:sanctum')->get('/commentaires/destroy/{id}', [CommentairesControllerApi::class,'destroy'])->name('admin.commentaires-api.destroy');
});
});



