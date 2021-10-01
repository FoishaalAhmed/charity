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

    public function storeDonation(Object $request)
    {
        $this->cause_id = $request->cause_id;
        $this->first_name = $request->first_name;
        $this->last_name = $request->last_name;
        $this->email = $request->email;
        $this->country = $request->country;
        $this->zip = $request->zip;
        $this->amount = $request->amount;
        $this->payment_method = $request->payment_method;
        $this->status = $request->status;
        $storeDonation = $this->save();

        $storeDonation
            ? session()->flash('message', 'Donation Done Successfully!')
            : session()->flash('message', 'Something Went Wrong!');
    }
}
