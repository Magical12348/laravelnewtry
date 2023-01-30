<?php

use Illuminate\Support\Facades\{Route, Auth};

use App\Http\Controllers\{
    CareerController,
    CertificateController,
    ContactController,
    CourseController,
    HomeController,
    ServiceFormController,
};

Auth::routes();

Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('welcome');
    Route::get('about', 'about')->name('about');
    Route::get('contact', 'contact')->name('contact');
    Route::get('services', 'services')->name('services');
    Route::get('referral', 'referral')->name('referral');
    // Route::get('projects', 'projects')->name('projects');
    Route::get('faqs', 'faqs')->name('faqs');
    Route::get('terms-and-conditions', 'terms')->name('terms');
});

Route::controller(ContactController::class)->group(function () {
    Route::post('contact/send', 'contact')->name('contact.store');
    Route::post('contact/kids/query', 'kidcontact')->name('kid.contact.store');
    Route::delete('contact/kids/{id}/delete', 'kidContactDelete')->name('kid.contact.delete');
});

Route::get('career', [CareerController::class, 'list'])->name('career.list');
Route::get('career-term', [CareerController::class, 'term'])->name('career.term');

Route::get('course-details/{course:slug}', [CourseController::class, 'courseDetail'])->name('course.details');

Route::post('services/send', [ServiceFormController::class, 'store'])->name('service.form.store');

Route::get('valid/certificate', [HomeController::class, 'certificate'])->name('certificate.show');
Route::post('valid/certificate', [CertificateController::class, 'validateCertificate'])->name('certificate.validate');
