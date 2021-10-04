<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    use HasFactory;

    protected $fillable = [
        'cause_id', 'first_name', 'last_name', 'email', 'country', 'zip', 'amount', 'payment_method', 'status',
    ];

    public static $validateRule = [
        'cause_id' => ['nullable', 'numeric'],
        'first_name' => ['required', 'string', 'max:255'],
        'last_name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'max:255'],
        'country' => ['nullable', 'string', 'max:255'],
        'zip' => ['nullable', 'string', 'max:255'],
        'amount' => ['required', 'string', 'max:255'],
        'payment_method' => ['nullable', 'string', 'max:255'],
    ];

    public function storeDonation(Object $request)
    {
        $this->cause_id = $request->cause_id;
        $this->first_name = $request->first_name;
        $this->last_name = $request->last_name;
        $this->email = $request->email;
        $this->country = $request->country;
        $this->zip = $request->zip;
        $this->amount = ($request->custom_amount != null) ? $request->custom_amount : $request->amount;
        $this->payment_method = $request->payment_method;
        $this->status = 0;
        $storeDonation = $this->save();

        $storeDonation
            ? session()->flash('message', 'Donation Done Successfully!')
            : session()->flash('message', 'Something Went Wrong!');
    }
}
