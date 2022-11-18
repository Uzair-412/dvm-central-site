<?php

namespace App\Http\Controllers\Backend;

use App\Models\Settings;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class SettingsController extends Controller
{
    protected $storage;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['p_heading']      = 'Manage Settings';
        $data['p_description']  = 'You can update settings by using the following form';

        $data['settings']     = Settings::where('key_group', 'zoom')->paginate(10);

        return view('backend.settings.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['p_heading']      = 'Create Category';
        $data['status']         = 'Y';

        return view('backend.blog-categories.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->only('name', 'status');

        BlogCategory::create($data);

        return redirect()->route('admin.blog-categories.index')->with('flash_success','Blog category added successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $setting = Settings::find($id);

        $data['setting']       = $setting;
        $data['p_heading']      = 'Update setting';

        $data['hours'] = [
            '00:00' => '00:00',
            '00:30' => '00:30',
            '01:00' => '01:00',
            '01:30' => '01:30',
            '02:00' => '02:00',
            '02:30' => '02:30',
            '03:00' => '03:00',
            '03:30' => '03:30',
            '04:00' => '04:00',
            '04:30' => '04:30',
            '05:00' => '05:00',
            '05:30' => '05:30',
            '06:00' => '06:00',
            '06:30' => '06:30',
            '07:00' => '07:00',
            '07:30' => '07:30',
            '08:00' => '08:00',
            '08:30' => '08:30',
            '09:00' => '09:00',
            '09:30' => '09:30',
            '10:00' => '10:00',
            '10:30' => '10:30',
            '11:00' => '11:00',
            '11:30' => '11:30',
            '12:00' => '12:00',
            '12:30' => '12:30',
            '13:00' => '13:00',
            '13:30' => '13:30',
            '14:00' => '14:00',
            '14:30' => '14:30',
            '15:00' => '15:00',
            '15:30' => '15:30',
            '16:00' => '16:00',
            '16:30' => '16:30',
            '17:00' => '17:00',
            '17:30' => '17:30',
            '18:00' => '18:00',
            '18:30' => '18:30',
            '19:00' => '19:00',
            '19:30' => '19:30',
            '20:00' => '20:00',
            '20:30' => '20:30',
            '21:00' => '21:00',
            '21:30' => '21:30',
            '22:00' => '22:00',
            '22:30' => '22:30',
            '23:00' => '23:00',
            '23:30' => '23:30'
        ];

        if($id == 3)
        {
            $time = json_decode($setting->key_value);
            $data['start_time'] = $time->start_time;
            $data['end_time'] = $time->end_time;
        }

        return view('backend.settings.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $setting = Settings::find($id);

        if ($id == 3)
        {
            $time = ['start_time' => $request->input('start_time'), 'end_time' => $request->input('end_time')];
            $data['key_value'] = json_encode($time);
        }
        else
        {
            $data = $request->only('key_value');
        }

        $setting->update($data);

        return redirect()->route('admin.settings.index')->with('flash_success','Setting updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Groups  $group
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        BlogCategory::find($id)->delete();

        return back()->with('flash_success','Blog category deleted successfully.');
    }

    public function sitemap()
    {
        $data['p_heading']      = 'Generate Sitemap';
        $data['p_description']  = 'Following are the details of generated sitemap and option to generate a new one';

        $data['settings']     = Settings::where('key_group', 'sitemap')->get();

        return view('backend.settings.sitemap', compact('data'));
    }
}
