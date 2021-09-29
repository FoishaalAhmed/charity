<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'facebook', 'twitter', 'instagram', 'photo', 'position', 'priority',
    ];

    public function storeTeam(Object $request)
    {
        $image = $request->file('photo');

        if ($image) {

            $image_name      = date('YmdHis');
            $ext             = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path     = 'public/images/teams/';
            $image_url       = $upload_path . $image_full_name;
            $success         = $image->move($upload_path, $image_full_name);
            $this->photo     = $image_url;
        }

        $this->name      = $request->name;
        $this->facebook  = $request->facebook;
        $this->twitter   = $request->twitter;
        $this->instagram = $request->instagram;
        $this->position  = $request->position;
        $this->priority  = $request->priority;
        $storeTeam       = $this->save();

        $storeTeam
            ? session()->flash('message', 'New Team Member Created Successfully!')
            : session()->flash('message', 'Something Went Wrong!');
    }

    public function updateTeam(Object $request, Int $id)
    {
        $team = $this::findOrFail($id);
        $image = $request->file('photo');

        if ($image) {
            if (file_exists($team->photo)) unlink($team->photo);
            $image_name      = date('YmdHis');
            $ext             = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path     = 'public/images/teams/';
            $image_url       = $upload_path . $image_full_name;
            $success         = $image->move($upload_path, $image_full_name);
            $team->photo     = $image_url;
        }

        $team->name      = $request->name;
        $team->facebook  = $request->facebook;
        $team->twitter   = $request->twitter;
        $team->instagram = $request->instagram;
        $team->position  = $request->position;
        $team->priority  = $request->priority;
        $updateTeam      = $team->save();

        $updateTeam
            ? session()->flash('message', 'Team Member Info Updated Successfully!')
            : session()->flash('message', 'Something Went Wrong!');
    }

    public function destroyTeam(Int $id)
    {
        $team = $this::findOrFail($id);
        if (file_exists($team->photo)) unlink($team->photo);
        $destroyTeam = $team->delete();

        $destroyTeam
            ? session()->flash('message', 'Team Member Deleted Successfully!')
            : session()->flash('message', 'Something Went Wrong!');
    }
}
