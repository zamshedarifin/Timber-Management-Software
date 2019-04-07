<?php
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

Route::get('/','loginController@loginPage');
Route::get('logout','loginController@logout');
Route::get('dashboard','loginController@dashboard');
Route::get('Add-admin','loginController@roleSet');
Route::post('save-admin','loginController@SaveAdmin');

Route::post('login','loginController@submitLogin')->name('submit-login');
Route::get('round/','FrontEndController@round');
Route::get('square/','FrontEndController@square');
Route::get('Round-Lot','FrontEndController@roundlot');
Route::get('Square-Lot','FrontEndController@Squarelot');
Route::get('pro-sale','FrontEndController@proSalePage');
Route::post('product-sale','FrontEndController@productSaleSave')->name('product-sale');

Route::get('delete-lot/{id}','FrontEndController@Deletelot');
Route::get('price-lot/{id}','FrontEndController@LotPriceAdd');
Route::get('product-price','FrontEndController@productPrice')->name('product-price');
Route::Post('filter','FrontEndController@filterBtn')->name('filter-btn');
Route::post('/Roundinsert','FrontEndController@roundinsert')->name('save-data');
Route::post('/Squareinsert','FrontEndController@SquareInsert')->name('square-save');
Route::post('/price','FrontEndController@savePrice')->name('save-price');
Route::get('search','FrontEndController@search');

Route::post('save-supplier', 'SupplierController@saveSupplier')->name('save-supplier');
Route::post('save-customer', 'SupplierController@saveCustomer')->name('save-customer');
Route::get('supplier','SupplierController@supplierList');
Route::get('customer','SupplierController@customerList');

Route::get('all-lot','dashboardController@allLot');
Route::get('all-supplier','dashboardController@allSupplier');
Route::get('all-customer','dashboardController@allcustomer');


Route::get('view-supplier/{id}','dashboardController@viewSupplier');
Route::get('delete-supplier/{id}','dashboardController@deleteSupplier');
Route::get('edit-supplier/{id}','dashboardController@editsupplier');
Route::post('Save-edit-supplier/{id}','dashboardController@editSavesupplier');
Route::get('view-customer/{id}','dashboardController@viewCustomer');
Route::get('edit-customer/{id}','dashboardController@editCustomer');
Route::post('Save-edit-customer/{id}','dashboardController@editCustomersave');
Route::get('delete-customer/{id}','dashboardController@deleteCustomer');

Route::get('account-report','dashboardController@accountReport');
Route::get('Expence','dashboardController@expence');
Route::get('Expence-list','dashboardController@expencelist');
Route::get('edit-expence/{id}','dashboardController@editexpence');
Route::get('delete-expence/{id}','dashboardController@deleteexpence');


Route::get('Product-List','dashboardController@productList');
Route::get('edit-product/{id}','dashboardController@editproduct');
Route::post('Save-edit-product/{id}','dashboardController@saveEditProduct');
Route::get('delete-product/{id}','dashboardController@deleteproduct');



Route::get('Sales-Report','dashboardController@salesReport');
Route::get('note','dashboardController@note');
Route::get('delete-note/{id}','dashboardController@Deletenote');


Route::get('Create-Tree','dashboardController@AddTreePage');
Route::get('Create-Expance-Category','dashboardController@AddExCatPage');

Route::get('show-sale-details/{id}','dashboardController@ShowSalesdetails');

Route::post('save-expanse','dashboardController@saveExpanse')->name('save.expanse');
Route::post('edit-expanse/{id}','dashboardController@editsaveExpanse');
Route::post('save-note','dashboardController@saveNote')->name('save.note');
Route::post('save-tree','dashboardController@saveTree')->name('save.tree');
Route::post('save-expansecategory','dashboardController@saveexpansecategory')->name('save.expansecategory');


Route::get('delete-sale/{id}','dashboardController@deleteSale');


Route::get('edit-lot/{id}','dashboardController@editLot');
Route::get('delete-lot/{id}','dashboardController@deleteLot');


Route::post('sale-payment/{id}','CalculationController@salePayment');
Route::post('lot-payment/{id}','CalculationController@lotPayment');



//search


Route::get('search.sales','CalculationController@searchSales');
Route::get('search.price','CalculationController@searchprice');
Route::get('search.lot','CalculationController@searchlot');
Route::get('search.onlylot','CalculationController@onlylot');
Route::get('search.saleReport','CalculationController@searchSalesReport');
Route::get('search.proCode','CalculationController@searchproCode');
Route::get('search.totalsale','CalculationController@searchTotalsale');
Route::get('search.due','CalculationController@searchDue');
Route::get('search.expance','CalculationController@searchExpance');
Route::get('search.expancelist','CalculationController@searchexpancelist');
Route::get('search.profit','CalculationController@searchprofit');
Route::get('search.customer','CalculationController@searchcustomer');
Route::get('search.supplier','CalculationController@searchsupplier');



Route::get('pdf/{id}','invoicePrintController@printPdf');



