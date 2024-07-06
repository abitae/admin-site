<?php

use App\Http\Controllers\ProfileController;
use App\Livewire\Config\PermissionsLive;
use App\Livewire\Convenio\DetailCmLive;
use App\Livewire\Crm\ContactLive;
use App\Livewire\Crm\CustomerLive;
use App\Livewire\Config\RolesLive;
use App\Livewire\Config\UsersLive;
use App\Livewire\Convenio\AcuerdoMarcoLive;
use App\Livewire\Convenio\ImportProductLive;
use App\Livewire\Convenio\ProductLive as ProductCmLive; //Convenio Marco
use App\Livewire\Almacen\BrandLive;
use App\Livewire\Almacen\CategoryLive;
use App\Livewire\Almacen\LineLive;
use App\Livewire\Almacen\ProductLive;
use App\Livewire\Crm\DetailNegocioLive;
use App\Livewire\Crm\NegocioLive;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/users', UsersLive::class)->name('config.users');
    Route::get('/roles', RolesLive::class)->name('config.roles');
    Route::get('/permissions/{id}', PermissionsLive::class)->name('config.permissions');
});
Route::middleware('auth',)->group(function () {
    Route::get('/users', UsersLive::class)->name('config.users');
    Route::get('/roles', RolesLive::class)->name('config.roles');
    Route::get('/permissions/{id}', PermissionsLive::class)->name('config.permissions');
});
Route::middleware('auth')->group(function () {
    Route::get('/products', ProductLive::class)->name('almacen.products');
    Route::get('/brands', BrandLive::class)->name('almacen.brands');
    Route::get('/lines', LineLive::class)->name('almacen.lines');
    Route::get('/categories', CategoryLive::class)->name('almacen.categories');
});
Route::middleware('auth')->group(function () {
    Route::get('/acuerdos', AcuerdoMarcoLive::class)->name('convenio.acuerdos');
    Route::get('/products-data', ProductCmLive::class)->name('convenio.data');
    Route::get('/products-import', ImportProductLive::class)->name('convenio.import');
    Route::get('/detail/{id}', DetailCmLive::class)->name('convenio.detail');
});
Route::middleware('auth')->group(function () {
    Route::get('/customers', CustomerLive::class)->name('crm.customers');
    Route::get('/contacts', ContactLive::class)->name('crm.contacts');
    Route::get('/negocios', NegocioLive::class)->name('crm.negocios');
    Route::get('/detailcrm/{id}', DetailNegocioLive::class)->name('crm.detail');
    Route::get('/detailcrm', DetailNegocioLive::class)->name('crm.detailnew');
});
require __DIR__ . '/auth.php';
