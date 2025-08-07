<?php

use Illuminate\Support\Facades\Route;

// new inventory routes
Route::get('/inventory', function () { return view('inventory.dashboard'); });
Route::get('/pos', function () { return view('inventory.pos'); });
Route::get('/products', function () { return view('inventory.product.list'); });
Route::get('/products/create', function () { return view('inventory.product.create'); }); 
Route::get('/categories', function () { return view('inventory.category.index'); }); 
Route::get('/sales', function () { return view('inventory.sale.list'); });
Route::get('/sales/create', function () { return view('inventory.sale.create'); }); 
Route::get('/purchases', function () { return view('inventory.purchase.list'); });
Route::get('/purchases/create', function () { return view('inventory.purchase.create'); }); 
Route::get('/customers', function () { return view('inventory.people.customers'); }); 
Route::get('/suppliers', function () { return view('inventory.people.suppliers'); }); 