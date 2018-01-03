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

// User Controller

Route::get('/', 'UserLoginController@index');
Route::post('/user-login-check', 'UserLoginController@user_login_check');

Route::get('/user/dashboard/{name}', 'WelcomeController@user_dashboard');
Route::get('/user-logout', 'WelcomeController@user_logout');
Route::get('/my-profile/{name}', 'WelcomeController@my_profile');
Route::post('/update-user-info', 'WelcomeController@update_user_info');
Route::get('/change-password/{name}', 'WelcomeController@change_password');
Route::post('/change-user-password', 'WelcomeController@change_user_password');
Route::get('/issued-book/{name}', 'WelcomeController@issued_book');

Route::get('/user-forgot-password', 'UserForgetPasswordController@index');
Route::post('/user-password-change', 'UserForgetPasswordController@user_password_change');

Route::get('/signup', 'UserSignUpController@index');
Route::get('/ajax-email-check/{id}', 'UserSignUpController@ajax_email_check');
Route::post('/save-user-details', 'UserSignUpController@save_user_details');


// Admin Controller


Route::get('/adminlogin', 'AdminLogInController@index');
Route::post('/admin-login-check', 'AdminLogInController@admin_login_check');


Route::get('/admin-dashboard', 'AdminDashBoardController@index');
Route::get('/admin-logout', 'AdminDashBoardController@admin_logout');

//Route::get('/change-password', 'AdminDashBoardController@admin_logout');



Route::get('/add-category', 'CategoryController@index');
Route::post('/add-category-info', 'CategoryController@add_category_info');
Route::get('/manage-category', 'CategoryController@manage_category');
Route::get('/edit-category/{id}', 'CategoryController@edit_category');
Route::post('/update-category-info', 'CategoryController@update_category_info');
Route::get('/category/delete/{id}', 'CategoryController@delete_category');

Route::get('/add-author', 'BooksAuthorController@index');
Route::post('/add-author-info', 'BooksAuthorController@add_author_info');
Route::get('/manage-authors', 'BooksAuthorController@manage_author');
Route::get('/edit-author/{id}', 'BooksAuthorController@edit_author');
Route::post('/update-author-info', 'BooksAuthorController@update_author_info');
Route::get('/author/delete/{id}', 'BooksAuthorController@delete_author');

Route::get('/add-shelf', 'BookShelfController@index');
Route::post('/add-shelf-info', 'BookShelfController@add_shelf_info');
Route::get('/manage-shelf', 'BookShelfController@manage_shelf');
Route::get('/edit-shelf/{id}', 'BookShelfController@edit_shelf');
Route::post('/update-shelf-info', 'BookShelfController@update_shelf_info');
Route::get('/shelf/delete/{id}', 'BookShelfController@delete_shelf');



Route::get('/add-book', 'BookMangaeController@index');
Route::get('/isbn-no-check/{id}', 'BookMangaeController@isbn_no_check');
Route::post('/add-book-info', 'BookMangaeController@add_book_info');
Route::get('/manage-books', 'BookMangaeController@manage_book');
Route::get('/edit-book/{id}', 'BookMangaeController@edit_book');
Route::post('/update-book-info', 'BookMangaeController@update_book_info');
Route::get('/book/delete/{id}', 'BookMangaeController@delete_book');


Route::get('/add-issued-book', 'IssuedBookController@index');
Route::post('/add-issued-book-info', 'IssuedBookController@add_issued_book_info');

Route::get('/studentsid-check/{id}', 'IssuedBookController@studentsid_check');

Route::get('/book-isbn-check/{id}', 'IssuedBookController@book_isbn_check');
Route::get('/manage-issued-books', 'IssuedBookController@manage_issued_books');
Route::get('/edit-issued-books/{id}', 'IssuedBookController@edit_issued_books');
Route::post('/update-return-isseud-book', 'IssuedBookController@update_return_isseud_book');



Route::get('/reg-students', 'StudentManageController@index');
Route::get('/block-user/{id}', 'StudentManageController@block_user');
Route::get('/unblock-user/{id}', 'StudentManageController@unblock_user');

Route::get('/change-password', 'AdminLogInController@change_password');
Route::post('/admin-password-change', 'AdminLogInController@admin_password_change');
