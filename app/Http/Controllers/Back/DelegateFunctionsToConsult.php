<?php

namespace App\Http\Controllers\Back;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Product;
use App\Models\ShowRoom;
use App\Models\ProductCategory;
use App\Models\ProductColor;

class DelegateFunctionsToConsult extends Controller
{
    public function showProducts () {
        $products = Product::orderBy('created_at', 'desc')->paginate(7);
        
        if(count($products) > 0){
            return view('showproducts',
                        [
                         'Products' => $products
                         ]);
        }else{
            return view('showmsgnothing');
        }
    }
    public function showCategories () {
        $Categories =  ProductCategory::orderBy('created_at', 'asc')->paginate(7);
        if(count($Categories) > 0){
          return view('showcategories', ['Categories' => $Categories]);
        }else{
            return view('showmsgnothing');
        }
    }

    public function showBanners () {
        $Banners =  Banner::orderBy('created_at', 'desc')->paginate(7);
        //return view('showbanners', ['Banners' => $Banners]);
        if(count($Banners) > 0){
            return view('showbanners', ['Banners' => $Banners]);
        }else{
            return view('showmsgnothing');
        }
    }
    public function showAlbums () {
        $Albums = \App\Models\Album::all();
        //dd($Albums);
        if(count($Albums) > 0){
            return view('showalbums', ['Albums' => $Albums]);
        }else{
            return view('showmsgnothing');
        }

    }

    public function showVideos () {
        $Videos = \App\Models\Video::orderBy('created_at', 'desc')->paginate(7);
        if(count($Videos) > 0){
            return view('showvideos', ['Videos' => $Videos]);
        }else{
            return view('showmsgnothing');
        }

    }
    
    public function showitems () {
        if(session()->has('idAlbum'))
        {
          //session('idAlbum')
          $Items = \App\Models\Item::where('idAlbum',session('idAlbum'))->paginate(5);
          if(!is_null($Items)){
              return view('showitems')->with(['Items' => $Items]);
          }else{
              return view('showmsgnothing');
          }
        }
        else {

        }

    }
    public function editBanner ($id) {
        $Banner = Banner::find($id);
        return view('editbanner')->with(['Banner' => $Banner]);
    }
    
    public function editProduct ($id) {
        $Categories = ProductCategory::get();
        $Colors = ProductColor::get();
        $arrayCategories = array();
        foreach($Categories as $category)
        {
          $arrayCategories[$category->category] = ucwords($category->category);
        }
        $Product = Product::find($id);
        $ColorsInStock = unserialize($Product->inStock);
        $ColorsSoldOut = unserialize($Product->soldOut);
        return view('editproduct')
            ->with(['Product' => $Product,
                    'arrayCategories' => $arrayCategories,
                    'Colors' => $Colors,
                    'ColorsInStock' => $ColorsInStock,
                    'ColorsSoldOut' => $ColorsSoldOut
                    ]);
    }
    public function editCategory ($id) {
        $Category = ProductCategory::find($id);
        return view('editcategory')->with(['Category' => $Category]);
    }

    public function editItem ($id) {
        $Item = \App\Models\Item::where('id',$id)->first();
        return view('edititem')->with(['Item' => $Item]);
    }
    public function editVideo ($id) {
        $Video = \App\Models\Video::where('id',$id)->first();
        return view('editvideo')->with(['Video' => $Video]);
    }
    
    public function editShowRoom ($id) {
        $ShowRoom = ShowRoom::find($id);
        return view('editshowroom')->with(['ShowRoom' => $ShowRoom]);
    }

    public function showImagesShowRoom () {
      $ShowRooms =  ShowRoom::orderBy('created_at', 'desc')->paginate(7);
      //return view('showbanners', ['Banners' => $Banners]);
      if(count($ShowRooms) > 0){
          return view('showimagesshowroom', ['ShowRooms' => $ShowRooms]);
      }else{
          return view('showmsgnothing');
      }
    }

}
