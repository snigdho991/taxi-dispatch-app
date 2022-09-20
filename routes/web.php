<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Cms\RoleController;
use App\Http\Controllers\Ums\AdminToolsController;
use App\Http\Controllers\Ums\DriverToolsController;
use App\Http\Controllers\Cms\ThemeController;
use App\Http\Controllers\Cms\ProfileController;
use App\Http\Controllers\Cms\FrontendController;

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

Route::middleware(['guest'])->get('/', [FrontendController::class, 'frontend_index'])->name('frontend.index');

//Route::get('/generate-role', [RoleController::class, 'generate_role'])->name('generate.role');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
	Route::post('/save-theme', [ThemeController::class, 'select_theme'])->name('select.theme');
	Route::post('/save/basic-info', [ProfileController::class, 'save_basic_info'])->name('save.basic.info');
	Route::post('/save/change-password', [ProfileController::class, 'change_auth_password'])->name('change.auth.password');
	Route::get('/booking/view-map/{id}', [ProfileController::class, 'view_map'])->name('view.map');
		
	Route::group(['prefix' => 'administrator'], function(){
		Route::get('/dashboard', [AdminToolsController::class, 'admin_dashboard'])->name('admin.dashboard');
		Route::get('/import-bookings', [AdminToolsController::class, 'import_bookings'])->name('import.bookings');
		Route::post('/import-files', [AdminToolsController::class, 'import_files'])->name('import.files');
		Route::get('/pending-bookings', [AdminToolsController::class, 'pending_bookings'])->name('pending.bookings');
		Route::get('/accepted-bookings', [AdminToolsController::class, 'accepted_bookings'])->name('accepted.bookings');
		Route::post('/add-price', [AdminToolsController::class, 'add_price'])->name('add.price');
		Route::post('/delete-price', [AdminToolsController::class, 'delete_price'])->name('delete.price');
		Route::get('/pending/available-bookings', [AdminToolsController::class, 'pending_available_bookings'])->name('pending.available.bookings');
		Route::get('/pending/notavailable-bookings', [AdminToolsController::class, 'pending_not_available_bookings'])->name('pending.notavailable.bookings');
		Route::post('/delete-booking', [AdminToolsController::class, 'delete_booking'])->name('delete.booking');
		Route::post('/mark-uber', [AdminToolsController::class, 'mark_uber'])->name('mark.uber');
		Route::get('/uber-bookings', [AdminToolsController::class, 'uber_list'])->name('uber.list');
		Route::post('/unmark-uber', [AdminToolsController::class, 'unmark_uber'])->name('unmark.uber');
		Route::get('/drivers-list', [AdminToolsController::class, 'drivers_list'])->name('drivers.list');
		Route::post('/delete-all-uber', [AdminToolsController::class, 'delete_all_uber'])->name('delete.all.uber');
		Route::post('/delete-all-accepted', [AdminToolsController::class, 'delete_all_accepted'])->name('delete.all.accepted');
		Route::post('/delete-all-notavailable', [AdminToolsController::class, 'delete_all_notavailable'])->name('delete.all.notavailable');
		Route::post('/delete-all-available', [AdminToolsController::class, 'delete_all_available'])->name('delete.all.available');
		Route::post('/delete-all-pending', [AdminToolsController::class, 'delete_all_pending'])->name('delete.all.pending');
		Route::post('/delete-all-combined', [AdminToolsController::class, 'delete_all_combined'])->name('delete.all.combined');
		Route::get('/approval-list', [AdminToolsController::class, 'approval_list'])->name('approval.list');
		Route::post('/approve-driver', [AdminToolsController::class, 'approve_driver'])->name('approve.driver');
		Route::post('/decline-driver', [AdminToolsController::class, 'decline_driver'])->name('decline.driver');
		Route::post('/combine-bookings/{frombooking}', [AdminToolsController::class, 'combine_bookings'])->name('combine.bookings');
		Route::get('/combined-bookings', [AdminToolsController::class, 'combined_bookings'])->name('combined.bookings');
		Route::post('/delete-user', [AdminToolsController::class, 'delete_user'])->name('delete.user');
	});

	Route::group(['prefix' => 'driver'], function () {
			Route::get('/wait-for-approval', [DriverToolsController::class, 'wait_approval'])->name('wait.approval');

		Route::middleware(['approved'])->group(function () {
			Route::get('/dashboard', [DriverToolsController::class, 'driver_dashboard'])->name('driver.dashboard');
			Route::get('/available-bookings', [DriverToolsController::class, 'available_bookings'])->name('available.bookings');
			Route::post('/accept-booking', [DriverToolsController::class, 'accept_booking'])->name('accept.booking');
			Route::get('/my-bookings', [DriverToolsController::class, 'my_bookings'])->name('my.bookings');
			Route::post('/complete-booking', [DriverToolsController::class, 'complete_booking'])->name('complete.booking');
			Route::get('/completed-bookings', [DriverToolsController::class, 'completed_bookings'])->name('completed.bookings');
		});
	});

});
