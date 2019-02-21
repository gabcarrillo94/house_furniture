<?php

namespace App\Http\Controllers\Back;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\Meta;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->validate($request,[
            'site_name' => ['max:100'],
            'site_description' => ['max:155'],
        ]);
        if($request->page == 'site'){
            $favicon = $request->favicon_url;
            if($favicon != null)    
            {
                $size = getimagesize($favicon);
                if(($size[0] = 16) && ($size[1] = 16))
                {
                  $response = \Storage::disk('local')->put('/site' . $favicon, \File::get($favicon));
                    if ($favicon->isValid() && $response) {
                        $Setting = new Setting();
                        $Setting->site_name = $request->site_name;
                        $Setting->site_description = $request->site_description;
                        $Setting->favicon_url = $request->favicon_url;
                        $Setting->save();
                    }

                }  
            }
            

            
            

            return redirect('settings/'. $request->page);
        }
        if($request->page == 'metas'){
            return view('settings.metas');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        if($request->page == 'site'){
            $data['setting'] = Setting::get();
            $data['count_setting'] = count($data['setting']);
            return view('settings.site', $data);
        }
        if($request->page == 'metas'){
            return view('settings.metas');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $this->validate($request,[
            'site_name' => ['max:100'],
            'site_description' => ['max:300'],
        ]);
        if($request->page == 'site'){
            $favicon = $request->favicon_url;
            if($favicon != null)
            {
                $size = getimagesize($favicon);
                if(($size[0] = 16) && ($size[1] = 16))
                {
                  $response = \Storage::disk('local')->put('/site' . $favicon, \File::get($favicon));
                    if ($favicon->isValid() && $response) {
                        $Setting = Setting::find($request->site_id);
                        $Setting->site_name = $request->site_name;
                        $Setting->site_description = $request->site_description;
                        $Setting->favicon_url = $request->favicon_url;
                        $Setting->update();
                    }

                }  
            }
            else{
                $Setting = Setting::find($request->site_id);
                $Setting->site_name = $request->site_name;
                $Setting->site_description = $request->site_description;
                $Setting->update();
            }
      
            return redirect('settings/'. $request->page);
        }
        if($request->page == 'metas'){
            return view('settings.metas');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
