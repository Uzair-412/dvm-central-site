<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\UserDocument;
use Illuminate\Http\Request;

class UserDocumentsController extends Controller
{
    public function user_documents($id)
    {
        $data['p_heading']      = 'User Documents / ' .$id;
        return view('backend.user-documents.index' ,compact('data', 'id'));
    }

    public function level_upgrade($user_id, $level){

        // upgrading user level
        $user = Customer::find($user_id);
        $user->level = $level; 
        $user->save();

        // changing user documents approval status
        $user_document_status = UserDocument::where('user_id',$user_id)->first();
        $user_document_status->status ='approved';
        $user_document_status->save();
        return redirect()->back()->with('flash_success','User Level Upgraded Successfully');
    }

    public function decline($id){
        $user_document_status = UserDocument::find($id);
        $user_document_status->status ='declined';
        $user_document_status->save();
        return redirect()->back()->with('flash_danger','User Level upgrade request declined');
    }
}
