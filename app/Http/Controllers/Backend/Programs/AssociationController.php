<?php

namespace App\Http\Controllers\Backend\Programs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\Programs\Association;
use App\Models\State;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
class AssociationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $data['p_heading'] = 'Manage Program Associations';
        $data['p_description'] = 'Here is the list of program Associations';
        return view('backend.programs.associations.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['p_heading'] = 'Create Program Associations';
        $data['p_description'] = '';
        $data['country'] = Country::orderBy('name', 'ASC')->pluck('name', 'id');
        return view('backend.programs.associations.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request['is_mobile'] = $request['is_mobile'] == null ? 'N' : 'Y';

        $validated = $request->validate([
            'name' => 'required|unique:associations',
        ]);
        if (!$validated) {
            return redirect()->back();
        }
        $data = $request->all();
        $data['slug'] = Str::slug($request->name);
        $file_name = '';
        if ($request->file('image')) {
            $path = public_path($this->getStorage());
            $ext = '.' . $request->file('image')->getClientOriginalExtension();

            $file_name = $data['name'] . '-' . time() . $ext;
            $data['image'] = $file_name;
            $request->file('image')->move($path, $file_name);
        }
        $data['image'] = $file_name;
        Association::create($data);
        return redirect()
            ->route('admin.programs.associations.index')
            ->with('flash_success', 'Program Asssociation added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $states = State::where('country_id', $id)
            ->orderBy('name', 'ASC')
            ->pluck('name', 'id');
        $show = '<option>Please Select State...</option>';
        foreach ($states as $key => $state) {
            $show .= '<option value="' . $key . '">' . $state . '</option>';
        }
        echo $show;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['p_heading'] = 'Update Program Association';
        $data['p_description'] = '';
        $data['association'] = Association::find($id);
        $data['country'] = Country::pluck('name', 'id');
        $data['states'] = State::where(
            'country_id',
            $data['association']->country->id
        )->pluck('name', 'id');
        return view('backend.programs.associations.create', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request['is_mobile'] = $request['is_mobile'] == null ? 'N' : 'Y';
        $validated = $request->validate([
            'name' => [
                'required',
                Rule::unique('associations')->ignore($id),
            ],
        ]);
        if (!$validated) {
            return redirect()->back();
        }
        $data = $request->all();

        $data['slug'] = Str::slug($request->name);
        $file_name = '';
        $Association = Association::find($id);
        if ($request->file('image')) {
            $path = public_path($this->getStorage());

            if ($Association->image != '') {
                $file = $path . '/' . $Association->image;

                if (file_exists($file) && is_file($file)) {
                    unlink($file);
                }
            }

            $ext = '.' . $request->file('image')->getClientOriginalExtension();
            $file_name = Str::slug($data['name']) . '-' . time() . $ext;
            $data['image'] = $file_name;
            $request->file('image')->move($path, $file_name);
        }
        $data['image'] = $file_name;
        Association::find($id)->update($data);
        // dd($data);
        return redirect()
            ->route('admin.programs.associations.index')
            ->with(
                'flash_success',
                'Program Asssociation updated successfully.'
            );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Asssociation = Association::find($id);
        $Asssociation->delete();
        $file = public_path($this->getStorage()) . '/' . $Asssociation->image;
        if (file_exists($file) && is_file($file)) {
            unlink($file);
        }
        return redirect()
            ->route('admin.programs.associations.index')
            ->with(
                'flash_danger',
                'Program Asssociation removed successfully.'
            );
    }

    public function getStorage()
    {
        return 'up_data/associations';
    }
}
