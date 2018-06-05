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

use Illuminate\Support\Facades\Route;


//backend actions


Route::get('dashboard','AdminController@showDashboard')->name('showDashboard');

Route::get('createAdmin','AdminController@showAdmin')->name('showAdmin');
Route::post('createAdmin','AdminController@createAdmin')->name('createAdmin');
Route::get('deleteAdmin/{id}','AdminController@deleteAdmin')->name('deleteAdmin');
Route::get('editAdmin/{id}','AdminController@editAdmin')->name('editAdmin');
Route::post('updateAdmin/{id}','AdminController@updateAdmin')->name('updateAdmin');

Route::get('adminPasswordChange/{id}','AdminController@adminPasswordChange')->name('adminPasswordChange');
Route::post('updateAdminPassword/{id}','AdminController@updateAdminPassword')->name('updateAdminPassword');


Route::get('approveAdmin/{id}','AdminController@approveAdmin')->name('approveAdmin');
Route::get('suspendAdmin/{id}','AdminController@suspendAdmin')->name('suspendAdmin');
Route::get('deleteAdmin/{id}','AdminController@deleteAdmin')->name('deleteAdmin');



Route::get('adminLogin','AuthController@showAdminLogin')->name('showAdminLogin');
Route::post('adminLogin','AuthController@adminLogin')->name('adminLogin');
Route::get('adminLogout','AuthController@adminLogout')->name('adminLogout');

//admin password resetting
Route::get('showForgottentForm','AuthController@showForgottentForm')->name('showForgottentForm');
Route::post('adminPasswordReset','AuthController@adminPasswordReset')->name('adminPasswordReset');




//post section in admin panel
Route::get('postList','AdminController@postList')->name('postList');
Route::get('postApprove/{id}','AdminController@postApprove')->name('postApprove');
Route::get('postPending/{id}','AdminController@postPending')->name('postPending');
Route::get('postDelete/{id}','AdminController@postDelete')->name('postDelete');

//manuscript section in admin panel
Route::get('manuscriptList','AdminController@manuscriptList')->name('manuscriptList');
Route::get('manuscriptDelete/{id}','AdminController@manuscriptDelete')->name('manuscriptDelete');

//user modification in admin panel start
Route::get('showUserList','AdminController@showUserList')->name('showUserList');
Route::get('userApprove/{id}','AdminController@userApprove')->name('userApprove');
Route::get('userSuspend/{id}','AdminController@userSuspend')->name('userSuspend');
Route::get('userDelete/{id}','AdminController@userDelete')->name('userDelete');
Route::get('userRecycle/{id}','AdminController@userRecycle')->name('userRecycle');

//user writing category in admin panel start
Route::get('createMonthCategory','CategoryController@showCategoryForm')->name('showCategoryForm');
Route::post('createMonthCategory','CategoryController@createMonthCategory')->name('createMonthCategory');

Route::get('categorySelected/{id}','CategoryController@categorySelected')->name('categorySelected');
Route::get('categoryDelete/{id}','CategoryController@categoryDelete')->name('categoryDelete');
Route::get('categoryEdit/{id}','CategoryController@categoryEdit')->name('categoryEdit');
Route::post('updateMonthCategory/{id}','CategoryController@updateMonthCategory')->name('updateMonthCategory');

//user  month wise doc in admin panel start
Route::get('documentShow','AdminController@documentShow')->name('documentShow');
Route::get('monthWiseDocDelete/{id}','AdminController@monthWiseDocDelete')->name('monthWiseDocDelete');
//footer text
Route::get('createFooter','FooterController@createFooterForm')->name('createFooterForm');
Route::post('createFooter','FooterController@createFooter')->name('createFooter');

Route::get('footerPublished/{id}','FooterController@footerPublished')->name('footerPublished');
Route::get('footerDelete/{id}','FooterController@footerDelete')->name('footerDelete');
Route::get('footerEdit/{id}','FooterController@footerEdit')->name('footerEdit');
Route::post('updateFooter/{id}','FooterController@footerUpdate')->name('updateFooter');



//fontend actions

Route::get('/','UserController@showHome')->name('showHome');

Route::get('createUser','UserController@showUser')->name('showUser');
Route::post('createUser','UserController@createUser')->name('createUser');
Route::get('editUser/{id}','UserController@editUser')->name('editUser');
Route::post('updateUser/{id}','UserController@updateUser')->name('updateUser');
Route::post('updateUserPhoto/{id}','UserController@updateUserPhoto')->name('updateUserPhoto');

//use verify
Route::get('userVerify/{token}','UserController@userVerify')->name('userVerify');


Route::get('userPasswordResetting','AuthController@userPasswordResettingForm')->name('userPasswordResettingForm');
Route::post('userPasswordResetting','AuthController@userPasswordResetting')->name('userPasswordResetting');



Route::get('userProfile','UserController@UserProfile')->name('userProfile');



Route::get('userLogin','AuthController@showUserLogin')->name('showUserLogin');
Route::post('userLogin','AuthController@userLogin')->name('userLogin');
Route::get('userLogout','AuthController@userLogout')->name('userLogout');


//Adds section start
Route::get('createLeftAdds','AddsController@formLeftAdds')->name('formLeftAdds');
Route::post('createLeftAdds','AddsController@createLeftAdds')->name('createLeftAdds');
Route::get('createRightAdds','AddsController@formRightAdds')->name('formRightAdds');
Route::post('createRightAdds','AddsController@createRightAdds')->name('createRightAdds');



Route::get('leftAddsUnpublished/{id}','AddsController@leftAddsUnpublished')->name('leftAddsUnpublished');
Route::get('leftAddsPublished/{id}','AddsController@leftAddsPublished')->name('leftAddsPublished');
Route::get('leftAddsDelete/{id}','AddsController@leftAddsDelete')->name('leftAddsDelete');
Route::get('leftAddsEdit/{id}','AddsController@leftAddsEdit')->name('leftAddsEdit');
Route::post('leftAddsUpdate/{id}','AddsController@leftAddsUpdate')->name('leftAddsUpdate');

Route::get('rightAddsUnpublished/{id}','AddsController@rightAddsUnpublished')->name('rightAddsUnpublished');
Route::get('rightAddsPublished/{id}','AddsController@rightAddsPublished')->name('rightAddsPublished');
Route::get('rightAddsDelete/{id}','AddsController@rightAddsDelete')->name('rightAddsDelete');
Route::get('rightAddsEdit/{id}','AddsController@rightAddsEdit')->name('rightAddsEdit');
Route::post('rightAddsUpdate/{id}','AddsController@rightAddsUpdate')->name('rightAddsUpdate');


//user post section start
Route::get('createPost','PostController@formPost')->name('formPost');
Route::post('createPost','PostController@createPost')->name('createPost');
Route::get('detailsPost/{id}','PostController@detailsPost')->name('detailsPost');

//user manuscript section start
Route::get('createManuscript','ManuscriptController@formManuscript')->name('formManuscript');
Route::post('createManuscript','ManuscriptController@createManuscript')->name('createManuscript');

//user comment section start

Route::post('createComment','CommentController@createComment')->name('createComment');

//user month wise doc
Route::get('monthWiseDoc','DocumentController@showDocumentForm')->name('showDocumentForm');
Route::post('createMonthWiseDoc','DocumentController@createMonthWiseDoc')->name('createMonthWiseDoc');
