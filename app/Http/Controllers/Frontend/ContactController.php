<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use App\Models\Query;
use Illuminate\Http\Request;
use Validator;

class ContactController extends Controller
{
    public function index()
    {
        $partners = Partner::latest()->get();
        return view('frontend.contact', compact('partners'));
    }

    public function query(Request $request)
    {
        $validation = Validator::make($request->all(), [

            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'phone'   => 'required|string:max:15',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|',

        ]);

        $error_array = array();
        $success_output = '';

        if ($validation->fails()) {

            foreach ($validation->messages()->getMessages() as $field_name => $messages) {

                $error_array[] = $messages;
            }
        } else {

            $queryObject = new Query();

            $queryObject->storeQuery($request);

            $success_output = '<div class="alert alert-success"> Query Send Successfully! </div>';
        }

        $output = array(

            'error'   => $error_array,
            'success' => $success_output
        );

        echo json_encode($output);
    }
}
