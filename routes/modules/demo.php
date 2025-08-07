<?php

use Illuminate\Support\Facades\Route;

// permission examples
Route::get('/permission-example', function () { return view('permission-example'); });
// API Documentation
Route::get('/rest-api', function () { return view('api'); }); 
// Editable Datatable
Route::get('/table-datatable-edit', function () { return view('pages.datatable-editable'); });

// Themekit demo pages
Route::get('/calendar', function () { return view('pages.calendar'); });
Route::get('/charts-amcharts', function () { return view('pages.charts-amcharts'); });
Route::get('/charts-chartist', function () { return view('pages.charts-chartist'); });
Route::get('/charts-flot', function () { return view('pages.charts-flot'); });
Route::get('/charts-knob', function () { return view('pages.charts-knob'); });
Route::get('/forgot-password', function () { return view('pages.forgot-password'); });
Route::get('/form-addon', function () { return view('pages.form-addon'); });
Route::get('/form-advance', function () { return view('pages.form-advance'); });
Route::get('/form-components', function () { return view('pages.form-components'); });
Route::get('/form-picker', function () { return view('pages.form-picker'); });
Route::get('/invoice', function () { return view('pages.invoice'); });
Route::get('/layout-edit-item', function () { return view('pages.layout-edit-item'); });
Route::get('/layouts', function () { return view('pages.layouts'); });

Route::get('/navbar', function () { return view('pages.navbar'); });
Route::get('/profile', function () { return view('pages.profile'); });
Route::get('/project', function () { return view('pages.project'); });
Route::get('/view', function () { return view('pages.view'); });

Route::get('/table-bootstrap', function () { return view('pages.table-bootstrap'); });
Route::get('/table-datatable', function () { return view('pages.table-datatable'); });
Route::get('/taskboard', function () { return view('pages.taskboard'); });
Route::get('/widget-chart', function () { return view('pages.widget-chart'); });
Route::get('/widget-data', function () { return view('pages.widget-data'); });
Route::get('/widget-statistic', function () { return view('pages.widget-statistic'); });
Route::get('/widgets', function () { return view('pages.widgets'); });

// themekit ui pages
Route::get('/alerts', function () { return view('pages.ui.alerts'); });
Route::get('/badges', function () { return view('pages.ui.badges'); });
Route::get('/buttons', function () { return view('pages.ui.buttons'); });
Route::get('/cards', function () { return view('pages.ui.cards'); });
Route::get('/carousel', function () { return view('pages.ui.carousel'); });
Route::get('/icons', function () { return view('pages.ui.icons'); });
Route::get('/modals', function () { return view('pages.ui.modals'); });
Route::get('/navigation', function () { return view('pages.ui.navigation'); });
Route::get('/notifications', function () { return view('pages.ui.notifications'); });
Route::get('/range-slider', function () { return view('pages.ui.range-slider'); });
Route::get('/rating', function () { return view('pages.ui.rating'); });
Route::get('/session-timeout', function () { return view('pages.ui.session-timeout'); });
Route::get('/pricing', function () { return view('pages.pricing'); });