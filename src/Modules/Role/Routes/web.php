<?php

Route::get('setting_parent', array(
    'as' => 'setting_parent',
    'name' => 'Setting Parent',
    'icon' => '',
    'description' => 'Setting Parent',
    'is_active' => 1,
    'order_id' => 0,
    'wrap_group' => 'setting_parent',
    'wrap_group_level' => 'Settings'
));

Route::group(['prefix' => 'role'], function () {
	Route::get('/', [
	    'as' => 'role_index',
	    'uses' => 'RoleController@index',
	    'parent' => 'setting_parent',
	    'name' => 'Role List',
	    'icon' => '',
	    'description' => 'Role List',
	    'is_display' => 1,
	    'is_active' => 1,
	    'order_id' => 1,
	    'wrap_group' => 'Role',
	    'wrap_group_level' => 'Roles',
	]);
	Route::get('/create', [
	    'as' => 'role_create',
	    'uses' => 'RoleController@create',
	    'parent' => 'setting_parent',
	    'name' => 'Role Create',
	    'icon' => '',
	    'description' => 'Role Create',
	    'is_active' => 1,
	    'order_id' => 0,
	    'wrap_group' => 'Role',
	    'wrap_group_level' => 'Roles',
	]);
	Route::post('/create', [
	    'as' => 'role_create_store',
	    'uses' => 'RoleController@store',
	    'parent' => 'setting_parent',
	    'name' => 'Role Store',
	    'icon' => '',
	    'description' => 'Role Store',
	    'is_active' => 1,
	    'order_id' => 0,
	    'wrap_group' => 'Role',
	    'wrap_group_level' => 'Roles',
	]);
	Route::get('/edit/{id}', [
	    'as' => 'role_create_edit',
	    'uses' => 'RoleController@edit',
	    'parent' => 'setting_parent',
	    'name' => 'Role Edit',
	    'icon' => '',
	    'description' => 'Role Edit',
	    'is_active' => 1,
	    'order_id' => 0,
	    'wrap_group' => 'Role',
	    'wrap_group_level' => 'Roles',
	]);
	Route::post('/edit/{id}', [
	    'as' => 'role_create_update',
	    'uses' => 'RoleController@update',
	    'parent' => 'setting_parent',
	    'name' => 'Role Update',
	    'icon' => '',
	    'description' => 'Role Update',
	    'is_active' => 1,
	    'order_id' => 0,
	    'wrap_group' => 'Role',
	    'wrap_group_level' => 'Roles',
	]);
	Route::delete('/distroy/{id}', [
	    'as' => 'role_distroy',
	    'uses' => 'RoleController@distroy',
	    'parent' => 'setting_parent',
	    'name' => 'Role Delete',
	    'icon' => '',
	    'description' => 'Role Delete',
	    'is_active' => 1,
	    'order_id' => 0,
	    'wrap_group' => 'Role',
	    'wrap_group_level' => 'Roles',
	]);
	Route::get('/permission', [
	    'as' => 'role_permission',
	    'uses' => 'RolePermissionController@index',
	    'parent' => 'setting_parent',
	    'name' => 'Role Permission',
	    'icon' => '',
	    'description' => 'Role Permission',
	    'is_active' => 1,
	    'order_id' => 0,
	    'wrap_group' => 'Role',
	    'wrap_group_level' => 'Roles',
	]);
	Route::post('/permission', [
	    'as' => 'role_permission_store',
	    'uses' => 'RolePermissionController@setRoutePermission',
	    'parent' => 'setting_parent',
	    'name' => 'Role Permission store',
	    'icon' => '',
	    'description' => 'Role Permission store',
	    'is_active' => 1,
	    'order_id' => 0,
	    'wrap_group' => 'Role',
	    'wrap_group_level' => 'Roles',
	]);
});

Route::group(['prefix' => 'company'], function () {
	Route::get('/', [
	    'as' => 'company_index',
	    'uses' => 'CompanyController@index',
	    'parent' => 'setting_parent',
	    'name' => 'Company List',
	    'icon' => '',
	    'description' => 'Company List',
	    'is_display' => 1,
	    'is_active' => 1,
	    'order_id' => 1,
	    'wrap_group' => 'Company',
	    'wrap_group_level' => 'Companies',
	]);
	Route::get('/create', [
	    'as' => 'company_create',
	    'uses' => 'CompanyController@create',
	    'parent' => 'setting_parent',
	    'name' => 'Company Create',
	    'icon' => '',
	    'description' => 'Company Create',
	    'is_active' => 1,
	    'order_id' => 0,
	    'wrap_group' => 'Company',
	    'wrap_group_level' => 'Companies',
	]);
	Route::post('/create', [
	    'as' => 'company_create_store',
	    'uses' => 'CompanyController@store',
	    'parent' => 'setting_parent',
	    'name' => 'Company Store',
	    'icon' => '',
	    'description' => 'Company Store',
	    'is_active' => 1,
	    'order_id' => 0,
	    'wrap_group' => 'Company',
	    'wrap_group_level' => 'Companies',
	]);
	Route::get('/edit/{id}', [
	    'as' => 'company_create_edit',
	    'uses' => 'CompanyController@edit',
	    'parent' => 'setting_parent',
	    'name' => 'Company Edit',
	    'icon' => '',
	    'description' => 'Company Edit',
	    'is_active' => 1,
	    'order_id' => 0,
	    'wrap_group' => 'Company',
	    'wrap_group_level' => 'Companies',
	]);
	Route::post('/edit/{id}', [
	    'as' => 'company_create_update',
	    'uses' => 'CompanyController@update',
	    'parent' => 'setting_parent',
	    'name' => 'Company Update',
	    'icon' => '',
	    'description' => 'Company Update',
	    'is_active' => 1,
	    'order_id' => 0,
	    'wrap_group' => 'Company',
	    'wrap_group_level' => 'Companies',
	]);
	Route::delete('/distroy/{id}', [
	    'as' => 'company_distroy',
	    'uses' => 'CompanyController@distroy',
	    'parent' => 'setting_parent',
	    'name' => 'Delete Company',
	    'icon' => '',
	    'description' => 'Delete Company',
	    'is_active' => 1,
	    'order_id' => 0,
	    'wrap_group' => 'Company',
	    'wrap_group_level' => 'Companies',
	]);
});
