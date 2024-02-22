<?php

use App\Http\Controllers\Admin\ActiveAbuDhabiController;
use App\Http\Controllers\Admin\AgendaController;

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\EmailController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ManualGatewayController;
use App\Http\Controllers\Admin\NavbarController;
use App\Http\Middleware\DynamicRolePermissionMiddleware; // Import the custom middleware

use App\Http\Controllers\HomeController;


use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Artisan;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\GeneralSettingsController;
use App\Http\Controllers\Admin\LogController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\MediaUploadController;
use App\Http\Controllers\Admin\PermissionController;


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

Route::get('/clear', function () {
    Artisan::call('config:clear');
    Artisan::call('cache:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    dd("cache cleared");
});


Route::get('/', function () {
    return view('frontend.home');
});

//Route::get('/', [HomeController::class, 'newHome'])->name('home');
Route::get('/active-abu-dhabi', [HomeController::class, 'activeAbuDhabi'])->name('active-abu-dhabi');
Route::post('/store-active-abu-dhabi', [HomeController::class, 'storeActiveAbuDhabi'])->name('store-active-abu-dhabi');


//Route::get('/iiwcc_course', [HomeController::class, 'iiwccCourse'])->name('iiwcc_course');
//Route::get('/conference_flyer', [HomeController::class, 'ConferenceFlyer'])->name('conference_flyer');
//Route::get('/header', [HomeController::class, 'showHeader'])->name('header');
//Route::get('/faculty', [HomeController::class, 'Faculty'])->name('faculty');
//Route::get('/sponsor', [HomeController::class, 'Sponsor'])->name('sponsor');
//Route::get('/agenda', [HomeController::class, 'agenda'])->name('agenda');

Route::get('contact',[HomeController::class,'Contact_Us'])->name('contact');
Route::post('store-contact',[HomeController::class,'StoreContact'])->name('store-contact');


Auth::routes();

Route::group([
    'middleware' => ['auth', DynamicRolePermissionMiddleware::class], // Apply middleware here
    'prefix' => 'admin',
], function ()  {

    // Users Controller
    Route::resource('users', UsersController::class);
    Route::post('get-users', [UsersController::class, 'getUsers'])->name('admin.getUsers');
    Route::post('get-user', [UsersController::class, 'userDetail'])->name('admin.getUser');
    Route::get('users/delete/{id}', [UsersController::class, 'destroy'])->name('user-delete');
    Route::post('delete-selected-users', [UsersController::class, 'DeleteSelectedUsers'])->name('delete-selected-users');
    Route::get('edit-profile/{id}', [UsersController::class, 'show'])->name('edit-profile');
    Route::get('/profile-setting', [UsersController::class, 'profileSetting'])->name('user.profile');
    Route::post('/profile-setting', [UsersController::class, 'updateProfile'])->name('user.profile');
    Route::post('users/{id}/assign-roles', [UsersController::class, 'assignRoles'])->name('users.assignRoles');
    Route::group(['middleware' => ['auth']], function () {
        Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

        Route::middleware(['dynamic_role_permission'])->group(function () {
            // Roles Controller
            Route::resource('roles', RoleController::class);
            Route::post('get-roles', [RoleController::class, 'getRoles'])->name('admin.getRoles');
            Route::post('get-role', [RoleController::class, 'roleDetail'])->name('admin.getRole');
            Route::get('roles/delete/{id}', [RoleController::class, 'destroy'])->name('role-delete');
            Route::post('delete-selected-roles', [RoleController::class, 'DeleteSelectedRoles'])->name('delete-selected-roles');

            // Permission Controller
            // Permission Controller
            Route::resource('permissions', PermissionController::class);
            Route::post('get-permissions', [PermissionController::class, 'getPermissions'])->name('admin.getPermissions');
            Route::get('/permissions/{id}/edit', 'PermissionController@edit')->name('permissions.edit');
            Route::post('get-permission', [PermissionController::class, 'permissionDetail'])->name('admin.getPermission');
            Route::get('permissions/delete/{id}', [PermissionController::class, 'destroy'])->name('permission-delete');
            Route::post('delete-selected-permissions', [PermissionController::class, 'DeleteSelectedPermissions'])->name('delete-selected-permissions');


            // Other protected routes can be added here
            //Logs Controller
            Route::resource('logs', LogController::class);
            Route::post('get-log', [LogController::class, 'logDetail'])->name('admin.getLog');
            Route::get('log/delete/{id}', [LogController::class, 'destroy'])->name('log-delete');
            Route::post('delete-selected-logs', [LogController::class, 'DeleteSelectedLogs'])->name('delete-selected-logs');
            // ... other log-related routes ...

            //general settings
            Route::get('/general-settings/site-identity', [GeneralSettingsController::class, 'site_identity'])->name('admin.general.site.identity');
            Route::post('/general-settings/site-identity', [GeneralSettingsController::class, 'update_site_identity']);

            Route::get('/general-settings/basic-settings', [GeneralSettingsController::class, 'basic_settings'])->name('admin.general.basic.settings');
            Route::post('/general-settings/basic-settings', [GeneralSettingsController::class, 'update_basic_settings']);
            //smtp settings
            Route::get('/general-settings/smtp-settings', [GeneralSettingsController::class, 'smtp_settings'])->name('admin.general.smtp.settings');
            Route::post('/general-settings/smtp-settings', [GeneralSettingsController::class, 'update_smtp_settings']);

            //general settings
            Route::get('/section/slider', [GeneralSettingsController::class, 'slider'])->name('admin.general.slider');
            Route::post('/section/slider', [GeneralSettingsController::class, 'update_slider']);
            Route::get('/section/message', [GeneralSettingsController::class, 'message'])->name('admin.general.message');
            Route::post('/section/message', [GeneralSettingsController::class, 'update_message']);
            Route::get('/section/service', [GeneralSettingsController::class, 'service'])->name('admin.general.service');
            Route::post('/section/service', [GeneralSettingsController::class, 'update_service']);
            /* media upload routes */
            Route::post('/media-upload/all', [MediaUploadController::class, 'all_upload_media_file'])->name('admin.upload.media.file.all');
            Route::post('/media-upload', [MediaUploadController::class, 'upload_media_file'])->name('admin.upload.media.file');
            Route::post('/media-upload/delete', [MediaUploadController::class, 'delete_upload_media_file'])->name('admin.upload.media.file.delete');

            // Section Controller
            Route::get('/section/slider', [GeneralSettingsController::class, 'slider'])->name('admin.general.slider');
            // ... other section-related routes ...

            // Media Upload Routes
            Route::post('/media-upload/all', [MediaUploadController::class, 'all_upload_media_file'])->name('admin.upload.media.file.all');
            // ... other media upload-related routes ...
        });

        // Non-admin routes
        Route::middleware(['dynamic_role_permission'])->group(function () {
            Route::get('profile-setting', [UsersController::class, 'profileSetting'])->name('user.profile');
          //NavbarController
            Route::get('/navbar2', [NavbarController::class . 'navbar']);

            Route::resource('navbar', NavbarController::class);
            Route::post('get-navbars', [NavbarController::class, 'getNavbars'])->name('admin.getNavbars');
//    Route::post('get-navbars', [NavbarController::class, 'navbarDetail'])->name('admin.getNavbars');
            Route::post('get-navbar-detail', [NavbarController::class, 'navbarDetail'])->name('admin.getNavbarDetail');
            Route::get('navbar/delete/{id}', [NavbarController::class, 'destroy'])->name('navbar-delete');
            Route::post('delete-selected-navbar', [NavbarController::class, 'deleteSelectedNavbar'])->name('delete-selected-navbar');
            Route::get('/navbars', [NavbarController::class, 'index'])->name('navbars');


            //Speaker Controller
            Route::get('/agenda2', [AgendaController::class, 'agenda']);

            Route::resource('agenda', AgendaController::class);
//          Route::post('get-speaker', [SpeakerController::class, 'getSpeaker'])->name('admin.getSpeaker');
            Route::post('get-agenda-detail', [AgendaController::class, 'agendaDetail'])->name('admin.getAgendaDetail');
            Route::get('agenda/delete/{id}', [AgendaController::class, 'destroy'])->name('agenda-delete');
            Route::post('delete-selected-agenda', [AgendaController::class, 'deleteSelectedAgenda'])->name('delete-selected-agenda');
            Route::get('/agendas', [AgendaController::class, 'index'])->name('agendas');
            Route::post('duplicate-row', [AgendaController::class, 'duplicateRow'])->name('agenda_duplicateRow');

            //Manual Gateway Controller
            Route::get('gateway',[ManualGatewayController::class]);

            Route::resource('gateway', ManualGatewayController::class);
            Route::post('get-gateways_details',[ManualGatewayController::class,'gateways_details'])->name('admin.getgateways_details');

            //Category Controller
            Route::get('/category',['CategoryController::class']);
            Route::resource('category',CategoryController::class);
            Route::post('get-category',[CategoryController::class,'getCategory'])->name('admin.getCategory');
            Route::post('get-category-detail', [ActiveAbuDhabiController::class, 'categoryDetail'])
                ->name('admin.getCategoryDetail');

            //Product Controller
            Route::get('product',[ProductController::class]);
            Route::resource('product', ProductController::class);
            Route::post('get-product',[ProductController::class,'getProduct'])->name('admin.Product');

            //Email Controller
            // Using Route::get() method to define a single route
            Route::get('/send-email', [EmailController::class, 'sendEmail']);
            Route::resource('email',EmailController::class,);
            Route::Post('get-email',[EmailController::class,'getEmail'])->name('admin.Email');
            Route::get('email/send/{id}', [EmailController::class, 'send'])->name('email.send');



            // Active Abu Dhabi
            Route::get('/active_abu_dhabi', [ActiveAbuDhabiController::class, 'active_abu_dhabi'])
                ->name('active_abu_dhabi.index');

            Route::resource('active_abu_dhabi', ActiveAbuDhabiController::class);
            Route::post('get-active_abu_dhabis', [ActiveAbuDhabiController::class, 'getActive_abu_dhabi'])->name('admin.Active_abu_dhabi');
            Route::post('get-active_abu_dhabis-detail', [ActiveAbuDhabiController::class, 'active_abu_dhabisDetail'])
                ->name('admin.getActive_abu_dhabisDetail');
            Route::get('active_abu_dhabis/delete/{id}', [ActiveAbuDhabiController::class, 'destroy'])->name('active_abu_dhabis-delete');
            Route::post('delete-selected-active_abu_dhabis', [ActiveAbuDhabiController::class, 'deleteSelectedUser'])->name('delete-selected-user');


        });
    });

});

