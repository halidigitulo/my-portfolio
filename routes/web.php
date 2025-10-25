<?php

use App\Http\Controllers\Admin\BackupRestoreController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\GeneralController;
use App\Http\Controllers\Admin\InvoiceController;
use App\Http\Controllers\Admin\KategoriBeritaController;
use App\Http\Controllers\Admin\KategoriProjectController;
use App\Http\Controllers\Admin\KategoriStackController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\ResumeController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\ServicesController;
use App\Http\Controllers\Admin\StackController;
use App\Http\Controllers\Admin\TestimoniController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Front\HomepageController;
use Illuminate\Support\Facades\Route;

Route::middleware(['guest'])->group(function () {});
Route::get('/', [HomepageController::class, 'index'])->name('homepage');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'auth_login'])->name('auth_login');

Route::middleware(['auth'])->group(function () {
    Route::group(['prefix' => 'admin'], function () {

        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::group(['prefix' => 'menus'], function () {
            Route::get('', [MenuController::class, 'index'])->name('menus.index');
            Route::post('', [MenuController::class, 'store'])->name('menus.store');
            Route::get('{menu}', [MenuController::class, 'show'])->name('menus.show');
            Route::put('{menu}', [MenuController::class, 'update'])->name('menus.update');
            Route::delete('{menu}', [MenuController::class, 'destroy'])->name('menus.destroy');
            Route::get('order', [MenuController::class, 'order'])->name('menus.order');
            Route::post('reorder', [MenuController::class, 'reorder'])->name('menus.reorder');
        });

        Route::group(['prefix' => 'roles'], function () {
            Route::get('', [RoleController::class, 'index'])->name('roles.index');
            Route::post('', [RoleController::class, 'store'])->name('roles.store');
            Route::get('{role}', [RoleController::class, 'show'])->name('roles.show');
            Route::put('{role}', [RoleController::class, 'update'])->name('roles.update');
            Route::delete('{role}', [RoleController::class, 'destroy'])->name('roles.destroy');
        });

        Route::group(['prefix' => 'permissions'], function () {
            Route::get('', [PermissionController::class, 'index'])->name('permissions.index');
            Route::post('generator', [PermissionController::class, 'generate'])->name('permissions.generate');
            Route::put('{permission}', [PermissionController::class, 'update'])->name('permissions.update');
            Route::delete('{permission}', [PermissionController::class, 'destroy'])->name('permissions.destroy');
        });

        Route::group(['prefix' => 'users'], function () {
            Route::get('', [UserController::class, 'index'])->name('users.index');
            Route::post('', [UserController::class, 'storeOrUpdate'])->name('users.store');
            Route::put('{id}', [UserController::class, 'storeOrUpdate'])->name('users.update');
            Route::get('{id}/edit', [UserController::class, 'edit'])->name('users.edit');
            Route::delete('destroy/{id}', [UserController::class, 'destroy'])->name('users.destroy');
            Route::get('profile', [UserController::class, 'profile'])->name('users.profile');
            Route::post('profile/update', [UserController::class, 'updateProfile'])->name('users.updateProfile');
        });

        Route::group(['prefix' => 'backup-restore'], function () {
            Route::get('', [BackupRestoreController::class, 'index'])->name('backup-restore.index');
            Route::get('backup', [BackupRestoreController::class, 'backup'])->name('backup-restore.backup');
            Route::get('/list', [BackupRestoreController::class, 'list'])->name('backup-restore.list');
            Route::get('/download/{file}', [BackupRestoreController::class, 'download'])->where('file', '.*')->name('backup-restore.download');
            Route::delete('/delete/{file}', [BackupRestoreController::class, 'delete'])->where('file', '.*')->name('backup-restore.delete');
            Route::post('restore', [BackupRestoreController::class, 'restore'])->name('backup-restore.restore');
            Route::post('reset', [BackupRestoreController::class, 'reset'])->name('backup-restore.reset');
        });

        Route::group(['prefix' => 'profile'], function () {
            Route::get('', [ProfileController::class, 'index'])->name('profile.index');
            Route::post('', [ProfileController::class, 'update'])->name('profile.update');
        });

        Route::group(['prefix' => 'general'], function () {
            Route::get('', [GeneralController::class, 'index'])->name('general.index');
            Route::post('', [GeneralController::class, 'update'])->name('general.update');
        });

        Route::group(['prefix' => 'kategori-project'], function () {
            Route::get('', [KategoriProjectController::class, 'index'])->name('kategori-project.index');
            Route::post('', [KategoriProjectController::class, 'storeOrUpdate'])->name('kategori-project.store');
            Route::put('{id}', [KategoriProjectController::class, 'storeOrUpdate'])->name('kategori-project.update');
            Route::get('{id}', [KategoriProjectController::class, 'edit'])->name('kategori-project.edit');
            Route::delete('{id}', [KategoriProjectController::class, 'destroy'])->name('kategori-project.destroy');
        });

        Route::group(['prefix' => 'kategori-berita'], function () {
            Route::get('', [KategoriBeritaController::class, 'index'])->name('kategori-berita.index');
            Route::post('', [KategoriBeritaController::class, 'storeOrUpdate'])->name('kategori-berita.store');
            Route::put('{id}', [KategoriBeritaController::class, 'storeOrUpdate'])->name('kategori-berita.update');
            Route::get('{id}', [KategoriBeritaController::class, 'edit'])->name('kategori-berita.edit');
            Route::delete('{id}', [KategoriBeritaController::class, 'destroy'])->name('kategori-berita.destroy');
        });

        Route::group(['prefix' => 'kategori-stack'], function () {
            Route::get('', [KategoriStackController::class, 'index'])->name('kategori-stack.index');
            Route::post('', [KategoriStackController::class, 'storeOrUpdate'])->name('kategori-stack.store');
            Route::put('{id}', [KategoriStackController::class, 'storeOrUpdate'])->name('kategori-stack.update');
            Route::get('{id}', [KategoriStackController::class, 'edit'])->name('kategori-stack.edit');
            Route::delete('{id}', [KategoriStackController::class, 'destroy'])->name('kategori-stack.destroy');
        });

        Route::group(['prefix' => 'client'], function () {
            Route::get('', [ClientController::class, 'index'])->name('client.index');
            Route::post('', [ClientController::class, 'storeOrUpdate'])->name('client.store');
            Route::put('{id}', [ClientController::class, 'storeOrUpdate'])->name('client.update');
            Route::get('{id}', [ClientController::class, 'edit'])->name('client.edit');
            Route::delete('{id}', [ClientController::class, 'destroy'])->name('client.destroy');
        });

        Route::group(['prefix' => 'stack'], function () {
            Route::get('', [StackController::class, 'index'])->name('stack.index');
            Route::post('', [StackController::class, 'storeOrUpdate'])->name('stack.store');
            Route::put('{id}', [StackController::class, 'storeOrUpdate'])->name('stack.update');
            Route::get('{id}', [StackController::class, 'edit'])->name('stack.edit');
            Route::delete('{id}', [StackController::class, 'destroy'])->name('stack.destroy');
        });

        Route::group(['prefix' => 'resume'], function () {
            Route::get('', [ResumeController::class, 'index'])->name('resume.index');
            Route::post('', [ResumeController::class, 'storeOrUpdate'])->name('resume.store');
            Route::put('{id}', [ResumeController::class, 'storeOrUpdate'])->name('resume.update');
            Route::get('{id}', [ResumeController::class, 'edit'])->name('resume.edit');
            Route::delete('{id}', [ResumeController::class, 'destroy'])->name('resume.destroy');
        });

        Route::group(['prefix' => 'service'], function () {
            Route::get('', [ServicesController::class, 'index'])->name('service.index');
            Route::get('cekSlug', [ServicesController::class, 'cekSlug']);
            Route::post('', [ServicesController::class, 'storeOrUpdate'])->name('service.store');
            Route::put('{id}', [ServicesController::class, 'storeOrUpdate'])->name('service.update');
            Route::get('{id}', [ServicesController::class, 'edit'])->name('service.edit');
            Route::delete('{id}', [ServicesController::class, 'destroy'])->name('service.destroy');
        });

        Route::group(['prefix' => 'product'], function () {
            Route::get('', [ProductController::class, 'index'])->name('product.index');
            Route::get('cekSlug', [ProductController::class, 'cekSlug']);
            Route::post('', [ProductController::class, 'storeOrUpdate'])->name('product.store');
            Route::put('{id}', [ProductController::class, 'storeOrUpdate'])->name('product.update');
            Route::get('{id}', [ProductController::class, 'edit'])->name('product.edit');
            Route::delete('{id}', [ProductController::class, 'destroy'])->name('product.destroy');
        });

        Route::group(['prefix' => 'project'], function () {
            Route::get('', [ProjectController::class, 'index'])->name('project.index');
            Route::get('cekSlug', [ProjectController::class, 'cekSlug']);
            Route::post('', [ProjectController::class, 'storeOrUpdate'])->name('project.store');
            Route::put('{id}', [ProjectController::class, 'storeOrUpdate'])->name('project.update');
            Route::get('{id}', [ProjectController::class, 'edit'])->name('project.edit');
            Route::delete('{id}', [ProjectController::class, 'destroy'])->name('project.destroy');
        });

        Route::group(['prefix' => 'post'], function () {
            Route::get('', [PostController::class, 'index'])->name('post.index');
            Route::get('cekSlug', [PostController::class, 'cekSlug']);
            Route::post('', [PostController::class, 'storeOrUpdate'])->name('post.store');
            Route::put('{id}', [PostController::class, 'storeOrUpdate'])->name('post.update');
            Route::get('{id}', [PostController::class, 'edit'])->name('post.edit');
            Route::delete('{id}', [PostController::class, 'destroy'])->name('post.destroy');
            Route::post('toggle-accept', [PostController::class, 'toggleAccept'])->name('post.toggle-accept');
            Route::delete('remove-thumbnail/{id}', [PostController::class, 'removeThumbnail'])->name('post.remove-thumbnail');
        });

        Route::group(['prefix' => 'invoice'], function () {
            Route::get('', [InvoiceController::class, 'index'])->name('invoice.index');
            Route::post('', [InvoiceController::class, 'storeOrUpdate'])->name('invoice.store');
            Route::post('update-status/{id}', [InvoiceController::class, 'updateStatus'])->name('invoice.updateStatus');
            Route::get('print/{id}', [InvoiceController::class, 'print'])->name('invoice.print');
            Route::put('{id}', [InvoiceController::class, 'storeOrUpdate'])->name('invoice.update');
            Route::get('{id}', [InvoiceController::class, 'edit'])->name('invoice.edit');
            Route::delete('{id}', [InvoiceController::class, 'destroy'])->name('invoice.destroy');
        });

        Route::group(['prefix' => 'faq'], function () {
            Route::get('', [FaqController::class, 'index'])->name('faq.index');
            Route::post('', [FaqController::class, 'storeOrUpdate'])->name('faq.store');
            Route::put('{id}', [FaqController::class, 'storeOrUpdate'])->name('faq.update');
            Route::get('{id}', [FaqController::class, 'edit'])->name('faq.edit');
            Route::delete('{id}', [FaqController::class, 'destroy'])->name('faq.destroy');
        });

        Route::group(['prefix' => 'testimoni'], function () {
            Route::get('', [TestimoniController::class, 'index'])->name('testimoni.index');
            Route::post('', [TestimoniController::class, 'storeOrUpdate'])->name('testimoni.store');
            Route::put('{id}', [TestimoniController::class, 'storeOrUpdate'])->name('testimoni.update');
            Route::get('{id}', [TestimoniController::class, 'edit'])->name('testimoni.edit');
            Route::delete('{id}', [TestimoniController::class, 'destroy'])->name('testimoni.destroy');
        });

        Route::post('logout', [AuthController::class, 'logout'])->name('logout');
    });
});
