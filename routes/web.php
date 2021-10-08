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

 
Route::get('/', 'HomeController@index');
Route::get('/home','HomeController@index'); 
 

Route::get('/clinic','HomeController@clinic')->name('clinic'); 
Route::get('/password_hash/{pass}', 'HomeController@password_hash')->name('password_hash'); 
Route::get('/admin/login/','HomeController@admin_login')->middleware('guest')->name('admin_login'); 
Route::get('/contact','HomeController@contact')->name('contact');
Route::get('/about','HomeController@about')->name('about');
Route::get('/pages/{id}','HomeController@pages')->name('pages');  
Route::get('/new_arrival','HomeController@new_arrival')->name('new_arrival');

//search
Route::get('/searchs','HomeController@searchs')->name('searchs');
Route::post('/posts/search','HomeController@post_search')->name('post_search');
Route::post('/products/search','HomeController@product_search')->name('product_search');

Route::get('stripe', 'StripePaymentController@stripe'); 
Route::post('stripe', 'StripePaymentController@stripePost')->name('stripe.post');

Route::get('/alluser','HomeController@alluser')->name('alluser');  
Route::get('/alladmin','HomeController@alladmin')->name('alladmin');
Route::get('/del_admin/{id}','HomeController@destroy_admin')->name('del_admin');
Route::get('/del_user/{id}','HomeController@destroy_user')->name('del_user');

Route::get('/category/{id}','HomeController@category')->name('category'); 
Route::get('/products/{id}/{slug}','HomeController@productsbycat')->name('products'); 
Route::get('/productsbycat/{id}','HomeController@productsbycat')->name('productsbycat');
Route::get('productbyid/{id}','HomeController@productbyid')->name('productbyid');
Route::get('/catlogue','HomeController@catlogue')->name('catlogue');
Route::post('/downloadcatlog','HomeController@downloadcatlog')->name('downloadcatlog');
Route::get('/download' ,'HomeController@download'); 

// Route::get('/admin', 'AdminController@admin')->middleware('is_admin')->name('admin');

Route::get('/new_products','ProductsController@create')->name('new_products');
Route::post('/products/store', 'ProductsController@store');
Route::get('/admin/productss','ProductsController@index')->name('productss'); 
Route::get('/product/{id}','ProductsController@show')->name('product');
Route::get('/product_edit/{pid}','ProductsController@edit')->name('product_edit');  
Route::put('/product/Update/{id}','ProductsController@update')->name('product_update'); 
Route::get('/del_img/{id}','ProductsController@del_img')->name('del_img'); 
Route::get('/del_product/{id}','ProductsController@destroy')->name('del_product'); 

Route::get('/importexport','ProductsController@importexport')->name('importexport');
Route::get('/producttocopy/{id}','ProductsController@producttocopy')->name('producttocopy'); 
    
Route::get('/admin', 'AdminController@dashboard')->name('admin');


// for post

Route::get('/posts/{id}/{slug}','PostController@postsbycat')->name('posts');
Route::get('/postsbycat/{id}','HomeController@post_by_subcategory')->name('postsbycat'); 
Route::get('/postbyid/{id}','HomeController@postbyid')->name('postbyid');
Route::get('/new_posts','PostController@create')->name('new_posts');
Route::post('/posts/store', 'PostController@store');
Route::get('/user/postss','PostController@index')->name('postss'); 
Route::get('/post/{id}','PostController@show')->name('post');
Route::get('/post_edit/{pid}','PostController@edit')->name('post_edit');  
Route::put('/post/Update/{id}','PostController@update')->name('post_update'); 
Route::get('/del_img/{id}','PostController@del_img')->name('del_img'); 
Route::get('/del_post/{id}','PostController@destroy')->name('del_post'); 

// CART Route 
Route::post('/add_to_cart' ,'CartController@add_to_cart')->name('add_to_cart'); 
Route::post('/update_cart/{id}' ,'CartController@update_cart')->name('update_cart');
Route::get('/cart' ,'CartController@cartview')->name('cart'); 
Route::get('/removecart/{id}' ,'CartController@removecart')->name('removecart'); 
Route::get('/checkout' ,'CartController@checkoutview')->name('checkout');  
Route::post('/order' ,'CartController@order')->name('order'); 
Route::get('/orderview' ,'CartController@orderview')->name('orderview'); 


//post in admin section
Route::get('/admin/posts','AdminController@index')->name('post_admin');
Route::get('/del_adminpost/{id}','AdminController@destroy')->name('del_adminpost');
 
Route::get('/new_events', 'EventsController@create')->name('new_events');
Route::get('/eventss', 'EventsController@index')->name('eventss');
Route::post('/events/store','EventsController@store');
Route::get('/events_edit/{id}','EventsController@edit')->name('events_edit');
Route::put('/event/update/{id}','EventsController@update')->name('update_event');
Route::get('/del_event/{id}','EventsController@destroy')->name('del_event');
Route::get('/newsevents','HomeController@newsevents')->name('newsevents');

Route::get('/cateogrypage/{id}', 'HomeController@categorypage')->name('categorypage');
Route::get('/new_categories', 'CategoryController@create')->name('new_categories');
Route::post('/category/store','CategoryController@store');
Route::get('/categories', 'CategoryController@index')->name('categories');
Route::get('/category_edit/{id}','CategoryController@edit')->name('category_edit');
Route::get('/sub_category/{id}','CategoryController@sub_category')->name('sub_category');
Route::get('/petsub_category/{id}','PetCategoryController@petsub_category')->name('petsub_category');
Route::put('/category/update/{id}','CategoryController@update')->name('category_update');
Route::get('/del_cat/{id}','CategoryController@destroy')->name('del_cat');

Route::get('/new_petcategories', 'PetcategoryController@create')->name('new_petcategories');
Route::post('/petcategory/store','PetcategoryController@store');
Route::get('/petcategories', 'PetcategoryController@index')->name('petcategories');
Route::get('/petcategory_edit/{id}','PetcategoryController@edit')->name('petcategory_edit');
Route::get('/sub_petcategory/{id}','PetcategoryController@sub_category')->name('sub_petcategory');
Route::put('/petcategory/update/{id}','PetcategoryController@update')->name('petcategory_update');
Route::get('/del_petcat/{id}','PetcategoryController@destroy')->name('del_petcat');


Route::get('/view_petsubcat/{id}','PetcategoryController@view_subcat')->name('view_petsubcat');
Route::get('/del_petsubcat/{catid}/{id}','PetcategoryController@del_subcat')->name('del_petsubcat');
Route::get('/petsubcat_edit/{catid}/{id}','PetcategoryController@subcat_edit')->name('petsubcat_edit');
Route::put('/update_petsubcat/{id}','PetcategoryController@update_subcat')->name('update_petsubcat');
Route::get('/new_petsubcat/{id}','PetcategoryController@new_subcat')->name('new_petsubcat');
Route::post('/store_petsubcat','PetcategoryController@store_subcat')->name('store_petsubcat');

Route::get('/new_page', 'PageController@create')->name('new_page');
Route::post('/page/store','PageController@store');
Route::get('/page', 'PageController@index')->name('page'); 
Route::get('/page_edit/{id}','PageController@edit')->name('page_edit'); 
Route::put('/page/update/{id}','PageController@update')->name('page_update');
Route::get('/del_page/{id}','PageController@destroy')->name('del_page'); 

Route::get('/centerss', 'CenterController@index')->name('centerss');
Route::get('/new_center', 'CenterController@create')->name('new_center'); 
Route::post('/centers/store','CenterController@store');
Route::get('/centers_edit/{id}','CenterController@edit')->name('centers_edit');
Route::put('/center/update/{id}','CenterController@update')->name('update_center');
Route::get('/del_center/{id}','CenterController@destroy')->name('del_center');

Route::get('/admin_relocation','CenterController@admin_relocation')->name('admin_relocation');
Route::get('/admin_del_relocation/{id}','CenterController@admin_del_relocation')->name('admin_del_relocation');
Route::get('/newscenters','HomeController@newsevents')->name('newscenters');  

//orders
Route::get('/orders', 'HomeController@allorders')->name('orders');
Route::get('/del_order/{id}','HomeController@destroy_order')->name('del_order');

//Pet Relocation
Route::get('/relocation', 'RelocationController@index')->name('relocation');
Route::get('/new_relocation', 'RelocationController@create')->name('new_relocation'); 
Route::post('/relocation/store','RelocationController@store');
Route::get('/relocation_edit/{id}','RelocationController@edit')->name('relocation_edit');
Route::put('/relocation/update/{id}','RelocationController@update')->name('update_relocation');
Route::get('/del_relocation/{id}','RelocationController@destroy')->name('del_relocation');

Route::get('/view_subcat/{id}','CategoryController@view_subcat')->name('view_subcat');
Route::get('/del_subcat/{catid}/{id}','CategoryController@del_subcat')->name('del_subcat');
Route::get('/subcat_edit/{catid}/{id}','CategoryController@subcat_edit')->name('subcat_edit');
Route::put('/update_subcat/{id}','CategoryController@update_subcat')->name('update_subcat');
Route::get('/new_subcat/{id}','CategoryController@new_subcat')->name('new_subcat');
Route::post('/store_subcat','CategoryController@store_subcat')->name('store_subcat');

Route::get('/new_banner','BannerController@create')->name('new_banner');
Route::post('banner/store','BannerController@store')->name('banner_store');
Route::get('/banners','BannerController@index')->name('banners');
Route::get('/banners_edit/{id}','BannerController@edit')->name('banner_edit');
Route::put('/banner/update/{id}','BannerController@update')->name('banner_update');
Route::get('/del_banner/{id}','BannerController@destroy')->name('del_banner');


Route::get('/blog_posts','HomeController@blog_posts')->name('blog_posts');
Route::get('/blog_post/{slug}','HomeController@blog_post')->name('blog_post');

Route::get('/new_blog','BlogController@create')->name('new_blog');
Route::post('blog/store','BlogController@store')->name('blog_store');
Route::get('/blogs','BlogController@index')->name('blogs');
Route::get('/blog_edit/{id}','BlogController@edit')->name('blog_edit');
Route::put('/blog/update/{id}','BlogController@update')->name('blog_update');
Route::get('/del_blog/{id}','BlogController@destroy')->name('del_blog');
Route::post('/blog/upload','BlogController@upload')->name('blog.upload'); 


Route::get('/new_media','MediaController@create')->name('new_media');
Route::post('media/store','MediaController@store')->name('media_store');
Route::get('/medias','MediaController@index')->name('medias');
Route::get('/media_edit/{id}','MediaController@edit')->name('media_edit');
Route::put('/media/update/{id}','MediaController@update')->name('media_update');
Route::get('/del_media/{id}','MediaController@destroy')->name('del_media');

Route::get('/new_pdf','CatlougueController@create')->name('new_pdf');
Route::post('pdf/store','CatlougueController@store')->name('pdf_store');
Route::get('/pdfs','CatlougueController@index')->name('pdfs');
Route::get('/pdf_edit/{id}','CatlougueController@edit')->name('pdf_edit');
Route::put('/pdf/update/{id}','CatlougueController@update')->name('pdf_update');
Route::get('/del_pdf/{id}','CatlougueController@destroy')->name('del_pdf'); 


Route::get('/product_by_subcategory/{id}','ProductsController@product_by_subcategory')->name('product_by_subcategory');
Route::POST('sort_banner','BannerController@sort_banner')->name('sort_banner');
Route::POST('sort_category','CategoryController@sort_category')->name('sort_category');
Route::POST('sort_about','AboutController@sort_about')->name('sort_about');
Route::POST('sort_subcategory','CategoryController@sort_subcategory')->name('sort_subcategory');
Route::POST('sort_products','ProductsController@sort_products')->name('sort_products'); 
Route::POST('sort_page','PageController@sort_page')->name('sort_page');
Route::POST('sort_media','MediaController@sort_media')->name('sort_media');
Route::POST('sort_event','EventsController@sort_event')->name('sort_event');
Route::POST('sort_center','CenterController@sort_center')->name('sort_center');
Route::POST('sort_blog','BlogController@sort_blog')->name('sort_blog');
Route::POST('sort_admin','HomeController@sort_admin')->name('sort_admin');
Route::POST('sort_user','HomeController@sort_user')->name('sort_user');
Route::POST('sort_user','HomeController@sort_user')->name('sort_user');
Route::POST('sort_petcategory','PetcategoryController@sort_petcategory')->name('sort_petcategory');
Route::POST('sort_petsubcategory','PetcategoryController@sort_petsubcategory')->name('sort_petsubcategory');
Route::POST('sort_posts','PostController@sort_posts')->name('sort_posts'); 


//admin all routes for request
 
Route::get('/requested_post', 'AdminController@requested_posts')->name('requested_post');
Route::get('/accepted_post', 'AdminController@accepted_posts')->name('accepted_post');
Route::get('/rejected_post', 'AdminController@rejected_posts')->name('rejected_post');
  
Route::get('/accept_post/{id}','AdminController@accept_post')->name('accept_post');
Route::get('/reject_post/{id}','AdminController@reject_post')->name('reject_post'); 
Route::get('/del_postss/{id}','AdminController@del_postss')->name('del_postss');


 
//Route::get('/', function () {    return view('welcome'); });


Route::prefix('admin')->namespace('Auth\Admin')->group(function(){
 
 Route::get('login', 'LoginController@showLoginForm')->name('admin.login');
 Route::post('login', 'LoginController@login');
 Route::post('logout', 'LoginController@logout')->name('admin.logout');

  if ($options['register'] ?? true) {
             Route::get('register', 'RegisterController@showRegistrationForm')->name('admin.register');
            Route::post('register', 'RegisterController@register');
        }
        
}); 

Route::prefix('admin')->namespace('Admin')->group(function(){ 
    Route::get('dashboard', 'DashboardController@index'); 
   });   

Route::prefix('user')->namespace('User')->group(function(){ 
    Route::get('dashboard', 'DashboardController@index'); 
   }); 


Auth::routes(); 
Route::get('/home', 'HomeController@index')->name('home');
