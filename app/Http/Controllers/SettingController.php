<?php

namespace App\Http\Controllers;

use App\Http\Requests\Dashboard\SettingUpdateRequest;
use App\Models\Setting;
use App\Utils\imageUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    private $request ;

    public function __construct(SettingUpdateRequest $request) {
        $this->request = $request;
    }
    public function index() {
        return view('dashboard.settings.index');
    }
    public function update(Setting $setting)
    {
        $setting->update($this->request->validated());
        if ($this->request->has('logo') ) 
        {
            $logo = imageUpload::uploadImage($this->request->logo , 'logo/');
            $setting->update(['logo' => $logo]);
        }
        if ($this->request->has('favicon')) 
        {
            $favicon = imageUpload::uploadImage($this->request->favicon , 'logo/');
            $setting->update(['favicon' => $favicon]);
        }
        // dd($logo , $favicon);
        // $setting->update(['logo' => $logo,'favicon'=>$favicon] );
        return redirect()->route('dashboard.settings.index')->with('success', ' تم التحديث');
    }
    
    
}
