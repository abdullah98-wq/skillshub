<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\CatController as AdminCatController;
use App\Http\Controllers\admin\ExamController as AdminExamController;
use App\Http\Controllers\admin\HomeController as AdminHomeController;
use App\Http\Controllers\admin\messages;
use App\Http\Controllers\admin\SkillController as AdminSkillController;
use App\Http\Controllers\admin\StudentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\web\CatController;
use App\Http\Controllers\web\contactController;
use App\Http\Controllers\web\ExamController;
use App\Http\Controllers\web\HomeController;
use App\Http\Controllers\web\LangController;
use App\Http\Controllers\web\SkillController;
use App\Models\Exam;
use Illuminate\Support\Facades\Route;

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
route::middleware('lang')->group(function(){
    Route::get('/', [HomeController::class,'index']
);
Route::get('/categories/show/{id}', [CatController::class,'show']
);
Route::get('/skills/show/{id}', [SkillController::class,'show']
);
Route::get('/exam/show/{id}', [ExamController::class,'show']
);
Route::get('/exam/questions/{id}', [ExamController::class,'questions']
)->middleware(['auth','student']);;
Route::get('/contact', [contactController::class,'index']
);
Route::get('/profile', [ProfileController::class,'index']
);
Route::post('/contact/message/send', [contactController::class,'send']
);


Route::post('/exam/start/{id}', [ExamController::class,'start']
)->middleware(['auth','student']);;
Route::post('/exam/submit/{id}', [ExamController::class,'submit']
)->middleware(['auth','student']);;
});
Route::get('/lang/set/{lang}', [LangController::class,'set']

);
Route::prefix('dashboard')->middleware(['superadmin','auth'])
->group(function(){
Route::get('/', [AdminHomeController::class,'index']

);
Route::get('/category', [AdminCatController::class,'index']);
Route::post('/category/store', [AdminCatController::class,'store']);
Route::post('/category/update', [AdminCatController::class,'update']);
Route::get('/category/delete/{id}', [AdminCatController::class,'delete']);

Route::get('/skills', [AdminSkillController::class,'index']);
Route::post('/skills/store', [AdminSkillController::class,'store']);
Route::post('/skills/update', [AdminSkillController::class,'update']);
Route::get('/skills/delete/{id}', [AdminSkillController::class,'delete']);

Route::get('/exams', [AdminExamController::class,'index']);
Route::get('/exams/create', [AdminExamController::class,'create']);
Route::get('/exams/create-questions/{exam}', [AdminExamController::class,'createQuestions']);
Route::post('/exams/store-questions/{exam}', [AdminExamController::class,'storeQuestions']);
Route::get('/exams/show/{id}', [AdminExamController::class,'show']);
Route::get('/exams/show/{id}/quest', [AdminExamController::class,'showquestions']);
Route::post('/exams/store', [AdminExamController::class,'store']);
Route::get('/exams/edit/{exam}', [AdminExamController::class,'update']);
Route::post('/exams/update/{exam}', [AdminExamController::class,'update']);
Route::get('/exams/edit-questions/{exam}/questions', [AdminExamController::class,'editQuestions']);
Route::post('/exams/update-questions/{exam}/questions', [AdminExamController::class,'updateQuestions']);

Route::get('/exams/delete/{exam}', [AdminExamController::class,'delete']);

Route::get('/student', [StudentController::class,'index']);
Route::get('/student/show-scores/{id}', [StudentController::class,'showScores']);
Route::get('/student/open-exam/{studentId}/{examId}', [StudentController::class,'openExam']);




Route::middleware('superadmin')->group(function(){
Route::get('/admin',[AdminController::class,'index']);
Route::get('/admin/create',[AdminController::class,'create']);
Route::post('/admin/store',[AdminController::class,'store']);

});
Route::get('/messages', [messages::class,'index']);

Route::post('/messages/response/{messages}', [messages::class,'response'])
;Route::get('/messages/show/{messages}', [messages::class,'show'])
;



});
