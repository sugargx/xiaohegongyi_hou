<?php

namespace App\Http\Controllers;

use App\models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class FeedbackController extends Controller
{
    public function feedback_index()
    {
        if(Session::has('admin_id'))
        {
            $feedbacks=Feedback::all();
            return view('xiaohe_admin.feedback.index',compact('feedbacks'));
        }else{
            return redirect('budadmin');
        }

    }
    public function feedback_detail($id)
    {
        $feedback=Feedback::find($id);
        return view('xiaohe_admin.feedback.detail',compact('feedback'));
    }
    public function feedback_delete($id)
    {
        if(Session::has('admin_id'))
        {
            $feedback=Feedback::find($id);
            if($feedback->delete()){
                return redirect('feedback_index');}
        }else{
            return redirect('budadmin');
        }

    }
}
