<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Research extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_id', 'type', 'detail',
    ];

    public static $validateRule = [
        'service_id' => ['required', 'numeric'],
        'type' => ['required', 'string', 'max:50'],
        'detail' => ['required', 'string'],
    ];

    public function getAllResearch()
    {
        $researches = $this::join('causes', 'research.cause_id', '=', 'causes.id')
            ->orderBy('research.id', 'desc')
            ->select('research.*', 'causes.title as cause')
            ->get();
        return $researches;
    }

    public function getAllResearchByType($type)
    {
        $researches = $this::join('causes', 'research.cause_id', '=', 'causes.id')
            ->where('research.type', $type)
            ->orderBy('causes.title', 'asc')
            ->select('research.*', 'causes.title')
            ->get();
        return $researches;
    }

    public function storeResearch(Object $request)
    {
        $image = $request->file('photo');
        $image_name      = date('YmdHis');
        $ext             = strtolower($image->getClientOriginalExtension());
        $image_full_name = $image_name . '.' . $ext;
        $upload_path     = 'public/images/researches/';
        $image_url       = $upload_path . $image_full_name;
        $success         = $image->move($upload_path, $image_full_name);
        $this->photo     = $image_url;

        $this->cause_id = $request->service_id;
        $this->type = $request->type;
        $this->title = $request->title;
        $this->timeline = $request->timeline;
        $this->detail = $request->detail;
        $storeResearch = $this->save();

        foreach ($request->researcher as $key => $value) {
            $team_data[] = [
                'research_id' => $this->id,
                'team_id' => $value,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];

            ResearchTeam::insert($team_data);
        }

        if ($request->partner != null) {
            foreach ($request->partner as $key => $value) {
                $partner_data[] = [
                    'research_id' => $this->id,
                    'partner_id' => $value,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ];

                PartnerResearch::insert($partner_data);
            }
        }

        $storeResearch
            ? session()->flash('message', 'New Research Info Created Successfully!')
            : session()->flash('message', 'Something Went Wrong!');
    }

    public function updateResearch(Object $request, Object $research)
    {
        $image = $request->file('photo');
        if ($image) {
            if (file_exists($research->photo)) unlink($research->photo) ;
            $image_name      = date('YmdHis');
            $ext             = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path     = 'public/images/researches/';
            $image_url       = $upload_path . $image_full_name;
            $success         = $image->move($upload_path, $image_full_name);
            $research->photo     = $image_url;
        }

        $research->cause_id = $request->service_id;
        $research->type = $request->type;
        $research->title = $request->title;
        $research->timeline = $request->timeline;
        $research->detail = $request->detail;
        $updateResearch = $research->save();
        ResearchTeam::where('research_id', $research->id)->delete();
        foreach ($request->researcher as $key => $value) {
            $team_data[] = [
                'research_id' => $research->id,
                'team_id' => $value,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];
        }
        ResearchTeam::insert($team_data);

        if ($request->partner != null) {
            PartnerResearch::where('research_id', $research->id)->delete();
            foreach ($request->partner as $key => $value) {
                $partner_data[] = [
                    'research_id' => $research->id,
                    'partner_id' => $value,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ];
            }
            PartnerResearch::insert($partner_data);
        }

        $updateResearch
            ? session()->flash('message', 'Research Info Updated Successfully!')
            : session()->flash('message', 'Something Went Wrong!');
    }

    public function destroyResearch(Object $research)
    {
        if (file_exists($research->photo)) unlink($research->photo);
        $destroyResearch = $research->delete();

        $destroyResearch
            ? session()->flash('message', 'Research Info Deleted Successfully!')
            : session()->flash('message', 'Something Went Wrong!');
    }
}
