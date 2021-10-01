<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    private $partnerObject;

    public function __construct()
    {
        $this->partnerObject = new Partner();
    }

    public function index()
    {
        $partners = Partner::latest()->get();
        return view('backend.admin.partner', compact('partners'));
    }

    public function store(Request $request)
    {
        $request->validate(Partner::$validateRule);
        $this->partnerObject->storePartner($request);
        return back();
    }

    public function update(Request $request, $id)
    {
        $request->validate(Partner::$validateRule);
        $this->partnerObject->updatePartner($request, $request->id);
        return back();
    }

    public function destroy($id)
    {
        $this->partnerObject->destroyPartner($id);
        return back();
    }
}
