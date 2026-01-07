<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Faq;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    
    public function run(): void
    {
        $algemeen = Category::where('name', 'Algemeen')->first();
        $lidmaatschap = Category::where('name', 'Lidmaatschap')->first();
        $evenementen = Category::where('name', 'Evenementen')->first();
        $competitie = Category::where('name', 'Competitie')->first();

        $faqs = [
            [
                'question' => 'Hoe kan ik lid worden?',
                'answer' => 'Je kunt lid worden door het inschrijfformulier op de website in te vullen. Na verwerking ontvang je een bevestiging per e-mail.',
                'category_id' => $lidmaatschap?->id,
            ],
            [
                'question' => 'Wat zijn de contributiekosten?',
                'answer' => 'De contributie hangt af van je leeftijdscategorie. Je vindt een volledig overzicht op de pagina "Lidmaatschap".',
                'category_id' => $lidmaatschap?->id,
            ],
            [
                'question' => 'Wanneer zijn de trainingen?',
                'answer' => 'De trainingstijden voor het huidige seizoen staan onder het kopje "Team info". Dit kan per team verschillen.',
                'category_id' => $competitie?->id,
            ],
            [
                'question' => 'Kan ik de kantine huren voor een feestje?',
                'answer' => 'Ja, voor leden is het mogelijk om de kantine te huren buiten openingstijden. Neem contact op met de kantinebeheerder voor de mogelijkheden.',
                'category_id' => $algemeen?->id,
            ],
            [
                'question' => 'Waar vind ik foto\'s van evenementen?',
                'answer' => 'Foto\'s van toernooien en feesten worden meestal gedeeld op onze Facebookpagina en in het fotoalbum op deze site.',
                'category_id' => $evenementen?->id,
            ],
        ];

        foreach ($faqs as $faq) {
            if ($faq['category_id']) {
                Faq::create($faq);
            }
        }
    }
}
