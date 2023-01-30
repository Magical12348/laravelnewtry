<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\{
    CategoryController,
    CertificateController,
    ContactController,
    CourseController,
    CourseExcelController,
    ExperienceController,
    FaqsController,
    HomeController,
    InstallmentController,
    PlacementController,
    PolicyController,
    ReferralController,
    ServiceController,
    ServiceFormController
    // SliderController
};

Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'home')->name('home');
    Route::get('popup-export', 'exportContact')->name('admin.popup.export');
    Route::get('kids-export', 'exportKids')->name('admin.kids.export');
});

Route::controller(ServiceFormController::class)->group(function () {
    Route::get('services', 'index')->name('admin.service.index');
    Route::get('services-export', 'export')->name('admin.service.export');
    Route::get('services/{id}', 'show')->name('admin.service.show');
    Route::get('services/{id}/delete', 'destroy')->name('admin.service.destroy');
});

Route::get('installment-users/{course}', [InstallmentController::class, 'show'])->name('admin.installment.show');

// Route::get('slider-image', [SliderController::class, 'index'])->name('slider.index');
// Route::post('slider-image', [SliderController::class, 'store'])->name('slider.store');
// Route::delete('slider-image/{id}/delete', [SliderController::class, 'destroy'])->name('slider.destroy');

Route::controller(CategoryController::class)->prefix('category')->as('category.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::post('/', 'store')->name('store');
    Route::get('/create', 'create')->name('create');
    Route::get('{category:id}/edit', 'edit')->name('edit');
    Route::put('{category:slug}', 'update')->name('update');
    Route::delete('{category:slug}/delete', 'destroy')->name('destroy');
});

Route::resource('course', CourseController::class);
Route::resource('policy', PolicyController::class);
Route::resource('faq', FaqsController::class);

Route::get('course-users-export/{course}', [CourseExcelController::class, 'export'])->name('course.users.export');

Route::controller(CourseController::class)->group(function () {
    Route::post('course/update-all', 'updateAll')->name('course.update.all');

    Route::get('add-users/{id}', 'AddCourseUsers')->name('add.course.users');
    Route::post('store-users/{id}', 'storeCourseUsers')->name('store.course.users');

    Route::get('course-users/{id}', 'courseUsers')->name('course.users');
    Route::get('course-user/{id}/delete', 'courseUsersDelete')->name('course.user.destroy');
    Route::delete('course-user/{id}/delete-all', 'courseAllUsersDelete')->name('course.user.all.destroy');

    Route::get('summer-camp-pdf/{id}', 'summerCampPdf')->name('summer.camp.pdf');

    Route::post('course-services', 'serviceStore')->name('course.service');
    Route::delete('course-services/{service:id}/delete', 'serviceDelete')->name('service.destroy');

    Route::post('course-pdf', 'pdfStore')->name('course.pdf.store');
    Route::delete('course-pdf/{id}/delete', 'pdfDelete')->name('course.pdf.destroy');

    Route::post('course-btn', 'courseBtn')->name('course.btn.store');
    Route::delete('course-btn/{id}/delete', 'btnDelete')->name('course.btn.destroy');

    Route::post('course-scope', 'scopeStore')->name('course.scope.store');
    Route::delete('course-scope/{scope:id}/delete', 'scopeDelete')->name('course.scope.destroy');
});

Route::get('contact/{id}/delete', [ContactController::class, 'destroy'])->name('contact.destroy');
Route::get('kid-contact/{id}/delete', [ContactController::class, 'kidContactDestroy'])->name('kid.contact.destroy');

Route::resource('certificate', CertificateController::class)->except('show');
Route::get('/referral_details',[ReferralController::class,'index'])->name('referral.index');


Route::get('placement-details',[PlacementController::class,'index'])->name('placement.index');
Route::get('placement-details/create',[PlacementController::class,'create'])->name('placement.create');
Route::post('placement-details/create',[PlacementController::class,'store'])->name('placement.store');
Route::delete('placement-details/{placement}/delete',[PlacementController::class,'destroy'])->name('placement.destroy');
Route::get('placement-details/{placement_details}/edit',[PlacementController::class,'edit'])->name('placement.edit');
Route::post('placement-details/{placement}/edit',[PlacementController::class,'update'])->name('placement.update');




Route::controller(ExperienceController::class)->prefix('experience')->as('admin.experience.')->group(function () {
    Route::get('/', 'adminIndex')->name('index');
    Route::get('{experience:id}', 'show')->name('show');
    Route::get('{experience:id}/generate-pdf', 'generatePdf')->name('pdf');
    Route::get('{experience:id}/verify', 'verify')->name('verified');
    Route::delete('{experience:id}/delete', 'destroy')->name('destroy');
});
