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

Route::get('/', 'FrontendController@index')->name('front');
Route::get('/all-products', 'FrontendController@all_products')->name('all.products');
Route::get('/main-category/{id}', 'FrontendController@main_category_products')->name('main.category.products');
Route::get('/middle-category/{id}', 'FrontendController@middle_category_products')->name('mid.category.products');
Route::get('/end-category/{id}', 'FrontendController@end_category_products')->name('end.category.products');
Route::get('/about-us', 'FrontendController@about_us')->name('about.us');
Route::get('/blogs', 'FrontendController@blogs')->name('blogs');
Route::get('/blog-details/{id}', 'FrontendController@blog_details')->name('blog.details');
Route::post('/blog-comment-save', 'FrontendController@blog_comment_save')->name('blog.comment.save');
Route::get('/blog-search', 'FrontendController@blog_search')->name('search.blog');
Route::get('/blog-category/{id}', 'FrontendController@blog_category_view')->name('blog.category.view');
Route::get('/contact-us', 'FrontendController@contact_us')->name('contact.us');
Route::get('/product-details/{id}', 'FrontendController@product_details')->name('product.details');
Route::post('/add-to-cart-single', 'FrontendController@add_to_cart_single')->name('add.to.cart.single');
Route::get('/add-to-cart-single-delete/{id}', 'FrontendController@add_to_cart_single_delete')->name('add.to.cart.delete.single');
Route::post('/my-cart-update', 'FrontendController@my_cart_update')->name('mycart.update');
Route::get('/cart-details', 'FrontendController@cart_details')->name('my.cart');
Route::get('/privacy-policy', 'FrontendController@privacy_policy')->name('privacy.policy');
Route::get('/terms-condition', 'FrontendController@terms_condition')->name('terms.condition');
Route::post('/news-latter-save', 'FrontendController@news_later_save')->name('user.newslatter.save');
Route::post('/contact-us-save', 'FrontendController@contact_us_save')->name('contactus.save');
Route::post('/product-review-save', 'FrontendController@product_review_save')->name('product.review.save');
Route::get('/search-product', 'FrontendController@search_product')->name('search.product');
Route::get('/today-offer', 'FrontendController@today_offer')->name('today.offer');


//frontend filter
Route::post('/product-filters', 'FrontendFilterController@product_filtes')->name('get_filter_alls_product');
Route::get('/product-filters', 'FrontendFilterController@product_filtes_get');
Route::post('/product-filters-get-main-cat', 'FrontendFilterController@product_filtes_get_main_cat')->name('get.maincat');
Route::post('/product-filters-get-sub-cat', 'FrontendFilterController@product_filtes_get_sub_cat')->name('get.subcat');
Route::post('/product-filters-get-sub-sub-cat', 'FrontendFilterController@product_filtes_get_sub_sub_cat')->name('get.subsubcat');


//social login
Route::get('/auth/redirect/{provider}', 'SocialController@redirect');
Route::get('/callback/{provider}', 'SocialController@callback');


//forgot password
Route::get('/forgot-password', 'VisitorController@forgot_password')->name('forgot.password');
Route::post('/forgot-password-submit', 'VisitorController@forgot_password_submit')->name('forgot.password.submit');
Route::get('/resetpassword/{code}', 'VisitorController@forgot_password_verify')->name('forgot.password.verify');
Route::post('/forgot-password-reset-save', 'VisitorController@forgot_password_reset_save')->name('forgot.password.reset.save');


//custom register
Route::post('/user-custom-register', 'CustomLoginController@custom_register')->name('user.custom.register');
Route::get('/account-verify-check/{code}', 'CustomLoginController@user_account_verify')->name('user.account.verify.check');



Auth::routes();





Route::prefix('admin')->group(function (){
    Route::get('/login', 'Auth\AdminLoginController@showLoginform')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
});


Route::group(['middleware' => ['auth:admin']], function() {
    Route::prefix('admin')->group(function() {
        Route::get('/', 'Admin\AdminController@index')->name('admin.dashboard');

        //general settings
        Route::get('/general-settings', 'Admin\AdminController@general_settings')->name('admin.general.settings');
        Route::post('/genera-settings-update', 'Admin\AdminController@general_settings_update')->name('admin.general.settings.update');


        //profile
        Route::get('/profile', 'Admin\AdminController@profile')->name('admin.profile');
        Route::post('/profile-update', 'Admin\AdminController@profile_update')->name('admin.profile.update');

        //change password
        Route::get('/change-password', 'Admin\AdminController@change_password')->name('admin.change.password');
        Route::post('/change-password-save', 'Admin\AdminController@change_password_save')->name('admin.password.update');




        //top category
        Route::get('/top-category', 'Admin\AdminCategoryController@top_category')->name('admin.top.category');
        Route::post('/top-category-save', 'Admin\AdminCategoryController@top_category_save')->name('admin.save.topcategory');
        Route::post('/top-category-update', 'Admin\AdminCategoryController@top_category_update')->name('admin.update.topcategory');
        Route::post('/top-category-delete', 'Admin\AdminCategoryController@top_category_delete')->name('admin.delete.topcategory');

        //middle category
        Route::get('/middle-category', 'Admin\AdminCategoryController@middle_category')->name('admin.middle.category');
        Route::post('/middle-category-save', 'Admin\AdminCategoryController@middle_category_save')->name('admin.save.middlecategory');
        Route::post('/middle-category-update', 'Admin\AdminCategoryController@middle_category_update')->name('admin.update.middlecategory');
        Route::post('/middle-category-delete', 'Admin\AdminCategoryController@middle_category_delete')->name('admin.delete.middlecategory');


        //end category
        Route::get('/end-category', 'Admin\AdminCategoryController@end_category')->name('admin.end.category');
        Route::post('/end-category-save', 'Admin\AdminCategoryController@end_category_save')->name('admin.save.endcategory');
        Route::post('/end-category-update', 'Admin\AdminCategoryController@end_category_update')->name('admin.update.endcategory');
        Route::post('/end-category-delete', 'Admin\AdminCategoryController@end_category_delete')->name('admin.delete.endcategory');



        //brand
        Route::get('/brand', 'Admin\AdminMasterController@brand')->name('admin.brand');
        Route::post('/brand-save', 'Admin\AdminMasterController@brand_save')->name('admin.save.brand');
        Route::post('/brand-update', 'Admin\AdminMasterController@brand_update')->name('admin.update.brand');
        Route::post('/brand-delete', 'Admin\AdminMasterController@brand_delete')->name('admin.delete.brand');


        //brand
        Route::get('/color', 'Admin\AdminMasterController@color')->name('admin.color');
        Route::post('/color-save', 'Admin\AdminMasterController@color_save')->name('admin.save.color');
        Route::post('/color-update', 'Admin\AdminMasterController@color_update')->name('admin.update.color');
        Route::post('/color-delete', 'Admin\AdminMasterController@color_delete')->name('admin.delete.color');


        //size
        Route::get('/size', 'Admin\AdminMasterController@size')->name('admin.size');
        Route::post('/size-save', 'Admin\AdminMasterController@size_save')->name('admin.save.size');
        Route::post('/size-update', 'Admin\AdminMasterController@size_update')->name('admin.update.size');
        Route::post('/size-delete', 'Admin\AdminMasterController@size_delete')->name('admin.delete.size');


        //product
        Route::get('/product', 'Admin\AdminProductController@product')->name('admin.product');
        Route::get('/product-create', 'Admin\AdminProductController@product_create')->name('admin.create.product');
        Route::post('/product-save', 'Admin\AdminProductController@product_save')->name('admin.save.product');
        Route::get('/product-edit/{id}', 'Admin\AdminProductController@product_edit')->name('admin.product.edit');
        Route::post('/product-edit-color-delete', 'Admin\AdminProductController@product_edit_color_delete')->name('admin.delete.color.edit.data');
        Route::post('/product-edit-size-delete', 'Admin\AdminProductController@product_edit_size_delete')->name('admin.delete.size.edit.data');
        Route::post('/product-update', 'Admin\AdminProductController@product_update')->name('admin.update.product');
        Route::post('/product-delete', 'Admin\AdminProductController@product_delete')->name('admin.delete.product');


        //users
        Route::get('/all-users', 'Admin\AdminUserController@all_users')->name('admin.users');

        //order management
        Route::get('/pending-orders', 'Admin\AdminOrderController@pending_orders')->name('admin.pending.orders');
        Route::get('/approved-orders', 'Admin\AdminOrderController@approved_order')->name('admin.approved.orders');
        Route::get('/delivered-orders', 'Admin\AdminOrderController@delivered_order')->name('admin.delivered.orders');
        Route::get('/rejected-orders', 'Admin\AdminOrderController@rejected_order')->name('admin.rejected.orders');
        Route::get('/order-details/{id}', 'Admin\AdminOrderController@order_details')->name('admin.order.view');
        Route::get('/order-print/{id}', 'Admin\AdminOrderController@order_print')->name('admin.order.print');
        Route::post('/order-status-save', 'Admin\AdminOrderController@order_status_save')->name('admin.order.status.save');



        //frontend control

        //home slider
        Route::get('/home-slider', 'Admin\AdminFrontendController@home_slider')->name('admin.home.slider');
        Route::post('/home-slider-save', 'Admin\AdminFrontendController@home_slider_save')->name('admin.home.slider.save');
        Route::post('/home-slider-update', 'Admin\AdminFrontendController@home_slider_update')->name('admin.home.slider.update');
        Route::post('/home-slider-delete', 'Admin\AdminFrontendController@home_slider_delete')->name('admin.home.slider.delete');

        //static data
        Route::get('/static-data', 'Admin\AdminFrontendController@static_data')->name('admin.static.data');
        Route::post('/static-data-save', 'Admin\AdminFrontendController@static_data_save')->name('admin.static.data.update');

        //blog category
        Route::get('/blog-category', 'Admin\AdminBlogController@blog_category')->name('admin.blog.category');
        Route::post('/blog-category-save', 'Admin\AdminBlogController@blog_category_save')->name('admin.save.blogcategory');
        Route::post('/blog-category-update', 'Admin\AdminBlogController@blog_category_update')->name('admin.update.blogcategory');
        Route::post('/blog-category-delete', 'Admin\AdminBlogController@blog_category_delete')->name('admin.delete.blogcategory');

        //blog
        Route::get('/blog-lists', 'Admin\AdminBlogController@blog_lists')->name('admin.blog.list');
        Route::post('/blog-save', 'Admin\AdminBlogController@blog_save')->name('admin.save.blog');
        Route::post('/blog-update', 'Admin\AdminBlogController@blog_update')->name('admin.update.blog');
        Route::post('/blog-delete', 'Admin\AdminBlogController@blog_delete')->name('admin.delete.blog');

        //social icons
        Route::get('/social-icons', 'Admin\AdminFrontendController@social_icons')->name('admin.social.icons');
        Route::post('/social-icons-save', 'Admin\AdminFrontendController@social_icons_save')->name('admin.icon.save');
        Route::post('/social-icons-update', 'Admin\AdminFrontendController@social_icons_update')->name('admin.icon.update');
        Route::post('/social-icons-delete', 'Admin\AdminFrontendController@social_icons_delete')->name('admin.icon.delete');




        //news latter
        Route::get('/news-latter', 'Admin\AdminFrontendController@news_latter')->name('admin.newslater');

        //testimonial
        Route::get('/testimonial', 'Admin\AdminFrontendController@testimonial')->name('admin.tesimonial');
        Route::post('/testimonial-save', 'Admin\AdminFrontendController@testimonial_save')->name('admin.save.tesimonial');
        Route::post('/testimonial-update', 'Admin\AdminFrontendController@testimonial_update')->name('admin.update.tesimonial');
        Route::post('/testimonial-delete', 'Admin\AdminFrontendController@testimonial_delete')->name('admin.delete.tesimonial');

        //advertisement
        Route::get('/advertisement', 'Admin\AdminFrontendController@advertisement')->name('admin.advertisement');
        Route::post('/advertisement-update', 'Admin\AdminFrontendController@advertisement_update')->name('admin.advertisement.update');

        //notificvation
        Route::get('/notification', 'Admin\AdminFrontendController@notification')->name('admin.notification');
        Route::post('/notification-update', 'Admin\AdminFrontendController@notification_update')->name('admin.notification.update');


        //contact us
        Route::get('/contact-us', 'Admin\AdminFrontendController@contact_us')->name('admin.contact.us');
        Route::post('/contact-us-send', 'Admin\AdminFrontendController@contact_us_send')->name('admin.send.contactmessage');




    });
});



Route::group(['middleware' => ['auth']], function() {
    Route::group(['prefix' => 'home'], function ()
    {
        Route::get('/', 'HomeController@index')->name('home');


        //profile
        Route::get('/profile', 'User\UserController@profile')->name('user.profile');
        Route::post('/profile-update', 'User\UserController@profile_update')->name('user.profile.update');

        //change password
        Route::get('/change-password', 'User\UserController@change_password')->name('user.change.password');
        Route::post('/change-password-save', 'User\UserController@change_password_save')->name('user.password.update');



        //orders
        Route::get('/my-orders', 'User\UserController@my_orders')->name('my.orders');
        Route::get('/my-order-view/{id}', 'User\UserController@my_order_view')->name('user.myorder.view');
        Route::get('/my-order-print/{id}', 'User\UserController@my_order_print')->name('user.myorder.print');

        Route::get('/checkout', 'User\UserController@checkout')->name('checkout');
        Route::post('/payment-confirm', 'User\UserController@payment_confirm')->name('user.payment.confirm');
    });
});

