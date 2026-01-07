<?php

namespace Database\Seeders;

use App\Models\News;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class NewsSeeder extends Seeder
{
    
    public function run(): void
    {
        $newsItems = [
            [
                'title' => 'Welkom bij onze nieuwe clubwebsite!',
                'content' => 'We zijn verheugd om onze gloednieuwe website te lanceren. Hier vind je al het laatste nieuws, wedstrijdschema\'s en informatie over onze club events. Neem een kijkje en laat ons weten wat je ervan vindt!',
                'published_at' => Carbon::now()->subDays(10),
            ],
            [
                'title' => 'Seizoen start volgende week',
                'content' => 'Het nieuwe seizoen gaat bijna van start! Zorg ervoor dat je inschrijving compleet is en dat je klaar bent voor de eerste trainingen. We kijken uit naar een sportief en succesvol jaar.',
                'published_at' => Carbon::now()->subDays(5),
            ],
            [
                'title' => 'Inschrijvingen BBQ geopend',
                'content' => 'Onze jaarlijkse zomer BBQ komt eraan. Je kunt je vanaf nu inschrijven via het formulier in de kantine of door een mailtje te sturen naar het secretariaat. Wees er snel bij, want vol is vol!',
                'published_at' => Carbon::now()->subDays(2),
            ],
            [
                'title' => 'Gezocht: Vrijwilligers voor toernooidag',
                'content' => 'Voor ons aankomende toernooi zijn we nog op zoek naar enthousiaste vrijwilligers die willen helpen achter de bar of bij de wedstrijdleiding. Meld je aan bij het bestuur als je een handje wilt helpen.',
                'published_at' => Carbon::now()->subDay(),
            ],
        ];

        foreach ($newsItems as $item) {
            News::create($item);
        }
    }
}
