<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartnerResearch extends Model
{
    use HasFactory;

    protected $fillable = ['partner_id', 'research_id'];

    public function getPartnerResearches(Int $id)
    {
        $partners = $this::join('partners', 'partner_research.partner_id', '=', 'partners.id')
        ->where('partner_research.research_id', $id)
            ->orderBy('partners.name', 'asc')
            ->groupBy('partner_research.partner_id')
            ->select('partners.id', 'partners.name', 'partners.logo')
            ->get();
        return $partners;
    }
}
