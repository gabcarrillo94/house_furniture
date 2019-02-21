<?php

namespace App\Http\Controllers\Back;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Product;
use App\Models\Album;
use App\Models\Item;
use App\Models\Company;
use App\Models\AboutUS;
use App\Models\ShowRoom;
use App\Models\Video;
use App\Models\ProductCategory;
use Mail;
use Redirect;
use Session;
use Intervention\Image\ImageManagerStatic as Image;

class DelegateFunctionsOfAdd extends Controller
{
    public function addProduct(Request $request){
      $this->validate($request,[
        'name' => ['required', 'max:100'],
        'code' => ['required', 'max:200', 'unique:products'],
        'description' => ['required', 'max:1000'],
        'category' => ['max:20'],
        'price' => ['numeric'],
        'percent' => ['numeric', 'max:100'],
        'mainImage' => ['required', 'unique:products']
      ]);
      if($request->input('category') == '')
      {
        $category = 'others';
      }
      else
      {
        $category = $request->input('category');
      }
      $NameImage = $request->file('mainImage');
      $sizeImage = getimagesize($NameImage);
      if(($sizeImage[0] > 700 && $sizeImage[0] < 1050) && ($sizeImage[1] > 400 && $sizeImage[1] < 930))
      {
        $NameProduct = $request->file('mainImage');
          \Storage::disk('local')->put('/products' . $NameProduct, \File::get($NameProduct));
            if ($NameProduct->isValid()) {
              $Product = array(
                'name' => $request->input('name'),
                'code' => $request->input('code'),
                'description' => $request->input('description'),
                'price' => $request->input('price'),
                'percent' => $request->input('percent'),
                'category' => $category,
                'mainImage' => $NameProduct,
                'inStock' => serialize($request->input('inStock')),
                'soldOut' => serialize($request->input('soldOut')),
                'state' => 2,
              );
              $Product = Product::create($Product);
              
              $msg = "Your product has been saved";
              return view('msgproccess', ['msg' => $msg]);
            }
            else{
                $msg = "Your information has not been saved, please try again.";
                return view('msgfailure', ['failed' => $msg]);
            }
      }else {
        session()->flash('messageError', 'The dimensions of the image are not within the set range, please try again respecting this range from 900 to 1010px width and 400 to 930 hight');
        return redirect('add-product');
      }

    }
    public function addBanner(Request $request){
        $this->validate($request,[
          'url' => ['required', 'unique:banners'],
          'priority' => ['required', 'unique:banners']
        ]);
        $NameBanner = $request->file('url');
        //if(\Storage::disk('local')->exists($NameBanner)){
          \Storage::disk('local')->put('/banners' . $NameBanner, \File::get($NameBanner));
            if ($NameBanner->isValid()) {
              $size = $NameBanner->getSize();
              $Banner = array(
                  'url' => $NameBanner,
                  'dimension' => $size, //tengo que cambiar el campo dimension por size
                  'orientation' => 'body', //este campo es para un futuro si tiene varios banner en la pagina de home
                  'priority'=> $request->input('priority'),
                  'state' => 2,
              );

              Banner::create($Banner);
              $msg = "Your banner has been saved successfully, if you want to use this new banner please activate it in the section of modify banner";
              return view('msgproccess', ['msg' => $msg]);
            }
            else{
                $msg = "Your information has not been saved, please try again.";
                return view('msgfailure', ['failed' => $msg]);
            }
        //}
        //else{
          //  return "ya existe";
        //}
    }

    public function addCategory ( Request $request ) 
    {
      $this->validate($request,[
        'category' => ['required', 'unique:product_categories'],
      ]);
      
      $Category = array(
        'category' =>  strtolower(trim($request->input('category'))),
        );
      $response = ProductCategory::create($Category);
      if($response)
      {
        $msg = "Your Category has been successfully saved";
        return view('msgproccess', ['msg' => $msg]);
      }
      else
      {
        $msg = "Your information has not been saved, please try again.";
        return view('msgfailure', ['failed' => $msg]);
      }

    }

    public function addAlbum( Request $request ){
      $description = trim($request->input('description'));
      $this->validate($request,[
        'mainImage' => ['required'],
        'name' => ['required', 'unique:albums', 'max:100'],
        'description' => ['required', 'max:300']
      ]);
      $NameAlbum = $request->file('mainImage'); //Ruta y nombre completo del archivo
      $NameNewAlbum = $request->input('name'); //Nombre de la carpeta
      $NameDirectory = str_replace(' ', '', $NameNewAlbum);
      $directory = "albums/".$NameDirectory;
      \Storage::makeDirectory($directory);
      \Storage::disk('local')->put($directory . $NameAlbum, \File::get($NameAlbum));
      if ($NameAlbum->isValid()) {
          $Album = array(
              'ubication' => $directory.$NameAlbum,
              'name' => $NameNewAlbum,
              'description' => $request->input('description'),
              'mainImage'=> $NameAlbum,
              'state' => 2,
          );

          Album::create($Album);
          $msg = "Your Album has been successfully saved";
          return view('msgproccess', ['msg' => $msg]);
      }
      else{
          $msg = "Your information has not been saved, please try again.";
          return view('msgfailure', ['failed' => $msg]);
      }
    }

    public function addVideo( Request $request ){
      $this->validate($request,[
        'url' => ['required'],
        'description' => ['max:300']
      ]);
      $url = $request->input('url'); 
      $description = $request->input('description'); 

      $Video = array(
          'url' => $url,
          'description' => $description
      );
      Video::create($Video);
      $msg = "Your Video has been successfully saved";
      return view('msgproccess', ['msg' => $msg]);
    }
    

    public function addItem (Request $request) {
      $this->validate($request,[
        'name' => ['required', 'max:200'],
        'itemImage' => ['required']
      ]);
      $Album = Album::find($request->input('idAlbum'));
      $NameItem = $request->file('itemImage');
      $NameDirectory = str_replace(' ', '', $Album->name);
      $directory = 'albums/' . $NameDirectory . $NameItem;
      \Storage::disk('local')->put($directory, \File::get($NameItem));
      if ($NameItem->isValid()) {
          $Item = array(
              'type' => 'Portfolio', //Esta opcion por lo momentos estara desactivada
              'name' => $request->input('name'),
              'itemImage' => $NameItem,
              'ubication'=> $directory,
              'idAlbum' => $Album->id,
              'state' => 2,
          );

          Item::create($Item);
          $msg = "Your Album has been successfully saved";
          return view('msgproccess', ['msg' => $msg]);
      }
      else{
          $msg = "Your information has not been saved, please try again.";
          return view('msgfailure', ['failed' => $msg]);
      }
    }

    public function modifiedItem (Request $request) {
        $responseDelete = false;
        $Item = Item::where('id', $request->input('id'))->first();
        $routeFiles = $Item->ubication;
        $AlbumContentItem = $Item->ubication;
        $AlbumContentItem = Album::find($Item->idAlbum);
        if(!is_null($request->file('itemImage'))){
          $responseDelete = \Storage::delete($routeFiles);
          if($responseDelete){
            $NameImageItem = $request->file('itemImage');
            $NameDirectory = str_replace(' ', '', $AlbumContentItem->name);
            $NewUbication = '/albums/' . $NameDirectory . $NameImageItem;
            \Storage::disk('local')->put($NewUbication, \File::get($NameImageItem));
            if ($NameImageItem->isValid()) {
                $ItemNew = array(
                  'name' => $request->input('name'),
                  'ubication' => $NewUbication,
                );
                $responseUpdate = $Item->update($ItemNew);
                $msg = "Your information has been successfully saved";
                return view('msgproccess', ['msg' => $msg]);
            }
            else{
                $msg = "Your information has not been saved, please try again.";
                return view('msgfailure', ['failed' => $msg]);
            }
          }
        }else
        {
          $Item->update($request->all());
          $msg = "Your information has been successfully saved";
          return view('msgproccess', ['msg' => $msg]);
        }


    }
    
    public function modifiedCategory (Request $request) {
          $Category = ProductCategory::where('id', $request->input('id'))->first();
          $Category->update($request->all());
          $msg = "Your information has been successfully saved";
          return view('msgproccess', ['msg' => $msg]);
    }

    public function modifiedVideo (Request $request) {
          $Video = Video::where('id', $request->input('id'))->first();
          $Video->update($request->all());
          $msg = "Your information has been successfully saved";
          return view('msgproccess', ['msg' => $msg]);
    }

    public function addCompany (Request $request) {
        $this->validate($request,[
          'numberPhone' => ['required', 'max:63'],
          'mainEmail' => ['required', 'max:82'],
          'secondEmail' => ['required','max:82'],
          'direction' => ['required','max:222']
        ]);
        Company::create($request->all());
        $msg = "Your information has not been saved, please try again.";
        return view('msgproccess', ['msg' => $msg]);
    }

    public function addAboutUS (Request $request) {
      $this->validate($request,[
        'shortDescription' => ['required'],
        'fullDescription' => ['required'],
        'usImage' => ['required']
      ]);
      $NameAboutUS = $request->file('usImage');
      \Storage::disk('local')->put('/aboutus' . $NameAboutUS, \File::get($NameAboutUS));
      if ($NameAboutUS->isValid()) {
          AboutUS::create($request->all());
          $msg = "Your information has been successfully saved";
          return view('msgproccess', ['msg' => $msg]);
      }
      else{
        $msg = "Your information has not been saved, please try again.";
        return view('msgfailure', ['failed' => $msg]);
      }
    }
    public function modifiedBanner (Request $request) {
        $this->validate($request,[
          'url' => ['required', 'unique:banners'],
          'priority' => ['required'],
        ]);
        $Banner = Banner::find($request->input('idBanner'));
        $routeFiles = '/banners' . $Banner->url;
        $responseDelete = \Storage::delete($routeFiles);
        if($responseDelete){
          $urlNewBanner = $request->file('url');
          \Storage::disk('local')->put('/banners' . $urlNewBanner, \File::get($urlNewBanner));
          if ($urlNewBanner->isValid()) {
              $Banner->url =  $urlNewBanner;
              $Banner->update($request->all());
              $msg = "Your information has been successfully saved";
              return view('msgproccess', ['msg' => $msg]);
          }
          else{
              $msg = "Your information has not been saved, please try again.";
              return view('msgfailure', ['failed' => $msg]);
          }
        }
    }

    public function modifiedImageShowRoom (Request $request) {
      $this->validate($request,[
        'NameImage' => ['required']
      ]);
        $ShowRoom = ShowRoom::find($request->input('id'));
        $routeFiles = '/showroom' . $ShowRoom->NameImage;
        //dd($ShowRoom);
        $responseDelete = \Storage::delete($routeFiles);
        if($responseDelete){
          $NameImageShowRoom = $request->file('NameImage');
          \Storage::disk('local')->put('/showroom' . $NameImageShowRoom, \File::get($NameImageShowRoom));
          if ($NameImageShowRoom->isValid()) {
              $ShowRoom->NameImage =  $NameImageShowRoom;
              $ShowRoom->update($request->all());
              $msg = "Your information has been successfully saved";
              return view('msgproccess', ['msg' => $msg]);
          }
          else{
              $msg = "Your information has not been saved, please try again.";
              return view('msgfailure', ['failed' => $msg]);
          }
        }
    }

    public function modifiedProduct (Request $request) {
        $responseDelete = false;
        $this->validate($request,[
          'name' => ['required', 'max:63'],
          'code' => ['required', 'max:119'],
          'description' => ['max:600'],
          'price' => ['numeric'],
          'percent' => ['numeric', 'max:100'],
          'category' => ['max:20']
        ]);
        $mainImageOfProduct = $request->file('mainImage');
        $Product = Product::find($request->input('idProduct'));
        $request->merge( array( 'inStock' => serialize($request->input('inStock')) ) );
        $request->merge( array( 'soldOut' => serialize($request->input('soldOut')) ) );
        
        if(!is_null($mainImageOfProduct))
        {
          $routeFiles = '/products' . $Product->mainImage;
          $responseDelete = \Storage::delete($routeFiles);
          if($responseDelete){
            $urlNewProduct = $request->file('mainImage');
            \Storage::disk('local')->put('/products' . $urlNewProduct, \File::get($urlNewProduct));
            if ($urlNewProduct->isValid()) {
                $Product->mainImage =  $urlNewProduct;
                $Product->update($request->all());
                
                $msg = "Your information has been successfully saved";
                return view('msgproccess', ['msg' => $msg]);
            }
            else{
                $msg = "Your information has been successfully saved";
                return view('msgfailure', ['failed' => $msg]);
            }
          }
        }
        else {
            if($Product->update($request->all())) {    
                $msg = "Your information has been saved, please try again.";
                return view('msgproccess', ['msg' => $msg]);
            }
            else {
                $msg = "Your information has not been saved, please try again.";
                return view('msgfailure', ['failed' => $msg]);
            }
        }
    }
    public function modifiedAlbum (Request $request) {
      $responseDelete = false;
      $this->validate($request,[
        'name' => ['max:200'],
        'description' => ['max:300']
      ]);
      $mainImageAlbum = $request->file('mainImage');
      $Album = Album::find($request->input('idAlbum'));
      if(!is_null($mainImageAlbum))
      {
          $routeFiles = $Album->ubication;
          $responseDelete = \Storage::delete($routeFiles);
          if($responseDelete){
            $NameOfDirectory = str_replace(' ','',$request->input('name'));
            \Storage::makeDirectory($NameOfDirectory);
            $routeASaveImageMain = '/albums/' . $NameOfDirectory .$mainImageAlbum;
            \Storage::disk('local')->put($routeASaveImageMain, \File::get($mainImageAlbum));
            if ($mainImageAlbum->isValid()) {
                $AlbumNew = array(
                  'ubication' => $routeASaveImageMain,
                  'name' => $request->input('name'),
                  'description' => $request->input('description')
                );

                if($Album->update($AlbumNew))
                {
                  $msg = "Your information has been successfully saved";
                  return view('msgproccess', ['msg' => $msg]);
                }
                else {
                  $msg = "Your information has been successfully saved";
                  return view('msgfailure', ['failed' => $msg]);
                }
              }
            else{
                $msg = "Your information has been successfully saved";
                return view('msgfailure', ['failed' => $msg]);
            }
          }
        }
        else
        {
          if($Album->update($request->all())){
            $msg = "Your information has been successfully saved";
            return view('msgproccess', ['msg' => $msg]);
        }
        else {
            $msg = "Your information has not been saved, please try again.";
            return view('msgfailure', ['failed' => $msg]);
          }
        }
    }
    public function modifiedCompany (Request $request) {
        $this->validate($request,[
          'numberPhone' => ['required', 'max:63'],
          'mainEmail' => ['required', 'max:82'],
          'secondEmail' => ['required','max:82'],
          'direction' => ['required','max:222']
        ]);
        $Company = Company::find('1');
        $response = $Company->update($request->all());
        if($response){
          $msg = "Your information has been successfully saved";
          return view('msgproccess', ['msg' => $msg]);
        }
        else{
            $msg = "Your information has not been saved, please try again.";
            return view('msgfailure', ['failed' => $msg]);
        }
    }

    public function modifiedAboutUS (Request $request) {
        $responseDelete = false;
        $this->validate($request,[
          'shortDescription' => ['required'],
        ]);
        $imageOfAboutUS = $request->file('usImage');
        $AboutUS = AboutUS::find('1');
        if(!is_null($imageOfAboutUS))
        {
          $routeFiles = '/aboutus' . $AboutUS->usImage;
          $responseDelete = \Storage::delete($routeFiles);
        }


        if($responseDelete){
            $NameAboutUS = $request->file('usImage');
            \Storage::disk('local')->put('/aboutus' . $NameAboutUS, \File::get($NameAboutUS));
            if ($NameAboutUS->isValid()) {
                if($AboutUS->update($request->all())){
                  $msg = "Your information has been successfully saved";
                  return view('msgproccess', ['msg' => $msg]);
                }else{
                  $msg = "Your information has not been saved, please try again.";
                  return view('msgfailure', ['failed' => $msg]);
                }
            }
        }else{
          if($AboutUS->update($request->all())){
            $msg = "Your information has been successfully saved";
            return view('msgproccess', ['msg' => $msg]);
          }else{
            $msg = "Your information has not been saved, please try again.";
            return view('msgfailure', ['failed' => $msg]);
          }
        }
    }

    public function addShowRoom (Request $request) {

      $this->validate($request,[
        'NameImage' => ['required'],
      ]);
      Image::configure(array('driver' => 'imagick'));

      $NameImage = $request->file('NameImage');
      $sizeImage = getimagesize($NameImage);
      if(($sizeImage[0] > 660 && $sizeImage[0] < 715) && ($sizeImage[1] > 540 && $sizeImage[1] < 595))
      {
        if(session()->has('messageError'))
        {
          session()->forget('key');
        }
        //$newImageDimesions = imagescale($NameImage,245,175);
        //dd(getimagesize($newImageDimesions));
        $ubication = '/showroom'.$NameImage;
        \Storage::disk('local')->put($ubication, \File::get($NameImage));
        if ($NameImage->isValid()) {
            $ShowRoom = array(
              'NameImage' => $NameImage,
              'ubication' => $ubication,
              'state' => 2,
            );
            ShowRoom::create($ShowRoom);
            $msg = "Your information has been successfully saved";
            return view('msgproccess', ['msg' => $msg]);
        }
        else{
            $msg = "Your information has not been saved, please try again.";
            return view('msgfailure', ['failed' => $msg]);
        }
      }
      else {
          session(['messageError' => 'The dimensions of the image are not within the set range, please try again respecting this range from 670 to 710 width and 550 to 590 higth']);
          return redirect('showromm-add-image');
      }

    }


    public function deleteAlbums(Request $request)
    {
      $responseDelete = false;
      $uploads = 'uploads/';
      if(session()->has('idAlbum')){
          $AlbumToDelete = Album::find(session('idAlbum'));
          $ItemsToDelete = Item::findAll($AlbumToDelete->id);
          if(count($ItemsToDelete) > 0)
          {
            foreach($ItemsToDelete as $itemstodelete)
            {
              $responseItemDelete = Item::destroy($itemstodelete->idAlbum);
              if(!$responseItemDelete)
              {
                abort(101);
              }
            }
            $DirectoryAlbumToDelete = 'albums/' . str_replace(' ', '', $AlbumToDelete->name);
            $responseDeleteAlbumDirectory = \Storage::deleteDirectory($DirectoryAlbumToDelete);
            $responseAlbumDelete = Album::destroy($AlbumToDelete->id);
            if(!$responseAlbumDelete && !$responseDelete && !$DirectoryAlbumToDelete)
            {
              abort(101);
            }
            else {
              $msg = "Your album and items have been successfully deleted";
              return view('msgproccess', ['msg' => $msg]);
            }

          }
          elseif(count($AlbumToDelete) > 0)
          {
            $DirectoryAlbumToDelete = 'albums/' . str_replace(' ', '', $AlbumToDelete->name);
            $responseDeleteAlbumDirectory = \Storage::deleteDirectory($DirectoryAlbumToDelete);
            $responseAlbumDelete = Album::destroy($AlbumToDelete->id);
            if(!$responseAlbumDelete && !$responseDelete && !$responseDeleteAlbumDirectory)
            {
              abort(101);
            }
            else {
              $msg = "Your album have been successfully deleted";
              return view('msgproccess', ['msg' => $msg]);
            }
          }
      }
      else {
          return redirect('home');
      }
    }

    public function deleteShowRoom(Request $request)
    {
        $ResponseShowRoomDelete = ShowRoom::find($request->id)->delete();

        if($ResponseShowRoomDelete)
        {
          return response()->json('Your item has been successfully deleted');
        }
        else {
          return response()->json('The item could not be deleted, please reload the page and try again.');
        }
    }

    public function deleteProduct(Request $request)
    {
        $product = Product::find($request->id);
        $productPrice = ProductPrice::where('id_product', '=', $Product->id)->first()->delete();
        $ResponseProductDelete = $product->delete();
        
        if($ResponseProductDelete)
        {
          return response()->json('Your item has been successfully deleted');
        }
        else {
          return response()->json('The item could not be deleted, please reload the page and try again.');
        }
    }

    public function deleteCategory(Request $request)
    {
        $ResponseProductCategoryDelete = ProductCategory::find($request->id)->delete();
        if($ResponseProductCategoryDelete)
        {
          return response()->json('Your item has been successfully deleted');
        }
        else {
          return response()->json('The item could not be deleted, please reload the page and try again.');
        }
    }

    public function deleteBanner(Request $request)
    {
      $ResponseBannerDelete = Banner::find($request->id)->delete();
      if($ResponseBannerDelete)
      {
        return response()->json('Your item has been successfully deleted');
      }
      else {
        return response()->json('The item could not be deleted, please reload the page and try again.');
      }
    }

    public function deleteItem(Request $request)
    {
        $Item = Item::where('id',$request->input('id'))->first();
        $ResponseItemDelete = $Item->delete();
        if($ResponseItemDelete)
        {
          return response()->json('Your item has been successfully deleted');
        }
        else {
          return response()->json('The item could not be deleted, please reload the page and try again.');
        }
    }

    public function deleteVideo(Request $request)
    {
          $Video = Video::where('id',$request->input('id'))->first();
          $ResponseVideoDelete = $Video->delete();
          if($ResponseVideoDelete)
          {
            return response()->json('Your item has been successfully deleted');
          }
          else {
            return response()->json('The item could not be deleted, please reload the page and try again.');
          }
    }


    public function editStateItem(Request $request)
    {
          $Item = Item::where('id',$request->input('id'))->first();
          $NewStateItem = array(
              'state' => $request->input('state')
          );
          $ResponseChange = $Item->update($NewStateItem);
          if($ResponseChange)
          {
            return response()->json('Your information has been successfully saved');
          }
          else {
            return response()->json('Your information has not been saved, please try again.');
          }
    }

    public function editStateProduct(Request $request)
    {
        $Product = Product::find($request->id);
        $NewStateProduct = array(
            'state' => $request->state
        );
        $ResponseChange = $Product->update($NewStateProduct);
        if($ResponseChange)
        {
          return response()->json('Your information has been successfully saved');
        }
        else {
          return response()->json('Your information has not been saved, please try again.');
        }
    }
    public function editStateCategory(Request $request)
    {
        $Category = ProductCategory::find($request->id);
        $NewStateCategory = array(
            'state' => $request->state
        );
        $ResponseChange = $Category->update($NewStateCategory);
        if($ResponseChange)
        {
          return response()->json('Your information has been successfully saved');
        }
        else {
          return response()->json('Your information has not been saved, please try again.');
        }

    }
    
    public function editStateBanner(Request $request)
    {
        $Banner = Banner::find($request->id);
        $NewStateBanner = array(
            'state' => $request->state
        );
        $ResponseChange = $Banner->update($NewStateBanner);
        if($ResponseChange)
        {
          return response()->json('Your information has been successfully saved');
        }
        else {
          return response()->json('Your information has not been saved, please try again.');
        }
    }

    public function editStateShowRoom(Request $request)
    {
        $ShowRoom = ShowRoom::find($request->id);
        $NewStateShowRoom = array(
            'state' => $request->state
        );
        $ResponseChange = $ShowRoom->update($NewStateShowRoom);
        if($ResponseChange)
        {
          return response()->json('Your information has been successfully saved');
        }
        else {
          return response()->json('Your information has not been saved, please try again.');
        }
    }

    public function sendMail (Request $request) {
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
            }
            else
            {
              return response()->json(['typeResponse' => 0, 'message' => 'Your mail could not be sent please try again.']);
            }

        }

    }


}
