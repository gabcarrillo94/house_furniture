<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


/*
|--------------------------------------------------------------------------
| Routes for FRONT-END
|--------------------------------------------------------------------------
|
| Aqui defino las rutas para el FRONT - END
|
*/

Route::get('/',[
    'uses' => 'Front\DelegateRequestOfPagesForFront@showHome',
    'as' => '/'
]);

Route::get('about-us',[
    'uses' => 'Front\DelegateRequestOfPagesForFront@showAboutUS',
    'as' => 'show/aboutus'
]);

Route::get('show-room',[
    'uses' => 'Front\DelegateRequestOfPagesForFront@showItems',
    'as' => 'show/items'
]);

Route::get('products/category/{id}','Front\DelegateRequestOfPagesForFront@showProducts');

Route::get('products-filter',[
    'uses' => 'Front\DelegateRequestOfPagesForFront@showProductsWithFilter',
    'as' => 'show/products/filter'
]);

Route::get('information-product-{idProduct}',[
    'uses' => 'Front\DelegateRequestOfPagesForFront@showProduct',
    'as' => 'show/info/product'
]);

Route::get('portfolio',[
    'uses' => 'Front\DelegateRequestOfPagesForFront@showPortfolio',
    'as' => 'show/portfolio'
]);

Route::get('items-of-portfolio-{idAlbum}',[
    'uses' => 'Front\DelegateRequestOfPagesForFront@showItemsOfPortfolio',
    'as' => 'active/portfolio'
]);

Route::get('contact-us',[
    'uses' => 'Front\DelegateRequestOfPagesForFront@showContact',
    'as' => 'show/contact'
]);

Route::get('sale',[
    'uses' => 'Front\DelegateRequestOfPagesForFront@showSale',
    'as' => 'show/sale'
]);

Route::post('send-email',[
    'uses' => 'Front\DelegateRequestOfPagesForFront@sendMail',
    'as' => 'send-mail'
]);

Route::get('thank-you',[
    'uses' => 'Front\DelegateRequestOfPagesForFront@successMail',
    'as' => 'thank-you'
]);

Route::get('thank-you-coupon',[
    'uses' => 'Front\DelegateRequestOfPagesForFront@successMailCoupon',
    'as' => 'thank-you-coupon'
]);

Route::get('sales/category/{id}',
'Front\DelegateRequestOfPagesForFront@showSales');

/* ------- ONLY FOR TEST ------- */

Route::get('test',[
    'uses' => 'Front\DelegateRequestOfPagesForFront@testHome',
    'as' => 'test'
]);

Route::get('test-products/{id}','Front\DelegateRequestOfPagesForFront@testProducts');

/*
|--------------------------------------------------------------------------
| Routes for BACK- END
|--------------------------------------------------------------------------
|
| Aqui defino las rutas que me sirven para funcionar el back-end
|
*/

//inicio controlador DelegateRequest
Route::get('/jdbc-install-back-system',[
    'uses' => 'Back\DelegateRequest@main',
    'as' => '/jdbc-install-back-system'
]);
Route::group(['middleware' => 'auth'], function () {
    Route::get('add-product',[
       'uses' => 'Back\DelegateRequest@showAddProduct',
       'as' => 'product/add'
    ]);

    Route::get('add-category',[
       'uses' => 'Back\DelegateRequest@showAddCategory',
       'as' => 'category/add'
    ]);

    Route::get('add-banner',[
       'uses' => 'Back\DelegateRequest@showAddBanner',
       'as' => 'banner/add'
    ]);

    Route::get('add-album',[
       'uses' => 'Back\DelegateRequest@showAddAlbum',
       'as' => 'album/add'
    ]);

    Route::get('add-video',[
       'uses' => 'Back\DelegateRequest@showAddVideo',
       'as' => 'video/add'
    ]);

    Route::get('showromm-add-image',[
       'uses' => 'Back\DelegateRequest@showAddImageToShowRoom',
       'as' => 'showromm-add-image'
    ]);


    Route::get('options-album-{idAlbum}',[
       'uses' => 'Back\DelegateRequest@showOptionesAlbum',
       'as' => 'options/album/show'
    ]);

    Route::get('add-item',[
       'uses' => 'Back\DelegateRequest@showAddItem',
       'as' => 'item/add'
    ]);

    Route::get('add-about-us-information',[
       'uses' => 'Back\DelegateRequest@showAddAboutUS',
       'as' => 'aboutus/add'
    ]);

    Route::get('add-company-information',[
       'uses' => 'Back\DelegateRequest@showAddCompany',
       'as' => 'company/add'
    ]);

    Route::get('edit-album-information',[
       'uses' => 'Back\DelegateRequest@showEditAlbum',
       'as' => 'album/edit'
    ]);
    
    Route::get('settings/{page}','Back\SettingController@show')->where(['page' => 'site|metas']);
    Route::post('settings/{page}/create','Back\SettingController@create')->where(['page' => 'site|metas']);
    Route::post('settings/{page}/update','Back\SettingController@update')->where(['page' => 'site|metas']);
});

//fin controlador DelegateRequest

//inicio routes for controlador DelegateFunctionsOfAdd
//Empieza rutas de agregar
Route::group(['middleware' => 'auth'], function () {
    Route::post('proccess-product',[
       'uses' => 'Back\DelegateFunctionsOfAdd@addProduct',
       'as' => 'add/product'
    ]);

    Route::post('add/category',[
       'uses' => 'Back\DelegateFunctionsOfAdd@addCategory',
       'as' => 'add/category'
    ]);

    Route::post('proccess-banner',[
        'uses' => 'Back\DelegateFunctionsOfAdd@addBanner',
        'as' => 'add/banner'
    ]);

    Route::post('proccess-album',[
       'uses' => 'Back\DelegateFunctionsOfAdd@addAlbum',
       'as' => 'add/album'
    ]);

    Route::post('proccess-item',[
       'uses' => 'Back\DelegateFunctionsOfAdd@addItem',
       'as' => 'add/item'
    ]);

    Route::post('proccess-about-us',[
       'uses' => 'Back\DelegateFunctionsOfAdd@addAboutUS',
       'as' => 'add/aboutus'
    ]);

    Route::post('proccess-video',[
       'uses' => 'Back\DelegateFunctionsOfAdd@addVideo',
       'as' => 'add/video'
    ]);
    
    Route::post('proccess-company',[
       'uses' => 'Back\DelegateFunctionsOfAdd@addCompany',
       'as' => 'add/company'
    ]);

    Route::post('proccess-show-room',[
       'uses' => 'Back\DelegateFunctionsOfAdd@addShowRoom',
       'as' => 'add/showroom'
    ]);
});

//Termina las rutas  de agregar
//empieza las rutas para modificar
Route::group(['middleware' => 'auth'], function () {
    Route::put('modified-proccess-banner',[
       'uses' => 'Back\DelegateFunctionsOfAdd@modifiedBanner',
       'as' => 'modified/banner'
    ]);

    Route::put('modified-proccess-product',[
       'uses' => 'Back\DelegateFunctionsOfAdd@modifiedProduct',
       'as' => 'modified/product'
    ]);
    Route::put('modified-proccess-category',[
       'uses' => 'Back\DelegateFunctionsOfAdd@modifiedCategory',
       'as' => 'modified/category'
    ]);
    Route::put('modified-proccess-album',[
       'uses' => 'Back\DelegateFunctionsOfAdd@modifiedAlbum',
       'as' => 'modified/album'
    ]);
    Route::put('modified-proccess-item',[
       'uses' => 'Back\DelegateFunctionsOfAdd@modifiedItem',
       'as' => 'modified/item'
    ]);
    Route::put('modified-proccess-video',[
       'uses' => 'Back\DelegateFunctionsOfAdd@modifiedVideo',
       'as' => 'modified/video'
    ]);
    Route::put('modified-proccess-about-us',[
       'uses' => 'Back\DelegateFunctionsOfAdd@modifiedAboutUS',
       'as' => 'modified/aboutus'
    ]);
    Route::put('modified-proccess-company',[
       'uses' => 'Back\DelegateFunctionsOfAdd@modifiedCompany',
       'as' => 'modified/company'
    ]);

    Route::put('modified-proccess-show-room',[
       'uses' => 'Back\DelegateFunctionsOfAdd@modifiedImageShowRoom',
       'as' => 'modified/image/showroom'
    ]);

    // Routes for Delete

    Route::get('albums-delete',[
       'uses' => 'Back\DelegateFunctionsOfAdd@deleteAlbums',
       'as' => 'album/delete'
    ]);

    Route::get('image-show-room-delete',[
       'uses' => 'Back\DelegateFunctionsOfAdd@deleteShowRoom',
       'as' => 'showroom/delete'
    ]);

    Route::get('banner-delete',[
       'uses' => 'Back\DelegateFunctionsOfAdd@deleteBanner',
       'as' => 'banner/delete'
    ]);

    Route::get('product-delete',[
       'uses' => 'Back\DelegateFunctionsOfAdd@deleteProduct',
       'as' => 'product/delete'
    ]);

    Route::get('category-delete',[
       'uses' => 'Back\DelegateFunctionsOfAdd@deleteCategory',
       'as' => 'category-delete'
    ]);

    Route::get('item-delete',[
       'uses' => 'Back\DelegateFunctionsOfAdd@deleteItem',
       'as' => 'item-delete'
    ]);
    Route::get('video-delete',[
       'uses' => 'Back\DelegateFunctionsOfAdd@deleteVideo',
       'as' => 'video-delete'
    ]);

});
//fin of routes for controlador DelegateFunctionsOfAdd

//inicio routes for controlador DelegateFunctionsToConsult

//Inicio de rutas para editar {"cuando son varios elementos y se quiere editar uno de ellos"}
Route::group(['middleware' => 'auth'], function () {
  Route::get('edit-banner-{id}',[
    'uses' => 'Back\DelegateFunctionsToConsult@editBanner',
    'as' => 'edit/banner'
  ]);
  Route::get('edit-product-{id}',[
    'uses' => 'Back\DelegateFunctionsToConsult@editProduct',
    'as' => 'edit/product'
  ]);
  Route::get('edit-album-{id}',[
    'uses' => 'Back\DelegateFunctionsToConsult@editAlbum',
    'as' => 'edit/album'
  ]);
  Route::get('edit-video-{id}',[
    'uses' => 'Back\DelegateFunctionsToConsult@editVideo',
    'as' => 'edit/video'
  ]);
  Route::get('edit-item-{id}',[
    'uses' => 'Back\DelegateFunctionsToConsult@editItem',
    'as' => 'edit/item'
  ]);
  Route::get('edit-category-{id}',[
    'uses' => 'Back\DelegateFunctionsToConsult@editCategory',
    'as' => 'edit/category'
  ]);

  Route::get('edit-show-room-{id}',[
    'uses' => 'Back\DelegateFunctionsToConsult@editShowRoom',
    'as' => 'edit/showroom'
  ]);

  Route::get('change-state-items',[
    'uses' => 'Back\DelegateFunctionsOfAdd@editStateItem',
    'as' => 'change-state-items'
  ]);

  Route::get('change-state-product',[
    'uses' => 'Back\DelegateFunctionsOfAdd@editStateProduct',
    'as' => 'change-state-product'
  ]); 

  Route::get('change-state-category',[
    'uses' => 'Back\DelegateFunctionsOfAdd@editStateCategory',
    'as' => 'change-state-category'
  ]);
  
  Route::get('change-state-banner',[
    'uses' => 'Back\DelegateFunctionsOfAdd@editStateBanner',
    'as' => 'change-state-banner'
  ]);

  Route::get('change-state-showroom',[
    'uses' => 'Back\DelegateFunctionsOfAdd@editStateShowRoom',
    'as' => 'change-state-showroom'
  ]);

});


//Fin de rutas para editar

//show
Route::group(['middleware' => 'auth'], function () {
    Route::get('show-all-banners',[
       'uses' => 'Back\DelegateFunctionsToConsult@showBanners',
       'as' => 'banner/show'
    ]);

    Route::get('show-all-products',[
       'uses' => 'Back\DelegateFunctionsToConsult@showProducts',
       'as' => 'product/show'
    ]);

    Route::get('show-all-category',[
       'uses' => 'Back\DelegateFunctionsToConsult@showCategories',
       'as' => 'category/show'
    ]);

    Route::get('show-all-albums',[
       'uses' => 'Back\DelegateFunctionsToConsult@showAlbums',
       'as' => 'albums/show'
    ]);
    Route::get('show-all-videos',[
       'uses' => 'Back\DelegateFunctionsToConsult@showVideos',
       'as' => 'videos/show'
    ]);

    Route::get('show-all-items',[
       'uses' => 'Back\DelegateFunctionsToConsult@showItems',
       'as' => 'item/show'
    ]);

    Route::get('show-about-us-information',[
      'uses' => 'Back\DelegateFunctionsToConsult@showAboutUS',
      'as' => 'aboutus/show'
    ]);

    Route::get('show-company-information',[
       'uses' => 'Back\DelegateFunctionsToConsult@showCompany',
       'as' => 'company/show'
    ]);

    Route::get('show-images-showroom',[
       'uses' => 'Back\DelegateFunctionsToConsult@showImagesShowRoom',
       'as' => 'showrooms/show'
    ]);

});
//fin routes for controlador DelegateFunctionsToConsult
