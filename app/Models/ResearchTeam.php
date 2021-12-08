<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResearchTeam extends Model
{
    use HasFactory;

    protected $fillable = ['team_id', 'research_id'];

    public function getResearchTeams(Int $id)
    {
        $teams = $this::join('teams', 'research_teams.team_id', '=', 'teams.id')
            ->where('research_teams.research_id', $id)
            ->orderBy('teams.name', 'asc')
            ->select('teams.id', 'teams.name', 'teams.position', 'teams.photo')
            ->get();
        return $teams;
    }
}
