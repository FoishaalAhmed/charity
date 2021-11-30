<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advisor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'photo', 'detail'
    ];

    public function details()
    {
        return $this->hasMany('App\Models\AdvisorDetail');
    }

    public function storeAdvisor(Object $request)
    {
        $image = $request->file('photo');

        if ($image) {

            $image_name      = date('YmdHis');
            $ext             = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path     = 'public/images/advisors/';
            $image_url       = $upload_path . $image_full_name;
            $success         = $image->move($upload_path, $image_full_name);
            $this->photo     = $image_url;
        }

        $this->name      = $request->name;
        $storeAdvisor    = $this->save();

        foreach ($request->detail as $key => $value) {
            $data[] = [
                'advisor_id' => $this->id,
                'detail' => $value,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];
        }
        AdvisorDetail::insert($data);

        $storeAdvisor
            ? session()->flash('message', 'New Advisor Created Successfully!')
            : session()->flash('message', 'Something Went Wrong!');
    }

    public function updateAdvisor(Object $request, Int $id)
    {
        $advisor = $this::findOrFail($id);
        $image = $request->file('photo');

        if ($image) {
            if (file_exists($advisor->photo)) unlink($advisor->photo);
            $image_name      = date('YmdHis');
            $ext             = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path     = 'public/images/advisors/';
            $image_url       = $upload_path . $image_full_name;
            $success         = $image->move($upload_path, $image_full_name);
            $advisor->photo     = $image_url;
        }

        $advisor->name      = $request->name;
        $updateAdvisor      = $advisor->save();
        AdvisorDetail::where('advisor_id', $id)->delete();
        foreach ($request->detail as $key => $value) {
            if ($value == null) continue;
            $data[] = [
                'advisor_id' => $id,
                'detail' => $value,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];
        }
        AdvisorDetail::insert($data);

        $updateAdvisor
            ? session()->flash('message', 'Advisor Info Updated Successfully!')
            : session()->flash('message', 'Something Went Wrong!');
    }

    public function destroyAdvisor(Int $id)
    {
        $advisor = $this::findOrFail($id);
        if (file_exists($advisor->photo)) unlink($advisor->photo);
        $destroyAdvisor = $advisor->delete();

        $destroyAdvisor
            ? session()->flash('message', 'Advisor Deleted Successfully!')
            : session()->flash('message', 'Something Went Wrong!');
    }
}
