<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use JavaScript;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\Product;
use App\Models\Company;
use App\Models\ProductColor;
use Mail;

class DelegateRequestOfPagesForFront extends Controller
{
  public function testHome () {
      $setting = Setting::get();
      if(count($setting) > 0)
        $data['favicon_url'] = $setting[0]->favicon_url;
      $Categories =  new \App\Models\ProductCategory();
      $Categories = $Categories->where('state', '=', 2)->orderBy('category', 'asc')->get();
      $Company = Company::find('1');

      $Banners =  new \App\Models\Banner();
      $Banners = $Banners->where('state', '=', 2)->get();
      //dd($Banners->where('state', '=', 2)->get());
      $arrayBanners = $Banners->toArray();
      $arrayBanners = array_values(array_sort($arrayBanners, function ($value) {
          return $value['priority'];
      }));
      //$Banners = convertToObject($arrayBanners);
      return view('front/test', $data)
              ->with(['Banners' => $arrayBanners,
                      'Categories' => $Categories,
                      'BannerTitle' => $Company->bannerTitle,
		      'Company' => $Company]);
  }
	
	public function testProducts (Request $request) {
      if($request->id=='coffeetable'){
          $request->id='coffee table';
      }
      else if($request->id=='accentpiece'){
          $request->id='accent piece';
      }
      else if($request->id=='bench&ottoman'){
          $request->id='bench & ottoman';
      }
      else if($request->id=='diningtable'){
          $request->id='dining table';
      }
      else if($request->id=='sidetable'){
          $request->id='side table';
      }
      else if($request->id=='sideboardbar'){
          $request->id='sideboard bar';
      }
      else if($request->id=='walldecor'){
          $request->id='wall decor';
      }
      
      $setting = Setting::get();
      if(count($setting) > 0)
        $data['favicon_url'] = $setting[0]->favicon_url;
      $bandera = false; 
      $Categories = \App\Models\ProductCategory::where('state', '=', 2)->orderBy('category', 'asc')->get();
      $Products = \App\Models\Product::where('state', '=', 2)->where('category', '=', $request->id)->orderBy('created_at', 'desc')->get();
      $Company = Company::find('1');
      
      for ($x = 0; $x < count($Products); $x++) {
          if($Products[$x]->percent!=0) {
            $Products[$x]->current_price =
              $Products[$x]->price - (($Products[$x]->percent/100) * $Products[$x]->price);
          }
          else {
            $Products[$x]->current_price = $Products[$x]->price;
          }
      }

      return view('front/test-products', $data,
                  ['Products' => $Products,
                   'Categories' => $Categories,
                   'subTitle' => $request->id,
                   'Company' => $Company]);
  }
  
  public function showHome () {
      $setting = Setting::get();
      if(count($setting) > 0)
        $data['favicon_url'] = $setting[0]->favicon_url;
      $Categories =  new \App\Models\ProductCategory();
      $Categories = $Categories->where('state', '=', 2)->orderBy('category', 'asc')->get();
      $Company = Company::find('1');

      $Banners =  new \App\Models\Banner();
      $Banners = $Banners->where('state', '=', 2)->get();
      //dd($Banners->where('state', '=', 2)->get());
      $arrayBanners = $Banners->toArray();
      $arrayBanners = array_values(array_sort($arrayBanners, function ($value) {
          return $value['priority'];
      }));
      //$Banners = convertToObject($arrayBanners);
      return view('front/home', $data)
              ->with(['Banners' => $arrayBanners,
                      'Categories' => $Categories,
                      'BannerTitle' => $Company->bannerTitle,
		      'Company' => $Company]);
  }

  public function showAboutUS () {
      $setting = Setting::get();
      if(count($setting) > 0)
        $data['favicon_url'] = $setting[0]->favicon_url;
      $Categories =  new \App\Models\ProductCategory();
      $Categories = $Categories->where('state', '=', 2)->orderBy('category', 'asc')->get();
      $Company = Company::find('1');

      foreach ($Categories as $key => $value) {
        $Product = Product::where('category', '=', $value->category)->get();
        if(count($Product) > 0){
          $categories_array[$key] = $value;
        }
      }
      $AboutUS =  \App\Models\AboutUS::find('1');
      return view('front/aboutus',$data)->with(['AboutUS' => $AboutUS, 'Categories' => $categories_array, 'Company' => $Company]);
  }

  public function showItems () {
      /*$Categories = \App\Models\Product::leftJoin('product_categories', function($join) {
                                $join->on('products.category', '=', 'product_categories.category');
                                })->where('product_categories.state', '=', '2')->get();*/
      $setting = Setting::get();
      if(count($setting) > 0)
        $data['favicon_url'] = $setting[0]->favicon_url;
      $Categories =  new \App\Models\ProductCategory();
      $Categories = $Categories->where('state', '=', 2)->orderBy('category', 'asc')->get();
      $Company = Company::find('1');
      
      $ItemsShowRoom =  new \App\Models\ShowRoom();
      $ItemsShowRoom = $ItemsShowRoom->where('state', '=', 2)->orderBy('created_at', 'desc')->get();
      return view('front/items', $data, ['ItemsShowRoom' => $ItemsShowRoom, 'Categories' => $Categories, 'Company' => $Company]);
  }

  public function showProducts (Request $request) {
      if($request->id=='coffeetable'){
          $request->id='coffee table';
      }
      else if($request->id=='accentpiece'){
          $request->id='accent piece';
      }
      else if($request->id=='bench&ottoman'){
          $request->id='bench & ottoman';
      }
      else if($request->id=='diningtable'){
          $request->id='dining table';
      }
      else if($request->id=='sidetable'){
          $request->id='side table';
      }
      else if($request->id=='sideboardbar'){
          $request->id='sideboard bar';
      }
      else if($request->id=='walldecor'){
          $request->id='wall decor';
      }
      
      $setting = Setting::get();
      if(count($setting) > 0)
        $data['favicon_url'] = $setting[0]->favicon_url;
      $bandera = false; 
      $Categories = \App\Models\ProductCategory::where('state', '=', 2)->orderBy('category', 'asc')->get();
      $Products = \App\Models\Product::where('state', '=', 2)->where('category', '=', $request->id)->orderBy('created_at', 'desc')->get();
      $Company = Company::find('1');
      
      for ($x = 0; $x < count($Products); $x++) {
          if($Products[$x]->percent!=0) {
            $Products[$x]->current_price =
              $Products[$x]->price - (($Products[$x]->percent/100) * $Products[$x]->price);
          }
          else {
            $Products[$x]->current_price = $Products[$x]->price;
          }
      }

      return view('front/products', $data,
                  ['Products' => $Products,
                   'Categories' => $Categories,
                   'subTitle' => $request->id,
                   'Company' => $Company]);
  }
  
  public function showProductsWithFilter (Request $request) {
      if($request->ajax())
      {
        $category = $request->input('category');
        $Products =  new \App\Models\Product();
        $Products = $Products->where('state', '=', 2)->where('category', '=', $category)->get();
        $products = $Products->toArray();
        return response()->json($products);

      }
  }
  
  public function showProduct ($idProduct) {
      $Categories =  new \App\Models\ProductCategory();
      $Categories = $Categories->where('state', '=', 2)->orderBy('category', 'asc')->get();
      $Product = \App\Models\Product::find($idProduct);
      $Colors = ProductColor::get();
      $ColorsInStock = unserialize($Product->inStock);
      $ColorsSoldOut = unserialize($Product->soldOut);
      $Company = Company::find('1');
      
      if($Product->percent!=0) {
        $Product->current_price =
        $Product->price - (($Product->percent/100) * $Product->price);
      }
      else {
        $Product->current_price = $Product->price;
      }
      return view('front/infoproduct')
                ->with(['Product' => $Product,
                        'Categories' => $Categories,
                        'Colors' => $Colors,
                        'ColorsInStock' => $ColorsInStock,
                        'ColorsSoldOut' => $ColorsSoldOut,
                        'Company' => $Company]);
  }
  
  public function showSale () {
      if($request->id=='coffeetable'){
          $request->id='coffee table';
      }
      else if($request->id=='accentpiece'){
          $request->id='accent piece';
      }
      else if($request->id=='bench&ottoman'){
          $request->id='bench & ottoman';
      }
      else if($request->id=='diningtable'){
          $request->id='dining table';
      }
      else if($request->id=='sidetable'){
          $request->id='side table';
      }
      else if($request->id=='sideboardbar'){
          $request->id='sideboard bar';
      }
      else if($request->id=='walldecor'){
          $request->id='wall decor';
      }
      
      $Categories = \App\Models\ProductCategory::where('state', '=', 2)->orderBy('category', 'asc')->get();
      $Products = \App\Models\Product::where('state', '=', 2)
                      ->where('percent', '!=', 0)
                      ->where('price', '!=', 0)
                      ->orderBy('created_at', 'desc')->get();
      $Products = \App\Models\Product::where('state', '=', 2)
                      ->orderBy('created_at', 'desc')->get();
      $Company = Company::find('1');
      
      for ($x = 0; $x < count($Products); $x++) {
          if($Products[$x]->percent!=0) {
            $Products[$x]->current_price =
              $Products[$x]->price - (($Products[$x]->percent/100) * $Products[$x]->price);
          }
          else {
            $Products[$x]->current_price = $Products[$x]->price;
          }
      }
      
      return view('front/products')
                ->with([
                      'Products' => $Products,
                      'Categories' => $Categories,
                      'subTitle' => 'SALE',
                      'Company' => $Company
                      ]);
  }
  
  public function showSales (Request $request) {
      if($request->id=='coffeetable'){
          $request->id='coffee table';
      }
      else if($request->id=='accentpiece'){
          $request->id='accent piece';
      }
      else if($request->id=='bench&ottoman'){
          $request->id='bench & ottoman';
      }
      else if($request->id=='diningtable'){
          $request->id='dining table';
      }
      else if($request->id=='sidetable'){
          $request->id='side table';
      }
      else if($request->id=='sideboardbar'){
          $request->id='sideboard bar';
      }
      else if($request->id=='walldecor'){
          $request->id='wall decor';
      }
      
      $setting = Setting::get();
      if(count($setting) > 0)
        $data['favicon_url'] = $setting[0]->favicon_url;
      $bandera = false; 
      $Categories = \App\Models\ProductCategory::where('state', '=', 2)->orderBy('category', 'asc')->get();
      $Products = \App\Models\Product::where('state', '=', 2)->where('category', '=', $request->id)
      				->where('price', '!=', 0)->where('percent', '!=', 0)
      				->orderBy('created_at', 'desc')->get();
      $Company = Company::find('1');
      
      for ($x = 0; $x < count($Products); $x++) {
          if($Products[$x]->percent!=0) {
            $Products[$x]->current_price =
              $Products[$x]->price - (($Products[$x]->percent/100) * $Products[$x]->price);
          }
          else {
            $Products[$x]->current_price = $Products[$x]->price;
          }
      }

      return view('front/products', $data,
                  ['Products' => $Products,
                   'Categories' => $Categories,
                   'subTitle' => $request->id.' ON SALE NOW',
                   'Company' => $Company]);
  }
  
  public function showPortfolio () {
      $setting = Setting::get();
      if(count($setting) > 0)
        $data['favicon_url'] = $setting[0]->favicon_url;
      $Categories =  new \App\Models\ProductCategory();
      $Categories = $Categories->where('state', '=', 2)->orderBy('category', 'asc')->get();
      $Company = Company::find('1');

      $Albums =  new \App\Models\Album();
      $Albums = $Albums->where('state', '=', 2)->get();
      $Video =  new \App\Models\Video();
      $Video = $Video->where('state', '=', 2)->get();
      return view('front/portfolio', $data, ['Albums' => $Albums, 'Videos' => $Video, 'Categories' => $Categories, 'Company' => $Company]);
  }

  public function showItemsOfPortfolio ($idAlbum) {
    // $Album =  \App\Models\Album::find($idAlbum);
    // $Items =  \App\Models\Item::findAll($idAlbum, ['name', 'ubication']);
    $setting = Setting::get();
    if(count($setting) > 0)
      $data['favicon_url'] = $setting[0]->favicon_url;
    $Categories =  new \App\Models\ProductCategory();
    $Categories = $Categories->where('state', '=', 2)->orderBy('category', 'asc')->get();
    $Company = Company::find('1');

    $Item =  new \App\Models\Item();
    $Items = $Item->where('state', '=', 2)->findAll($idAlbum, ['name', 'ubication']);

    return view('front/itemsofportfolio',$data)->with(['Items' => $Items, 'Categories' => $Categories, 'Company' => $Company]);
  }

  public function showContact () {
      $setting = Setting::get();
      if(count($setting) > 0)
        $data['favicon_url'] = $setting[0]->favicon_url;
      $Categories =  new \App\Models\ProductCategory();
      $Categories = $Categories->where('state', '=', 2)->orderBy('category', 'asc')->get();
      $Company =  \App\Models\Company::find('1');
      return view('front/contact',$data)->with(['Company' => $Company, 'Categories' => $Categories]);
  }
  
  public function sendMail (Request $request) {
  $setting = Setting::get();
      if(count($setting) > 0)
        $data['favicon_url'] = $setting[0]->favicon_url;
      $Categories =  new \App\Models\ProductCategory();
      $Categories = $Categories->where('state', '=', 2)->orderBy('category', 'asc')->get();
      $Company =  \App\Models\Company::find('1');
      
        if($request->ajax()){
          $to_Email = "info@luxlukdesign.com, josuebohorquezc@gmail.com"; //Replace with recipient email address
          $subject = 'Message recieved'; //Subject line for emails
          $headers = 'MIME-Version: 1.0' . "\r\n";
          $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";

          $headers .= 'From: '. $request->input('email') .' ';
            $message = '<html>
               <head>
                  <title>Message recieved of LuxLukDesign</title>
               </head>
               <body>
                  <p><strong>Full name: </strong> ' . $request->input('name') . '</p>
                  <p><strong>E-mail: </strong> ' . $request->input('email') . '</p>';
            $message.= '<p><strong>Message: </strong> ' . $request->input('message') . '</p> </body> </html>';

            $sentMail = @mail($to_Email, $subject, $message, $headers);
            if($sentMail == 1)
            {
              return response()->json(['typeResponse' => 1, 'message' => 'Your email has been sent successfully, wait for your prompt response.']);
              //return redirect(url('/thank-you'))->with(['Company' => $Company, 'Categories' => $Categories]);
            }
            else
            {
              return response()->json(['typeResponse' => 0, 'message' => 'Your mail could not be sent please try again.']);
            }

        }
    }
    
  public function successMail () {
      $setting = Setting::get();
      if(count($setting) > 0)
        $data['favicon_url'] = $setting[0]->favicon_url;
      $Categories =  new \App\Models\ProductCategory();
      $Categories = $Categories->where('state', '=', 2)->orderBy('category', 'asc')->get();
      $Company =  \App\Models\Company::find('1');
      return view('front/thanks',$data)->with(['Company' => $Company, 'Categories' => $Categories]);
  }
	
	public function successMailCoupon () {
      $setting = Setting::get();
      if(count($setting) > 0)
        $data['favicon_url'] = $setting[0]->favicon_url;
      $Categories =  new \App\Models\ProductCategory();
      $Categories = $Categories->where('state', '=', 2)->orderBy('category', 'asc')->get();
      $Company =  \App\Models\Company::find('1');
      return view('front/thanks-coupon',$data)->with(['Company' => $Company, 'Categories' => $Categories]);
  }
}
