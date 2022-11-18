<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\HelpCentre;
use App\Models\HelpCentreChat;
use App\Models\Vendor;
use Auth;

class HelpCentreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['p_heading']      = 'Help Centre';
        return view('backend.helpcentre.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'message' => 'required',
        ]);

        if(!$validated)
                return back();

        $path = '';
        $adminId = Auth::user()->id;

        if($request->file('file'))
        {
            $imageName = time().$adminId.'.'.$request->file('file')->getClientOriginalExtension();
            $path = '/up_data/help/admin/'.$adminId;
            $request->file->move(public_path($path), $imageName);

            $path = url($path . '/' . $imageName);
        }

        $helpcentrechat = new HelpCentreChat();
        $helpcentrechat->helpchat_help_id = $request->help_id;
        $helpcentrechat->helpchat_by_admin = Auth::user()->id;
        $helpcentrechat->helpchat_file = $path;
        $helpcentrechat->helpchat_message = $request->message;
        $helpcentrechat->helpchat_by_vendor = 0;
        $helpcentrechat->helpchat_created_at = date('Y-m-d H:i:s');
        $helpcentrechat->save();

        return redirect()->route('admin.help.show', $request->help_id)->with('flash_success','Message send successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // checking for seen status
        $seen = HelpCentreChat::where([
            ['helpchat_help_id', $id],
            ['helpchat_by_vendor', '!=', 0],
            ['helpchat_by_admin', Auth::user()->id],
            ['helpchat_seen', 0]
        ]);

        // updating seen status
        if($seen->count()!=0)
        {
            $seen->update(['helpchat_seen'=>1]);
        }

        // Apply response set for admin
        $response_By_Check = HelpCentre::where([
            ['helpc_response_by', 0],
            ['helpc_id', $id]
        ]);

        if($response_By_Check->count()!=0)
        {
            $response_By_Check->update(['helpc_response_by'=>Auth::user()->id]);
        }

        $data['p_heading'] = 'Help Centre Chat';
        $help = HelpCentre::where([
            ['helpc_id', $id]
        ])->first();

        $chat = HelpCentreChat::leftjoin('help_centres','help_centres.helpc_id','=','help_centre_chats.helpchat_help_id')
        ->leftjoin('users','users.id','=','help_centre_chats.helpchat_by_admin')
        ->leftjoin('vendors','vendors.id','=','help_centre_chats.helpchat_by_vendor')
        ->where([
            ['help_centre_chats.helpchat_by_admin', Auth::user()->id],
            ['help_centre_chats.helpchat_help_id', $id]
        ])->select('help_centre_chats.*', 'help_centres.*', 'users.name as admin_name', 'vendors.contact_name as vendor_name')
        ->orderBy('help_centre_chats.helpchat_id', 'DESC');
        
        $data['helpchat'] = $chat->get();
        $data['help'] = $help;
        $data['vendor'] = Vendor::find($help->helpc_created_by);
        return view('backend.helpcentre.chat', $data);
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
    public function update(Request $request, $id)
    {
        //
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
