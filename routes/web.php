<?php

use App\Http\Controllers\GstController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RolesAndPermissionController;
use App\Models\PermissionModel;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Authenticate;
Route::get('/', function () {
    return view('auth.login');
});
Auth::routes();
Route::group(['middleware' => ['auth', 'web']], function() {
Route::get('/home',function(){
 return view('admin.common.main');
});

// ......................................................tax masters.............................................................................//


Route::controller(GstController::class)->group(function(){
    Route::get('gst', 'index');
    Route::get('gst-export', 'export')->name('gst.export')->middleware('can:export-gst');
});

Route::get('/tax-master-create' , function(){
    return view('admin.tax-master.tax-master-create');
})->middleware('can:add-gst');
Route::post('/tax-master-create', [App\Http\Controllers\GstController::class, 'storeGst'])->name('tax-master-create')->middleware('can:add-gst');
Route::get('/tax-master-show', [App\Http\Controllers\GstController::class, 'showGst'])->name('tax-master-show')->middleware('can:show-gst');
Route::get('/edit-tax-master/{id}' , [App\Http\Controllers\GstController::class, 'editGst'])->name('edit-tax-master');
Route::post('/update-tax-master/{id}' , [App\Http\Controllers\GstController::class, 'updateGst'])->middleware('can:edit-gst');
Route::get('/delete-tax-master/{id}' , [App\Http\Controllers\GstController::class, 'destroyGst'])->name('delete-tax-master')->middleware('can:delete-gst');

// ......................................................Menus.............................................................................//

Route::resource('Menus','App\Http\Controllers\MenuController');
Route::get('menu-list/{id}', 'App\Http\Controllers\MenuController@menuData');
Route::get('menu-index', 'App\Http\Controllers\MenuController@index');
Route::post('menu-list/upload','App\Http\Controllers\MenuController@upload');
Route::get('menu-order/{id}', 'App\Http\Controllers\MenuController@orderData')->name('menu.orderData');
Route::post('menu-sortable','App\Http\Controllers\MenuController@sortData');

// ......................................................Roles.............................................................................//

Route::get('/addRoles', function () {
    return view('admin.roles.addRoles');
})->name('addRoles');

Route::post('/storeRole', [App\Http\Controllers\RolesController::class, 'storeRole'])->name('addRoles');
Route::get('showRoles', [App\Http\Controllers\RolesController::class, 'showRole'])->name('show-role');
Route::get('/delete-role/{id}', [App\Http\Controllers\RolesController::class, 'destroyRole'])->name('delete-role');
Route::get('/edit-role/{id}', [App\Http\Controllers\RolesController::class, 'editRole'])->name('edit-role');
Route::post('/update-role/{id}', [App\Http\Controllers\RolesController::class, 'updateRole'])->name('update-role');

// ......................................................Permission.............................................................................//


Route::get('/addPermission', function () {
    return view('admin.permission.addPermission');
})->name('add-permission');

Route::get('/p', function () {
    $permission_data = PermissionModel::all();
    return view('admin.RolesAndPermission.partialFiles.partial', ['permission_data' => $permission_data]);
});

Route::post('/storePermission', [App\Http\Controllers\PermissionController::class, 'storePermission'])->name('add-permission');
Route::get('/showPermission', [App\Http\Controllers\PermissionController::class, 'showPermission'])->name('show-permission');
Route::get('/edit-permission/{id}', [App\Http\Controllers\PermissionController::class, 'editPermission'])->name('edit-permission');
Route::post('/update-permission/{id}', [App\Http\Controllers\PermissionController::class, 'updatePermission'])->name('update-permission');
Route::get('/delete-permission/{id}', [App\Http\Controllers\PermissionController::class, 'destroyPermission'])->name('delete-permission');


// send menus to the add permissions
Route::get('/addPermission', [App\Http\Controllers\PermissionController::class, 'sendMenu']);

// getting submenus according to menus
Route::get('/get-submenus/{menu_id}', [App\Http\Controllers\PermissionController::class, 'getSubmenus'])->name('get.submenus');

});



Route::get('/showroles_and_permission', [RolesAndPermissionController::class, 'showRP'])->name('showroles_and_permission');
Route::post('/showroles_and_permission', [RolesAndPermissionController::class, 'storeRolesAndPermission'])->name('showroles_and_permissions');

Route::get('/fetchPermission', [PermissionController::class, 'fetchPermission'])->name('fetchPermission');


?>