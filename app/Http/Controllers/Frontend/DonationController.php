<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Donation;
use App\Models\General;
use App\Models\Partner;
use Illuminate\Http\Request;

class DonationController extends Controller
{
    public function index()
    {
        $partners = Partner::latest()->get();
        $id = null;
        $help = General::where('name', 'help')->first();
        $donation = General::where('name', 'donation')->first();
        return view('frontend.donation', compact('partners', 'help', 'donation', 'id'));
    }

    public function cause($id, $title)
    {
        $partners = Partner::latest()->get();
        $help = General::where('name', 'help')->first();
        $donation = General::where('name', 'donation')->first();
        return view('frontend.donation', compact('partners', 'help', 'donation', 'id'));
    }

    public function store(Request $request)
    {
        $request->validate(Donation::$validateRule);
        $donationObject = new Donation();
        $donationObject->storeDonation($request);
        return back();
    }
}
