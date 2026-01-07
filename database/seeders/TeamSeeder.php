<?php

namespace Database\Seeders;

use App\Models\Team;
use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    
    public function run(): void
    {
        $teams = [
            'Onder 12',
            'Onder 14',
            'Onder 16',
            'A-Selectie',
            'Veteranen',
            'Zaalvoetbal 1',
        ];

        foreach ($teams as $team) {
            Team::create(['name' => $team]);
        }
    }
}
