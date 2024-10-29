<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\TourController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ActivityController as AdminActivityController;
use App\Http\Controllers\Admin\TourController as AdminTourController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\Admin\DestinationController as AdminDestinationController;
use App\Http\Controllers\Admin\InquiryController as AdminInquiryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Admin\VehicleAttributeController;
use App\Http\Controllers\Admin\VehicleController;
use App\Http\Controllers\Admin\VehicleTypeController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\MediaController;
use App\Http\Controllers\RentalController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\AttractionController as AdminAttractionController;
use App\Http\Controllers\InquiryController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AttractionController;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\Admin\SubscriptionController;
use App\Http\Controllers\Admin\WidgetController;


Route::get('/mymail', [GeneralController::class, 'mymail'])->name('mymail');

Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::get('register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');
Route::get('user', function () {
    echo 'Payment was successful';
})->name('user');
Route::get('checkout-cancel', function () {
    echo 'checkout cancel';
})->name('checkout.cancel');

Route::get('/', [GeneralController::class, 'index'])->name('home');
Route::get('privacy-policy', [GeneralController::class, 'index'])->name('privacy.policy');
Route::get('terms-of-service', [GeneralController::class, 'index'])->name('terms.service');
Route::get('payment-policy', [GeneralController::class, 'index'])->name('payment.policy');

Route::post('/send-inquiry', [InquiryController::class, 'send'])->name('send.inquiry');
Route::post('/subscription-store', [InquiryController::class, 'subscriptionStore'])->name('subscriptions.store');
Route::get('/home-search-filter', [InquiryController::class, 'homeSearch'])->name('home.search.filter');
Route::get('/tour-search-filter', [InquiryController::class, 'tourSearch'])->name('tour.search.filter');
Route::post('/change-currency', [InquiryController::class, 'changeCurrency'])->name('change.currency');

Route::resource('tours', TourController::class);
Route::resource('posts', PostController::class);
Route::resource('payments', PaymentController::class);
Route::resource('rentals', RentalController::class);
Route::resource('activities', ActivityController::class);
Route::resource('attractions', AttractionController::class);
Route::resource('destinations', DestinationController::class);

Route::middleware(['auth'])->group(function () {
    Route::prefix('admin')->group(function () {

        Route::get('dashboard', [AdminController::class, 'index'])->name('admin.index');

        Route::resource('media', MediaController::class);
        Route::resource('tour', AdminTourController::class);
        Route::resource('widget', WidgetController::class);
        Route::resource('post', AdminPostController::class);
        Route::resource('setting', SettingController::class);
        Route::resource('vehicle', VehicleController::class);
        Route::resource('inquiry', AdminInquiryController::class);
        Route::resource('category', AdminCategoryController::class);
        Route::resource('activity', AdminActivityController::class);
        Route::resource('subscription', SubscriptionController::class);
        Route::resource('destination', AdminDestinationController::class);
        Route::resource('attraction', AdminAttractionController::class);
        Route::resource('vehicle-type', VehicleTypeController::class);
        Route::resource('vehicle-attribute', VehicleAttributeController::class);
        Route::delete('/post/{post_id}/image/{image}', [AdminPostController::class, 'deleteImage']);
        Route::delete('/tour/{tour_id}/image/{image}', [AdminTourController::class, 'deleteImage']);
        Route::delete('/setting/{Page_id}/image/{image}', [SettingController::class, 'deleteImage']);
        Route::delete('/vehicle/{vehicle_post}/image/{image}', [VehicleController::class, 'deleteImage']);
        Route::delete('/activity/{activity_id}/image/{image}', [AdminActivityController::class, 'deleteImage']);
        Route::delete('/attraction/{attraction_id}/image/{image}', [AdminAttractionController::class, 'deleteImage']);
    });
});
