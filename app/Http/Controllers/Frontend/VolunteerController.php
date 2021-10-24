<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Donation;
use App\Models\Event;
use App\Models\Faq;
use App\Models\General;
use App\Models\Page;
use App\Models\Partner;
use App\Models\Volunteer;
use Illuminate\Http\Request;
use Validator;

class VolunteerController extends Controller
{
    public function index()
    {
        $volunteers = Volunteer::where('status', 1)->latest()->paginate(16);
        $volunteerCount = Volunteer::where('status', 1)->count();
        $eventCount = Event::count();
        $donarCount = Donation::where('status', 1)->count();
        $fundAmount = Donation::where('status', 1)->selectRaw('sum(amount) as total')->first()->total;
        $partners = Partner::latest()->get();
        $faqs = Faq::latest()->take(3)->get();
        $question_text = General::where('name', 'frequently-ask-question-text')->first();
        return view('frontend.volunteer', compact('volunteerCount', 'eventCount', 'donarCount', 'fundAmount', 'faqs', 'partners', 'question_text', 'volunteers'));
    }

    public function volunteer()
    {
        $partners = Partner::latest()->get();
        $help = General::where('name', 'help')->first();
        $volunteer = Page::where('id', 8)->first();
        return view('frontend.becomeVolunteer', compact('partners', 'help', 'volunteer'));
    }

    public function become(Request $request)
    {
        $validation = Validator::make($request->all(), [

            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255|unique:volunteers,email',
            'phone'   => 'required|string:max:15|unique:volunteers,phone',
            'reference' => 'nullable|string|max:255',
            'comment' => 'nullable|string|max:255',
            'status' => 'in:0',

        ]);

        $error_array = array();
        $success_output = '';

        if ($validation->fails()) {

            foreach ($validation->messages()->getMessages() as $field_name => $messages) {

                $error_array[] = $messages;
            }
        } else {

            $volunteerObject = new Volunteer();

            $volunteerObject->storeVolunteer($request);

            $success_output = '<div class="alert alert-success"> Your Request Send Successfully! Please Wait For Conformation. </div>';
        }

        $output = array(

            'error'   => $error_array,
            'success' => $success_output
        );

        echo json_encode($output);
    }
}
