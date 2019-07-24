<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServicesProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//website routes
Route::get('/', 'WebsiteController@index')->name('');
Route::any('cities/search', 'WebsiteController@cities_search')->name('');
Route::get('hotel/{slug}', 'WebsiteController@hotel_details')->name('');
Route::get('resturant/{slug}', 'WebsiteController@resturant_details')->name('');
Route::get('visitable/{slug}', 'WebsiteController@visitable_details')->name('');
Route::get('speciality/{slug}', 'WebsiteController@speciality_details')->name('');
Route::post('flight/search', 'WebsiteController@flight_search')->name('');
Route::post('buses/search', 'WebsiteController@buses_search')->name('');
Route::post('hotel/search', 'WebsiteController@hotel_search')->name('');
Route::post('message/MES_20195d1b76fcd919e_CON_195d1b76fcd91a2', 'WebsiteController@homeSend')->name('');
Route::get('about', 'WebsiteController@about')->name('');
Route::get('packages', 'WebsiteController@packages')->name('');
Route::get('gallery', 'WebsiteController@gallery')->name('');
Route::get('team', 'WebsiteController@team')->name('');
Route::get('price', 'WebsiteController@price')->name('');
Route::get('faq', 'WebsiteController@faq')->name('');
Route::get('404', 'WebsiteController@page_not_found')->name('');
Route::get('blog', 'WebsiteController@blog')->name('');
Route::get('blog/195d1b80ba7be81_20196d5b27ba8be40{id}20192d1b70ba9be58', 'WebsiteController@blog_cate')->name('');
Route::get('blog/BLG_20195d1f8a134dc47{id}195d1f8a134dc4c', 'WebsiteController@blog_role')->name('');
Route::get('blog/BLG_20195d1f8a60736e5{time}195d1f8a60736ea', 'WebsiteController@blog_time')->name('');

Route::get('blog/search', 'WebsiteController@blog_search')->name('');

Route::get('blog-details/{slug}', 'WebsiteController@blog_details')->name('');
Route::post('blog-details/comment/f8a60736e5195d1{slugs}20195d1f8d1b70b', 'WebsiteController@blog_comment')->name('');
Route::post('blog-details/reply/f8a60736e5195d1{slugs}20195d1f8d1b70b', 'WebsiteController@blog_reply')->name('');
Route::get('contact', 'WebsiteController@contact')->name('');
Route::post('contact/message/CON_195d1b80ba7be81_MES_20195d1b80ba7be85', 'WebsiteController@contactSend')->name('');

//admin routes
Route::get('admin', 'AdminController@index')->name('');

//admin user routes
Route::get('admin/user', 'UserController@index')->name('');
Route::get('admin/user/add', 'UserController@add')->name('');
Route::post('admin/user/add/insert', 'UserController@insert')->name('');
Route::get('admin/user/view/{slug}', 'UserController@view')->name('');
Route::get('admin/user/edit/{slug}', 'UserController@edit')->name('');
Route::post('admin/user/edit/update/{slug}', 'UserController@update')->name('');
Route::get('admin/user/soft-delete/{slug}', 'UserController@soft')->name('');

//admin banner routes
Route::get('admin/banner', 'BannerController@index')->name('');
Route::get('admin/banner/add', 'BannerController@add')->name('');
Route::post('admin/banner/add/upload', 'BannerController@upload')->name('');
Route::get('admin/banner/view/{slug}', 'BannerController@view')->name('');
Route::get('admin/banner/edit/{slug}', 'BannerController@edit')->name('');
Route::post('admin/banner/edit/update/{slug}', 'BannerController@update')->name('');
Route::get('admin/banner/soft-delete/{slug}', 'BannerController@soft')->name('');

//admin destination slider routes
Route::get('admin/desti-slider', 'DestisliderController@index')->name('');
Route::get('admin/desti-slider/add', 'DestisliderController@add')->name('');
Route::post('admin/desti-slider/add/upload', 'DestisliderController@upload')->name('');
Route::get('admin/desti-slider/view/{slug}', 'DestisliderController@view')->name('');
Route::get('admin/desti-slider/edit/{slug}', 'DestisliderController@edit')->name('');
Route::post('admin/desti-slider/edit/update/{slug}', 'DestisliderController@update')->name('');
Route::get('admin/desti-slider/soft-delete/{slug}', 'DestisliderController@soft')->name('');

//admin why choose us routes
Route::get('admin/choose-us', 'WhyChooseController@index')->name('');
Route::get('admin/choose-us/add', 'WhyChooseController@add')->name('');
Route::post('admin/choose-us/add/upload', 'WhyChooseController@upload')->name('');
Route::get('admin/choose-us/view/{slug}', 'WhyChooseController@view')->name('');
Route::get('admin/choose-us/edit/{slug}', 'WhyChooseController@edit')->name('');
Route::post('admin/choose-us/edit/update/{slug}', 'WhyChooseController@update')->name('');
Route::get('admin/choose-us/soft-delete/{slug}', 'WhyChooseController@soft')->name('');

//admin top country routes
Route::get('admin/top-country', 'TopCountryController@index')->name('');
Route::get('admin/top-country/add', 'TopCountryController@add')->name('');
Route::post('admin/top-country/add/upload', 'TopCountryController@upload')->name('');
Route::get('admin/top-country/view/{slug}', 'TopCountryController@view')->name('');
Route::get('admin/top-country/edit/{slug}', 'TopCountryController@edit')->name('');
Route::post('admin/top-country/edit/update/{slug}', 'TopCountryController@update')->name('');
Route::get('admin/top-country/soft-delete/{slug}', 'TopCountryController@soft')->name('');

//admin awesome package routes
Route::get('admin/awesome-package', 'AwesomePackageController@index')->name('');
Route::get('admin/awesome-package/add', 'AwesomePackageController@add')->name('');
Route::post('admin/awesome-package/add/upload', 'AwesomePackageController@upload')->name('');
Route::get('admin/awesome-package/view/{slug}', 'AwesomePackageController@view')->name('');
Route::get('admin/awesome-package/edit/{slug}', 'AwesomePackageController@edit')->name('');
Route::post('admin/awesome-package/edit/update/{slug}', 'AwesomePackageController@update')->name('');
Route::get('admin/awesome-package/soft-delete/{slug}', 'AwesomePackageController@soft')->name('');

//admin counter routes
Route::get('admin/counter', 'CounterController@index')->name('');
Route::post('admin/counter/update/{slug}', 'CounterController@update')->name('');

//admin gallery routes
Route::get('admin/gallery', 'GalleryController@index')->name('');
Route::get('admin/gallery/add', 'GalleryController@add')->name('');
Route::post('admin/gallery/add/upload', 'GalleryController@upload')->name('');
Route::get('admin/gallery/view/{slug}', 'GalleryController@view')->name('');
Route::get('admin/gallery/edit/{slug}', 'GalleryController@edit')->name('');
Route::post('admin/gallery/edit/update/{slug}', 'GalleryController@update')->name('');
Route::get('admin/gallery/soft-delete/{slug}', 'GalleryController@soft')->name('');

//admin testimonial routes
Route::get('admin/testimonial', 'TestimonialController@index')->name('');
Route::get('admin/testimonial/add', 'TestimonialController@add')->name('');
Route::post('admin/testimonial/add/upload', 'TestimonialController@upload')->name('');
Route::get('admin/testimonial/view/{slug}', 'TestimonialController@view')->name('');
Route::get('admin/testimonial/edit/{slug}', 'TestimonialController@edit')->name('');
Route::post('admin/testimonial/edit/update/{slug}', 'TestimonialController@update')->name('');
Route::get('admin/testimonial/soft-delete/{slug}', 'TestimonialController@soft')->name('');

//admin message routes
Route::get('admin/message', 'ContactController@index')->name('');
Route::get('admin/conin', 'ContactController@con_info_index')->name('');
Route::post('admin/conin/update/{slug}', 'ContactController@con_info_update')->name('');
Route::get('admin/message/view/{slug}', 'ContactController@view')->name('contact_message_view');
Route::get('admin/message/soft-delete/{slug}', 'ContactController@soft')->name('');

//admin about content routes
Route::get('admin/about-content', 'AboutContentController@index')->name('');
Route::post('admin/about-content/update/{slug}', 'AboutContentController@update')->name('');

//admin member routes
Route::get('admin/member', 'MemberController@index')->name('');
Route::get('admin/member/add', 'MemberController@add')->name('');
Route::post('admin/member/add/upload', 'MemberController@upload')->name('');
Route::get('admin/member/view/{slug}', 'MemberController@view')->name('');
Route::get('admin/member/edit/{slug}', 'MemberController@edit')->name('');
Route::post('admin/member/edit/update/{slug}', 'MemberController@update')->name('');
Route::get('admin/member/soft-delete/{slug}', 'MemberController@soft')->name('');

//admin tour routes
Route::get('admin/tour', 'TourController@index')->name('');
Route::get('admin/tour/add', 'TourController@add')->name('');
Route::post('admin/tour/add/upload', 'TourController@upload')->name('');
Route::get('admin/tour/view/{slug}', 'TourController@view')->name('');
Route::get('admin/tour/edit/{slug}', 'TourController@edit')->name('');
Route::post('admin/tour/edit/update/{slug}', 'TourController@update')->name('');
Route::get('admin/tour/soft-delete/{slug}', 'TourController@soft')->name('');

//admin plan routes
Route::get('admin/plan', 'PlanController@index')->name('');
Route::get('admin/plan/add', 'PlanController@add')->name('');
Route::post('admin/plan/add/upload', 'PlanController@upload')->name('');
Route::get('admin/plan/view/{slug}', 'PlanController@view')->name('');
Route::get('admin/plan/edit/{slug}', 'PlanController@edit')->name('');
Route::post('admin/plan/edit/update/{slug}', 'PlanController@update')->name('');
Route::get('admin/plan/soft-delete/{slug}', 'PlanController@soft')->name('');

//admin blog routes
Route::get('admin/blog', 'BlogController@index')->name('');
Route::get('admin/blog/add', 'BlogController@add')->name('');
Route::post('admin/blog/add/upload', 'BlogController@upload')->name('');
Route::get('admin/blog/view/{slug}', 'BlogController@view')->name('');
Route::get('admin/blog/edit/{slug}', 'BlogController@edit')->name('');
Route::post('admin/blog/edit/update/{slug}', 'BlogController@update')->name('');
Route::get('admin/blog/soft-delete/{slug}', 'BlogController@soft')->name('');

//admin blog-categorey routes
Route::get('admin/blog-categorey', 'BlogCategoreyController@index')->name('');
Route::get('admin/blog-categorey/add', 'BlogCategoreyController@add')->name('');
Route::post('admin/blog-categorey/add/upload', 'BlogCategoreyController@upload')->name('');
Route::get('admin/blog-categorey/view/{slug}', 'BlogCategoreyController@view')->name('');
Route::get('admin/blog-categorey/edit/{slug}', 'BlogCategoreyController@edit')->name('');
Route::post('admin/blog-categorey/edit/update/{slug}', 'BlogCategoreyController@update')->name('');
Route::get('admin/blog-categorey/soft-delete/{slug}', 'BlogCategoreyController@soft')->name('');

//admin comment routes
Route::get('admin/comment', 'CommentController@index')->name('');
Route::get('admin/comment/view/{slug}', 'CommentController@view')->name('');
Route::get('admin/comment/soft-delete/{slug}', 'CommentController@soft')->name('');

//admin location routes
Route::get('admin/location', 'LocationController@index')->name('');
Route::get('admin/location/add', 'LocationController@add')->name('');
Route::post('admin/location/add/upload', 'LocationController@upload')->name('');
Route::get('admin/location/view/{slug}', 'LocationController@view')->name('');
Route::get('admin/location/edit/{slug}', 'LocationController@edit')->name('');
Route::post('admin/location/edit/update/{slug}', 'LocationController@update')->name('');
Route::get('admin/location/soft-delete/{slug}', 'LocationController@soft')->name('');

//admin service routes
Route::get('admin/service', 'ServicesController@index')->name('');
Route::get('admin/service/add', 'ServicesController@add')->name('');
Route::post('admin/service/add/upload', 'ServicesController@upload')->name('');
Route::get('admin/service/view/{slug}', 'ServicesController@view')->name('');
Route::get('admin/service/edit/{slug}', 'ServicesController@edit')->name('');
Route::post('admin/service/edit/update/{slug}', 'ServicesController@update')->name('');
Route::get('admin/service/soft-delete/{slug}', 'ServicesController@soft')->name('');

//admin service package routes
Route::get('admin/service-package/flight', 'ServicePackageController@index1')->name('');
Route::get('admin/service-package/hotel', 'ServicePackageController@index2')->name('');
Route::get('admin/service-package/bus', 'ServicePackageController@index3')->name('');
Route::get('admin/service-package/add', 'ServicePackageController@add')->name('');
Route::post('admin/service-package/add/upload-flight', 'ServicePackageController@upload_flight')->name('');
Route::post('admin/service-package/add/upload-hotel', 'ServicePackageController@upload_hotel')->name('');
Route::post('admin/service-package/add/upload-bus', 'ServicePackageController@upload_bus')->name('');
Route::get('admin/service-package/view/{slug}', 'ServicePackageController@view')->name('');
Route::get('admin/service-package/edit/{slug}', 'ServicePackageController@edit')->name('');
Route::post('admin/service-package/edit/update/{slug}', 'ServicePackageController@update')->name('');
Route::post('admin/service-package/edit/update2/{slug}', 'ServicePackageController@update2')->name('');
Route::get('admin/service-package/soft-delete/{slug}', 'ServicePackageController@soft')->name('');

//admin hotels routes
Route::get('admin/hotels', 'HotelController@index')->name('');
Route::get('admin/hotels/add', 'HotelController@add')->name('');
Route::post('admin/hotels/add/upload', 'HotelController@upload')->name('');
Route::get('admin/hotels/view/{slug}', 'HotelController@view')->name('');
Route::get('admin/hotels/edit/{slug}', 'HotelController@edit')->name('');
Route::post('admin/hotels/edit/update/{slug}', 'HotelController@update')->name('');
Route::get('admin/hotels/soft-delete/{slug}', 'HotelController@soft')->name('');

//admin resturant-categorey routes
Route::get('admin/resturant-categorey', 'ResturantCategoreyController@index')->name('');
Route::get('admin/resturant-categorey/add', 'ResturantCategoreyController@add')->name('');
Route::post('admin/resturant-categorey/add/upload', 'ResturantCategoreyController@upload')->name('');
Route::get('admin/resturant-categorey/view/{slug}', 'ResturantCategoreyController@view')->name('');
Route::get('admin/resturant-categorey/edit/{slug}', 'ResturantCategoreyController@edit')->name('');
Route::post('admin/resturant-categorey/edit/update/{slug}', 'ResturantCategoreyController@update')->name('');
Route::get('admin/resturant-categorey/soft-delete/{slug}', 'ResturantCategoreyController@soft')->name('');

//admin resturant routes
Route::get('admin/resturant', 'ResturantController@index')->name('');
Route::get('admin/resturant/add', 'ResturantController@add')->name('');
Route::post('admin/resturant/add/upload', 'ResturantController@upload')->name('');
Route::get('admin/resturant/view/{slug}', 'ResturantController@view')->name('');
Route::get('admin/resturant/edit/{slug}', 'ResturantController@edit')->name('');
Route::post('admin/resturant/edit/update/{slug}', 'ResturantController@update')->name('');
Route::get('admin/resturant/soft-delete/{slug}', 'ResturantController@soft')->name('');

//admin visitable routes
Route::get('admin/visitable', 'VisitableController@index')->name('');
Route::get('admin/visitable/add', 'VisitableController@add')->name('');
Route::post('admin/visitable/add/upload', 'VisitableController@upload')->name('');
Route::get('admin/visitable/view/{slug}', 'VisitableController@view')->name('');
Route::get('admin/visitable/edit/{slug}', 'VisitableController@edit')->name('');
Route::post('admin/visitable/edit/update/{slug}', 'VisitableController@update')->name('');
Route::get('admin/visitable/soft-delete/{slug}', 'VisitableController@soft')->name('');

//admin speciality routes
Route::get('admin/speciality', 'SpecialityController@index')->name('');
Route::get('admin/speciality/add', 'SpecialityController@add')->name('');
Route::post('admin/speciality/add/upload', 'SpecialityController@upload')->name('');
Route::get('admin/speciality/view/{slug}', 'SpecialityController@view')->name('');
Route::get('admin/speciality/edit/{slug}', 'SpecialityController@edit')->name('');
Route::post('admin/speciality/edit/update/{slug}', 'SpecialityController@update')->name('');
Route::get('admin/speciality/soft-delete/{slug}', 'SpecialityController@soft')->name('');

// admin error permission
Route::get('admin/error/permission', 'WebsiteController@page_not_found')->name('');

