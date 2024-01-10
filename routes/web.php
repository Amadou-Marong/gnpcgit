<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes([
    // 'register' => false, // Registration Routes...
    // 'reset' => false, // Password Reset Routes...
    // 'verify' => false, // Email Verification Routes...
]);

// Route::get('/', [AdminController::class, 'index']);

Route::middleware(['auth', 'isLecturer'])->group(function () {
    Route::get('/dashboard', App\Http\Livewire\Dashboard::class)->name('dashboard');
    Route::view('/admin/profile', 'admin.profile');
    Route::post('/admin/profile', [AdminController::class, 'profileUpdate']);
    //Route Hooks - Do not delete//
    Route::get('answers-list', App\Http\Livewire\AnswersList::class)->middleware('auth');
    Route::get('list-course/{student_id}', App\Http\Livewire\Answers\CourseList::class)->middleware('auth');
    Route::get('examDetail/{exam_id}/{student_id}', App\Http\Livewire\Answers\ExamDetail::class)->middleware('auth');
    Route::get('exams', App\Http\Livewire\Exams::class)->middleware('auth');
    Route::get('question-options', App\Http\Livewire\QuestionOptions::class)->middleware('auth');
    Route::get('questions', App\Http\Livewire\Questions::class)->middleware('auth');
    Route::get('courses', App\Http\Livewire\Courses::class)->middleware('auth');
    Route::get('students', App\Http\Livewire\StudentList::class)->middleware('auth');

    Route::get('/admin/site_settings', App\Http\Livewire\SiteSettings::class)->middleware('auth');
    Route::get('/admin/users', App\Http\Livewire\Users::class)->middleware('auth');
    Route::get('/admin/roles', App\Http\Livewire\Roles::class)->middleware('auth');
    Route::get('/admin/permissions', App\Http\Livewire\Permissions::class)->middleware('auth');

});

//frontend
Route::get('/', App\Http\Livewire\Home::class);
Route::get('/course/list', App\Http\Livewire\CourseList::class)->name('course.list')->middleware('auth');
Route::get('/course/{course_id}', App\Http\Livewire\Course::class)->name('course.show')->middleware('auth');
Route::get('/course/{exam_id}/exam', App\Http\Livewire\ExamList::class)->name('course.exam')->middleware('auth');
Route::post('/course/{exam_id}/exam', [App\Http\Livewire\ExamList::class, 'ansStore']);
Route::get('logout', function () {
    auth()->logout();
    return redirect('/');
});
