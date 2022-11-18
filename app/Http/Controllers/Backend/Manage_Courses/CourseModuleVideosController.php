<?php

namespace App\Http\Controllers\Backend\Manage_Courses;

use App\Http\Controllers\Controller;
use App\Models\CourseModule;
use App\Models\CourseModuleVideo;
use Illuminate\Http\Request;
use Vimeo;

class CourseModuleVideosController extends Controller
{
    public function index($slug)
    {
        $data['p_heading']      = 'Manage Videos';
        $data['p_description']  = 'Here is the list of videos';
        $data['module'] = CourseModule::where('slug', $slug)->first();
        return view('backend.course_management.videos.index', $data);
    }

    public function create($slug)
    {
        $data['p_heading']      = 'Create Video';
        $data['p_description']  = 'Create a new video by filling the form below';
        $data['module'] = CourseModule::where('slug', $slug)->first();
        return view('backend.course_management.videos.create', $data);
    }

    public function edit($slug, $id)
    {
        $data['p_heading']      = 'Update Video';
        $data['p_description']  = 'Update a new video by filling the form below';
        $data['module'] = CourseModule::where('slug', $slug)->first();
        $data['video'] = CourseModuleVideo::find($id);
        return view('backend.course_management.videos.create', $data);
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required|unique:course_module_videos',
            'thumbnail' => 'required',
            'video' => 'required|mimetypes:video/mp4,video/mpeg,video/quicktime'
        ]);
        $data = $request->all();
        $data['is_free'] = (bool)@$data['is_free'];
        $data['slug'] = $this->slugify($data['title']);

        if($request->file('thumbnail')){
            $file = $request->file('thumbnail');
            $filename = date('Ymdis').'.'.$file->getClientOriginalExtension();
            $file->move(public_path('up_data/courses/videos/thumbnails/'),$filename);
            $data['thumbnail'] = $filename;
        }else{
            $data['thumbnail'] = "na.webp";
        }

        
        $video = $request->file('video');
        $video_file_name = date('Ymdis').'.'.$video->getClientOriginalExtension();

        // Storing video file in server
        $video->move(public_path('up_data/courses/videos/files/'),$video_file_name);

        $uri = Vimeo::upload(public_path('up_data/courses/videos/files/'.$video_file_name), [
            'name' => $request->input('title'),
            'description' => $request->input('description')
        ]);
        $arrayUri = explode('/', $uri);
        $data['video'] = end($arrayUri);

        // Deleting video file from server
        if(is_file('/up_data/courses/videos/files/'.$video_file_name))
        {
            unlink('/up_data/courses/videos/files/'.$video_file_name);
        }

        $module = CourseModule::find($data['course_module_id']);
        CourseModuleVideo::create($data);
        CourseModuleVideo::setPaidProcess($data['course_module_id']);
        return redirect('admin/manage-courses/course/module/'.$module->slug.'/videos')->with('flash_success', 'Video added successfully.');
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $data['is_free'] = (bool)@$data['is_free'];
        $data['slug'] = $this->slugify($data['title']);

        $module = CourseModule::find($data['course_module_id']);
        $video = CourseModuleVideo::find($id);
        if($request->file('thumbnail')){
            if(is_file('/up_data/courses/videos/thumbnails/'.$video->thumbnail))
            {
                unlink('up_data/courses/videos/thumbnails/'.$video->thumbnail);
            }
            $file = $request->file('thumbnail');
            $filename = date('Ymdis').'.'.$file->getClientOriginalExtension();
            $file->move(public_path('up_data/courses/videos/thumbnails/'),$filename);
            $data['thumbnail'] = $filename;
        }

        $video_file = $request->file('video');
        if($video_file)
        {
            //  Vimeo delete video.
            $file_name='/videos/'.$video->video;
            Vimeo::request($file_name,array(),'DELETE');
        
            //  Vimeo add video.
            $video_file_name = date('Ymdis').'.'.$video_file->getClientOriginalExtension();
            // Storing video file in server
            $video_file->move(public_path('up_data/courses/videos/files/'),$video_file_name);

            $uri = Vimeo::upload(public_path('up_data/courses/videos/files/'.$video_file_name), [
                'name' => $request->input('title'),
                'description' => $request->input('description')
            ]);
            $arrayUri = explode('/', $uri);
            $data['video'] = end($arrayUri);
            // Deleting video file from server
            if(is_file('/up_data/courses/videos/files/'.$video_file_name))
            {
                unlink('/up_data/courses/videos/files/'.$video_file_name);
            }
        }
        $video->update($data);

        CourseModuleVideo::setPaidProcess($data['course_module_id'] );
        return redirect('admin/manage-courses/course/module/'.$module->slug.'/videos')->with('flash_success', 'Video updated successfully.');
    }

    public function destroy($id)
    {
        $video = CourseModuleVideo::find($id);
        $file_name='/videos/'.$video->video;
        //  Vimeo delete video.
        $uri = Vimeo::request($file_name,array(),'DELETE');
        if($uri['status']===200)
        {
            if(@$video->thumbnail)
            {
                unlink('up_data/courses/videos/thumbnails/'.$video->thumbnail);
            }
            $video->delete();
            return redirect()->back()->with('flash_danger', 'Video deleted successfully.');
        }
        else
        {
            return redirect()->back()->with('flash_danger', 'Video request is not valid.');
        }
    }
}
