<?php

use App\Http\Controllers\GstController;
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
Route::controller(GstController::class)->group(function(){
    Route::get('gst', 'index');
    Route::get('gst-export', 'export')->name('gst.export');
});

//.......................................................tax-master-gst..................................................................//
Route::get('/tax-master-create' , function(){
    return view('admin.tax-master.tax-master-create');
});
Route::post('/tax-master-create', [App\Http\Controllers\GstController::class, 'storeGst'])->name('tax-master-create');
Route::get('/tax-master-show', [App\Http\Controllers\GstController::class, 'showGst'])->name('tax-master-show');
Route::get('/edit-tax-master/{id}' , [App\Http\Controllers\GstController::class, 'editGst'])->name('edit-tax-master');
Route::post('/update-tax-master/{id}' , [App\Http\Controllers\GstController::class, 'updateGst']);
Route::get('/delete-tax-master/{id}' , [App\Http\Controllers\GstController::class, 'destroyGst'])->name('delete-tax-master');

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

});


?>