<?php

use Illuminate\Support\Facades\Route;

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


Route::get('/', 'HomeController@index');

Auth::routes();
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');


//Route Admin
Route::get('/shopwatch.com/admin', 'HomeController@index');

Route::prefix('/shopwatch.com/admin/product')->middleware('can:act-product')->group(function(){
	Route::get('/', 'ProductController@index');
	Route::get('/add-product', 'ProductController@formAdd_Product');
	Route::post('/add-product', 'ProductController@add_Product');
	Route::get('/edit-product/{id}', 'ProductController@formEdit_Product');
	Route::post('/update-product/{id}', 'ProductController@update_Product');
	Route::get('/delete-product/{id}', 'ProductController@delete_Product');
	Route::get('/description/{id}', 'ProductController@formDescription');
	Route::post('/description/{id}', 'ProductController@description_Product');
});

Route::prefix('/shopwatch.com/admin/staff')->middleware('can:act-staff')->group(function(){
	Route::get('/', 'StaffController@index');
	Route::get('/add-staff', 'StaffController@formAdd_Staff');
	Route::post('/add-staff', 'StaffController@add_Staff');
	Route::get('/edit-staff/{id}', 'StaffController@formEdit_Staff');
	Route::post('/update-staff/{id}', 'StaffController@update_Staff');
	Route::get('/delete-staff/{id}', 'StaffController@delete_Staff');
});

Route::prefix('/shopwatch.com/admin/brand')->middleware('can:act-brand')->group(function(){
	Route::get('/', 'BrandController@index');
	Route::post('/add-brand', 'BrandController@add_Brand');
	Route::get('/edit-brand/{id}', 'BrandController@edit_Brand');
	Route::post('/update-brand/{id}', 'BrandController@update_Brand');
	Route::get('/delete-brand/{id}', 'BrandController@delete_Brand');
});

Route::prefix('/shopwatch.com/admin/sell')->middleware('can:act-sell')->group(function(){
	Route::get('/', 'SellController@index');
	Route::get('/all', 'SellController@indexAllProduct');
	Route::get('/brand', 'SellController@indexAllBrand');
	Route::get('/product/brand/{id}', 'SellController@indexAllProductByIDBrand');
	Route::get('/product/sort/high-to-low', 'SellController@indexAllProductSortHighToLow');
	Route::get('/product/sort/low-to-high', 'SellController@indexAllProductSortLowToHigh');
	Route::get('/product/search', 'SellController@indexAllProductSearch');
	Route::get('/addtocart/product/{id}', 'SellController@getProductByID');
	Route::get('/payment/saveOrder', 'SellController@saveOrder');
	Route::get('/payment/saveProductOrder', 'SellController@saveProductOrder');
	Route::get('/payment/saveBill', 'SellController@saveBill');
	Route::get('/payment/checkAmountOfProduct', 'SellController@checkAmountOfProduct');
});

Route::prefix('/shopwatch.com/admin/bill_sell')->middleware('can:act-bill_sell')->group(function(){
	Route::get('/', 'BillSellController@index');
	Route::get('/view_bill/{id}', 'BillSellController@viewBillByIdOrder');
	Route::get('/view_bill_product/{id}', 'BillSellController@viewBillProductByIdOrder');
	Route::get('/search', 'BillSellController@searchBill');
	Route::get('/purchase_form', 'BillSellController@purchaseForm');
	Route::get('/status_bill', 'BillSellController@statusBill');
	Route::get('/all_time', 'BillSellController@getAllBill');
	Route::get('/datetime', 'BillSellController@getBillByDateTime');
	Route::get('/filter_by_date', 'BillSellController@filterByDate');
	Route::post('/delete_bill_sell', 'BillSellController@deleteBillSell');
});

Route::prefix('/shopwatch.com/admin/votes_collect')->middleware('can:act-votes_collect')->group(function(){
	Route::get('/', 'VotesCollectController@index');
	Route::get('/view_votes_collect/{id}', 'VotesCollectController@ViewVotesCollectByIdBill');
	Route::get('/search', 'VotesCollectController@searchVotesCollect');
	Route::get('/categories_votes_collect', 'VotesCollectController@categoriesVotesCollect');
	Route::get('/all_time', 'VotesCollectController@getAllVotesCollect');
	Route::get('/datetime', 'VotesCollectController@getVotesCollectByDateTime');
	Route::get('/filter_by_date', 'VotesCollectController@filterByDate');
	Route::get('/get_categories_votes_collect', 'VotesCollectController@getCategoriesVotesCollect');
	Route::get('/get_datetime_votes_collect', 'VotesCollectController@getDateTimeVotesCollect');
	Route::get('/search_supplier', 'VotesCollectController@searchSupplier');
	Route::get('/choose_supplier', 'VotesCollectController@chooseSupplier');
	Route::get('/add_categories', 'VotesCollectController@addCategories');
	Route::post('/add_votes_collect', 'VotesCollectController@addVotesCollect');
	Route::get('/edit_votes_collect/{id}', 'VotesCollectController@editVotesCollect');
	Route::post('/update_votes_collect', 'VotesCollectController@updateVotesCollect');
	Route::post('/delete_votes_collect', 'VotesCollectController@deleteVotesCollect');
});

Route::prefix('/shopwatch.com/admin/warehouse')->middleware('can:act-warehouse')->group(function(){
	Route::prefix('/import_goods')->group(function(){
		Route::get('/', 'ImportGoodsController@index');
		Route::get('/view_detail_import_goods/{id}', 'ImportGoodsController@viewDetailImportGoods');
		Route::get('/view_product_import_goods/{id}', 'ImportGoodsController@viewProductImportGoods');
		Route::get('/search', 'ImportGoodsController@searchImportGoods');
		Route::get('/status_import_goods', 'ImportGoodsController@statusImportGoods');
		Route::get('/all_time', 'ImportGoodsController@getAllImportGoods');
		Route::get('/datetime', 'ImportGoodsController@getImportGoodsByDateTime');
		Route::get('/filter_by_date', 'ImportGoodsController@filterByDate');
		Route::get('/add-import-goods', 'ImportGoodsController@formAdd_ImportGoods');
		Route::get('/search_supplier', 'ImportGoodsController@searchSupplier');
		Route::get('/search_product', 'ImportGoodsController@searchProduct');
		Route::get('/choose_supplier', 'ImportGoodsController@chooseSupplier');
		Route::get('/add_product/{id}', 'ImportGoodsController@addProduct_ImportGoods');
		Route::get('/save_import_goods', 'ImportGoodsController@saveImportGoods');
		Route::get('/save_product_import', 'ImportGoodsController@saveProductImport');
		Route::get('/confirm_import_goods', 'ImportGoodsController@confirmImportGoods');
		Route::get('/update_product', 'ImportGoodsController@updateProduct');
		Route::get('/update_supplier', 'ImportGoodsController@updateSupplier');
		Route::get('/edit-import-goods/{id}', 'ImportGoodsController@formEdit_ImportGoods');
		Route::get('/update_amount_of_product_after_remove_product', 'ImportGoodsController@updateAmountOfProductAfterRemoveProduct');
		Route::get('/save_edit_import_goods', 'ImportGoodsController@saveEditImportGoods');
		Route::get('/confirm_edit_import_goods', 'ImportGoodsController@confirmEditImportGoods');		
		Route::get('/update_product_after_update_import_goods', 'ImportGoodsController@updateProductAfterUpdateImportGoods');
		Route::get('/update_supplier_after_update_import_goods', 'ImportGoodsController@updateSupplierAfterUpdateImportGoods');
		Route::get('/save_edit_product_import', 'ImportGoodsController@saveEditProductImport');
		Route::get('/get_product_import_by_id_import_goods', 'ImportGoodsController@getProductImportByIdImportGoods');
		Route::get('/cancel_import_goods', 'ImportGoodsController@cancelImportGoods');
		Route::get('/update_product_after_cancel_import_goods', 'ImportGoodsController@updateProductAfterCancelImportGoods');
		Route::get('/update_supplier_after_cancel_import_goods', 'ImportGoodsController@updateSupplierAfterCancelImportGoods');	
		Route::get('/delete_import_goods', 'ImportGoodsController@deleteImportGoods');					
	});
});

Route::prefix('/shopwatch.com/admin/votes_pay')->middleware('can:act-votes_pay')->group(function(){
	Route::get('/', 'VotesPayController@index');
	Route::get('/view_votes_pay/{id}', 'VotesPayController@ViewVotesPayByIdVotesPay');
	Route::get('/search', 'VotesPayController@searchVotesPay');
	Route::get('/categories_votes_pay', 'VotesPayController@categoriesVotesPay');
	Route::get('/all_time', 'VotesPayController@getAllVotesPay');
	Route::get('/datetime', 'VotesPayController@getVotesPayByDateTime');
	Route::get('/filter_by_date', 'VotesPayController@filterByDate');
	Route::get('/get_categories_votes_pay', 'VotesPayController@getCategoriesVotesPay');
	Route::get('/get_datetime_votes_pay', 'VotesPayController@getDateTimeVotesPay');
	Route::get('/search_supplier', 'VotesPayController@searchSupplier');
	Route::get('/choose_supplier', 'VotesPayController@chooseSupplier');
	Route::get('/add_categories', 'VotesPayController@addCategories');
	Route::post('/add_votes_pay', 'VotesPayController@addVotesPay');
	Route::get('/edit_votes_pay/{id}', 'VotesPayController@editVotesPay');
	Route::post('/update_votes_pay', 'VotesPayController@updateVotesPay');
	Route::post('/delete_votes_pay', 'VotesPayController@deleteVotesPay');
});

Route::prefix('/shopwatch.com/admin/supplier')->middleware('can:act-supplier')->group(function(){
	Route::get('/', 'SupplierController@index');
	Route::get('/add-supplier', 'SupplierController@formAdd_Supplier');
	Route::post('/add-supplier', 'SupplierController@add_Supplier');
	Route::get('/edit-supplier/{id}', 'SupplierController@formEdit_Supplier');
	Route::post('/update-supplier/{id}', 'SupplierController@edit_Supplier');
	Route::get('/delete-supplier/{id}', 'SupplierController@delete_Supplier');
	Route::get('/view_supplier/{id}', 'SupplierController@viewSupplierById');
	Route::get('/transaction_history/{id}', 'SupplierController@transactionHistory');
	Route::get('/debt_book/{id}', 'SupplierController@debtBook');
});

//Route web
Route::prefix('/shopwatch.com')->group(function(){
	Route::get('/', 'HomeWebController@index');
	Route::get('/login', 'LoginController@index');
	Route::get('/brand/{id}', 'BrandController@indexWeb');
	Route::get('/product_detail', 'Product_DetailController@index');
	Route::get('/checkout', 'CheckoutController@index');
	Route::get('/cart', 'CartController@index');
	Route::get('/contact', 'ContactController@index');
	Route::get('/blog_list', 'BlogListController@index');
	Route::get('/blog_single', 'BlogSingleController@index');
});
	
Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
	\UniSharp\LaravelFilemanager\Lfm::routes();
});