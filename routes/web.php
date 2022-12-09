<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/new-register', [App\Http\Controllers\WelcomeController::class, 'newRegister'])->name('newRegister');




Route::get('/', [App\Http\Controllers\WelcomeController::class, 'welcome'])->name('welcome');
Route::get('/about-us', [App\Http\Controllers\WelcomeController::class, 'aboutUs'])->name('aboutUs');
Route::get('/gallaries', [App\Http\Controllers\WelcomeController::class, 'gallary'])->name('gallary');
Route::get('/filter-gallaries', [App\Http\Controllers\WelcomeController::class, 'gallaryFilter'])->name('gallaryFilter');
Route::get('/categories', [App\Http\Controllers\WelcomeController::class, 'categorie'])->name('categorie');
Route::get('/categories/{id}', [App\Http\Controllers\WelcomeController::class, 'categorieDetails'])->name('categorieDetails');
Route::get('/filter-categories', [App\Http\Controllers\WelcomeController::class, 'categorieFilter'])->name('categorieFilter');
Route::get('/search-categories', [App\Http\Controllers\WelcomeController::class, 'categorieSearch'])->name('categorieSearch');
Route::get('/all-blogs', [App\Http\Controllers\WelcomeController::class, 'blogs'])->name('blogs');
Route::get('/search-blogs', [App\Http\Controllers\WelcomeController::class, 'blogSearch'])->name('blogSearch');
Route::get('/all-blogs/{id}', [App\Http\Controllers\WelcomeController::class, 'blogsDetails'])->name('blogsDetails');
Route::post('/submit-blogs-comments', [App\Http\Controllers\WelcomeController::class, 'submitBlogComment'])->name('submitBlogComment');
Route::get('/filter-blogs', [App\Http\Controllers\WelcomeController::class, 'blogsFilter'])->name('blogsFilter');
Route::get('/contact-us', [App\Http\Controllers\WelcomeController::class, 'contactUs'])->name('contactUs');
Route::post('/submit-contact-us', [App\Http\Controllers\WelcomeController::class, 'submitContactUs'])->name('submitContactUs');
Route::post('/submit-leads', [App\Http\Controllers\WelcomeController::class, 'submitLeads'])->name('submitLeads');
Route::get('/notifications', [App\Http\Controllers\WelcomeController::class, 'notifications'])->name('notifications');
Route::get('/read-notifications/{id}', [App\Http\Controllers\WelcomeController::class, 'readNotifications'])->name('readNotifications');






Route::get('/categorie-list', [App\Http\Controllers\MainController::class, 'categorieList'])->name('categorieList');
Route::post('/submit-categorie', [App\Http\Controllers\MainController::class, 'submitCategory'])->name('submitCategory');
Route::get('/edit-categorie', [App\Http\Controllers\MainController::class, 'editCategorieList'])->name('editCategorieList');
Route::get('/delete-categorie', [App\Http\Controllers\MainController::class, 'deleteCategorieList'])->name('deleteCategorieList');
Route::get('/profile', [App\Http\Controllers\MainController::class, 'profile'])->name('profile');
Route::post('/submit-profile', [App\Http\Controllers\MainController::class, 'submitProfile'])->name('submitProfile');


Route::get('/my-blogs', [App\Http\Controllers\MainController::class, 'myBlogs'])->name('myBlogs');
Route::get('/add-my-blogs', [App\Http\Controllers\MainController::class, 'addMyBlogs'])->name('addMyBlogs');
Route::post('/submit-my-blogs', [App\Http\Controllers\MainController::class, 'submitMyBlogs'])->name('submitMyBlogs');
Route::get('/edit-my-blogs/{id}', [App\Http\Controllers\MainController::class, 'editMyBlogs'])->name('editMyBlogs');
Route::get('/delete-my-blogs', [App\Http\Controllers\MainController::class, 'deleteMyBlogs'])->name('deleteMyBlogs');



Route::get('/my-galary', [App\Http\Controllers\MainController::class, 'myGallary'])->name('myGallary');
Route::post('/submit-my-galary', [App\Http\Controllers\MainController::class, 'submitMyGallary'])->name('submitMyGallary');
Route::get('/delete-my-galary', [App\Http\Controllers\MainController::class, 'deleteMyGallary'])->name('deleteMyGallary');


Route::get('/my-video', [App\Http\Controllers\MainController::class, 'myVideo'])->name('myVideo');
Route::post('/submit-my-video', [App\Http\Controllers\MainController::class, 'submitMyVideo'])->name('submitMyVideo');
Route::get('/delete-my-video', [App\Http\Controllers\MainController::class, 'deleteMyVideo'])->name('deleteMyVideo');



Auth::routes();


Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('userisvalid');
Route::get('/category-record/{id}', [App\Http\Controllers\HomeController::class, 'categoryRecords'])->name('categoryRecords')->middleware('userisvalid');
Route::get('/approve-category-record/{id}/{status}', [App\Http\Controllers\HomeController::class, 'approveCategoryRecords'])->name('approveCategoryRecords')->middleware('userisvalid');

Route::get('/add-new-category-record/{cat}', [App\Http\Controllers\HomeController::class, 'addNewCategoryRecord'])->name('addNewCategoryRecord')->middleware('userisvalid');
Route::post('/submit-new-category-record', [App\Http\Controllers\HomeController::class, 'submitNewCategoryRecord'])->name('submitNewCategoryRecord')->middleware('userisvalid');
Route::get('/all-gallary', [App\Http\Controllers\HomeController::class, 'allGallary'])->name('allGallary')->middleware('userisvalid');
Route::get('/all-gallary-approve/{id}/{status}', [App\Http\Controllers\HomeController::class, 'allGallaryApprove'])->name('allGallaryApprove')->middleware('userisvalid');
Route::get('/all-videos', [App\Http\Controllers\HomeController::class, 'allVideos'])->name('allVideos')->middleware('userisvalid');


Route::get('/all-leads', [App\Http\Controllers\HomeController::class, 'allLeads'])->name('allLeads')->middleware('userisvalid');
Route::get('/delete-leads', [App\Http\Controllers\HomeController::class, 'deleteLeads'])->name('deleteLeads')->middleware('userisvalid');


Route::get('/create-sub-admin', [App\Http\Controllers\HomeController::class, 'subAdmin'])->name('subAdmin')->middleware('userisvalid');
Route::post('/submit-sub-admin', [App\Http\Controllers\HomeController::class, 'submitSubAdmin'])->name('submitSubAdmin')->middleware('userisvalid');
Route::get('/delete-sub-admin', [App\Http\Controllers\HomeController::class, 'deleteSubAdmin'])->name('deleteSubAdmin')->middleware('userisvalid');
Route::get('/edit-sub-admin', [App\Http\Controllers\HomeController::class, 'editSubAdmin'])->name('editSubAdmin')->middleware('userisvalid');






Route::get('/testimonial-list', [App\Http\Controllers\TestimonialController::class, 'testimonialList'])->name('testimonialList')->middleware('userisvalid');
Route::get('/add-testimonial', [App\Http\Controllers\TestimonialController::class, 'addTestimonial'])->name('addTestimonial')->middleware('userisvalid');
Route::post('/submit-testimonial', [App\Http\Controllers\TestimonialController::class, 'submitTestimonial'])->name('submitTestimonial')->middleware('userisvalid');
Route::get('/edit-testimonial/{id}', [App\Http\Controllers\TestimonialController::class, 'editTestimonial'])->name('editTestimonial')->middleware('userisvalid');
Route::get('/delete-testimonial', [App\Http\Controllers\TestimonialController::class, 'deleteTestimonial'])->name('deleteTestimonial')->middleware('userisvalid');


Route::get('/blog-list', [App\Http\Controllers\BlogsController::class, 'blogList'])->name('blogList')->middleware('userisvalid');
Route::get('/add-blog', [App\Http\Controllers\BlogsController::class, 'addBlog'])->name('addBlog')->middleware('userisvalid');
Route::post('/submit-blog', [App\Http\Controllers\BlogsController::class, 'submitBlog'])->name('submitBlog')->middleware('userisvalid');
Route::get('/edit-blog/{id}', [App\Http\Controllers\BlogsController::class, 'editBlog'])->name('editBlog')->middleware('userisvalid');
Route::get('/delete-blog', [App\Http\Controllers\BlogsController::class, 'deleteBlog'])->name('deleteBlog')->middleware('userisvalid');



Route::get('/all-contacts', [App\Http\Controllers\ContactController::class, 'allContacts'])->name('allContacts')->middleware('userisvalid');
Route::get('/delete-contacts', [App\Http\Controllers\ContactController::class, 'deleteContacts'])->name('deleteContacts')->middleware('userisvalid');
Route::get('/notice', [App\Http\Controllers\ContactController::class, 'notice'])->name('notice')->middleware('userisvalid');
Route::get('/edit-notice', [App\Http\Controllers\ContactController::class, 'editNotice'])->name('editNotice')->middleware('userisvalid');
Route::get('/delete-notice', [App\Http\Controllers\ContactController::class, 'deleteNotice'])->name('deleteNotice')->middleware('userisvalid');
Route::post('/submit-notice', [App\Http\Controllers\ContactController::class, 'submitNotice'])->name('submitNotice')->middleware('userisvalid');
