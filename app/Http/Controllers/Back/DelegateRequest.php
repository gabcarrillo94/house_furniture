<?php

namespace App\Http\Controllers\Back;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\AboutUS;
use App\Models\Company;
use App\Models\Album;
use App\Models\ProductCategory;
use App\Models\ProductColor;

class DelegateRequest extends Controller
{
    public function main () {
        return view('welcome');
    }

    public function showAddProduct () {
      $Categories = ProductCategory::get();
      $Colors = ProductColor::get();
      $arrayCategories = array();
      foreach($Categories as $category)
      {
        $arrayCategories[$category->category] = ucwords($category->category);
      }
      return view('addproduct')
                ->with(['arrayCategories' => $arrayCategories,
                        'colors' => $Colors]);
    }

    public function showAddCategory () {
      return view('addcategory');
    }

    public function showAddBanner () {
        return view('addbanner');
    }

    public function showAddAlbum () {
        return view('addalbum');
    }

    public function showAddVideo () {
        return view('uploadvideo');
    }

    public function showOptionesAlbum ($idAlbum) {
         session(['idAlbum' => $idAlbum]);
         return view('showoptionsofalbums');
    }

    public function showAddItem () {
        return view('additem');
    }
    public function showAddAboutUS () {
        $AboutUS = AboutUS::find('1');
        if(!empty($AboutUS)){
            return view('aboutusinformation')->with(['AboutUS' => $AboutUS]);
        }
        else {
            return view('addaboutusinformation');
        }
    }
    public function showAddCompany () {
      $Company = Company::find('1');
      if(!empty($Company)){
          return view('companyinformation')->with(['Company' => $Company]);
      }
      else {
          return view('addcompanyinformation');
      }
    }

    public function showAddImageToShowRoom () {
      return view('addimageshowroom');
    }

    public function showEditAlbum () {
      if(session()->has('idAlbum'))
      {
        $Album = Album::find(session('idAlbum'));
        return view('editalbum')->with(['Album' => $Album]);
      }
    }


}
