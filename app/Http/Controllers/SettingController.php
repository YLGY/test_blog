<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        return view('admin.setting.edit')->with('settings', Setting::first());
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'number' => 'required',
            'email' => 'required|email',
            'address' => 'required'
        ]);

        $setting = Setting::first();
        
        $setting->site_name = $request->name;
        $setting->contact_number = $request->number;
        $setting->contact_email = $request->email;
        $setting->address = $request->address;

        $setting->save();

        $request->session()->flash('success', 'Setting updated successfully');

        return redirect()->back();
    }
}
