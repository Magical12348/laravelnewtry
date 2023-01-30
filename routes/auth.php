<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\{
    CareerController,
    ContactController,
    CourseController,
    ExperienceController,
    InstallmentController,
    RazorpayController,
};

Route::get('career/personal_info', [ExperienceController::class, 'index'])->name('career.experience.index');
Route::post('career/personal_info', [ExperienceController::class, 'store'])->name('career.experience.store');
Route::get('get-syllabus', [ContactController::class, 'syllabus'])->name('get.syllabus');

Route::controller(CareerController::class)->as('career.')->group(function () {
    Route::get('career/your-courses', 'index')->name('add.course.index');
    Route::get('career/create-courses', 'createCareerCourse')->name('create.course.index');
    Route::post('career/add-courses', 'store')->name('add.course.store');
    Route::get('career/edit-courses/{career}', 'editCareerCourse')->name('edit.course.index');
    Route::put('career/update-courses/{career}', 'updateCareerCourse')->name('update.course.index');
    Route::delete('career/delete-courses/{career}', 'destroy')->name('add.course.destroy');

    Route::get('career/add-courses/type-create/{career}', 'typeCreate')->name('course.type.create');
    Route::post('career/add-courses/type-store/{career}', 'typeStore')->name('course.type.store');
    Route::get('career/add-courses/type-edit/{id}', 'typeEdit')->name('course.type.edit');
    Route::put('career/add-courses/type-update/{id}', 'typeUpdate')->name('course.type.update');
    Route::delete('career/add-courses/type-delete/{id}', 'typeDestroy')->name('course.type.destroy');
});

Route::controller(RazorpayController::class)->as('razorpay.')->group(function () {
    Route::get('checkout/{course:slug}/coupon', 'couponIndex')->name('coupon.index');
    Route::get('checkout/{course:slug}/coupon/store', 'couponStore')->name('coupon.store');

    Route::get('checkout/{course:slug}', 'index')->name('index');
    Route::post('checkout/{course:slug}', 'store')->name('store');

    // Route::get('checkout/{course:slug}/offline', 'indexOffline')->name('offline.index');
    // Route::post('checkout/{course:slug}/offline', 'storeOffline')->name('offline.store');

    // Route::get('checkout/{course:slug}/online', 'indexOnline')->name('online.index');
    // Route::post('checkout/{course:slug}/online', 'storeOnline')->name('online.store');
});

Route::controller(InstallmentController::class)->as('installment.')->group(function () {
    Route::get('checkout/{course:slug}/installment', 'index')->name('index');
    Route::post('checkout/{course:slug}/installment', 'store')->name('store');

    Route::get('checkout/{course:slug}/full-installment', 'edit')->name('edit');
    Route::post('checkout/{course:slug}/full-installment/{installment}', 'update')->name('update');
});

Route::controller(CourseController::class)->group(function () {
    Route::get('my-courses', 'userCourse')->name('user.courses');
    Route::post('my-referral', 'createReferral')->name('user.createReferral');
    Route::get('my-notes', 'userPdf')->name('user.pdf');
    Route::get('my-referral', 'userReferral')->name('user.referral');
    Route::get('course-pdf/{slug}', 'pdfShow')->name('course.pdf.show');

});
