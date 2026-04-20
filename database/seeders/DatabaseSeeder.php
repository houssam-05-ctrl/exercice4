<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Tag;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Moroccan names for test users
        $users = [
            ['name' => 'Fatima El Maslouhi', 'email' => 'fatima.maslouhi@example.com'],
            ['name' => 'Mohamed Bennani', 'email' => 'mohamed.bennani@example.com'],
            ['name' => 'Aisha Belkadi', 'email' => 'aisha.belkadi@example.com'],
            ['name' => 'Hassan Zaki', 'email' => 'hassan.zaki@example.com'],
            ['name' => 'Layla Rachidi', 'email' => 'layla.rachidi@example.com'],
        ];

        // Create users
        $createdUsers = [];
        foreach ($users as $userData) {
            $createdUsers[] = User::factory()->create($userData);
        }

        // Create tags
        $tagNames = [
            'Maroc',
            'Culture',
            'Tradition',
            'Cuisine',
            'Architecture',
            'Tourisme',
            'Éducation',
            'Innovation',
            'Festival',
            'Artisanat',
            'Nature',
            'Écotourisme',
            'Musique',
            'Urbain',
            'Agriculture',
        ];

        $tags = [];
        foreach ($tagNames as $tagName) {
            $tags[$tagName] = Tag::create(['nom' => $tagName]);
        }

        // Realistic articles with Moroccan context and tags
        $articlesData = [
            [
                'titre' => 'Les traditions culinaires marocaines',
                'contenu' => 'Les traditions culinaires marocaines sont le reflet d\'une culture riche et diversifiée. Du tagine au couscous, chaque plat raconte une histoire de famille et de générations. La cuisine marocaine utilise des épices prestigieuses comme le cumin, le curcuma et le safran, transformant chaque repas en une expérience sensorielle unique. Ces plats traditionnels sont souvent préparés lors des occasions spéciales et représentent l\'hospitalité marocaine.',
                'tagNames' => ['Maroc', 'Culture', 'Tradition', 'Cuisine'],
            ],
            [
                'titre' => 'L\'architecture médina de Marrakech',
                'contenu' => 'La médina de Marrakech est un dédale fascinant de ruelles étroites, de riads magnifiques et de souks vibrants. Construite au XIe siècle, elle demeure un exemple remarquable de l\'architecture urbaine marocaine. Les riads, avec leurs cours intérieures ornées de fontaines et de mosaïques, offrent un havre de paix au milieu du chaos urbain. La médina a été inscrite au patrimoine mondial de l\'UNESCO en 1985.',
                'tagNames' => ['Maroc', 'Architecture', 'Tradition', 'Tourisme'],
            ],
            [
                'titre' => 'Le tourisme au Maroc en 2026',
                'contenu' => 'Le Maroc continue d\'attirer des millions de touristes chaque année. Que ce soit les randonneurs du Haut Atlas, les visiteurs des villes impériales ou les amateurs de détente des stations balnéaires, le Maroc offre une diversité inégalée. L\'industrie touristique contribue significativement à l\'économie marocaine et crée des emplois pour les générations futures. Les infrastructures hôtelières se modernisent constamment pour accueillir les voyageurs du monde entier.',
                'tagNames' => ['Maroc', 'Tourisme', 'Innovation'],
            ],
            [
                'titre' => 'L\'éducation et l\'innovation au Maroc',
                'contenu' => 'Le Maroc investit massivement dans l\'éducation et la formation numérique. Les universités marocaines proposent désormais des programmes avancés en informatique, ingénierie et sciences. L\'innovation devient un pilier du développement économique national. Des startups marocaines émergentes créent des solutions pour les défis locaux et internationaux, positionnant le Maroc comme un centre d\'innovation en Afrique du Nord.',
                'tagNames' => ['Maroc', 'Éducation', 'Innovation'],
            ],
            [
                'titre' => 'Les festivals culturels marocains',
                'contenu' => 'Les festivals culturels marocains célèbrent la richesse de notre patrimoine. Le Festival des Gnaouas à Essaouira, le Festival du Film de Marrakech et les Moussem Sidi Harazem sont des événements majeurs qui attirent artistes et visiteurs du monde entier. Ces festivals preservent les traditions tout en promouvant la créativité contemporaine. Ils jouent un rôle crucial dans la transmission culturelle et le dialogue interculturel.',
                'tagNames' => ['Maroc', 'Culture', 'Festival', 'Tradition'],
            ],
            [
                'titre' => 'L\'artisanat traditionnel marocain',
                'contenu' => 'L\'artisanat marocain est un art vivant transmis de génération en génération. Les tapis berbères, la poterie d\'Azemmour, la maroquinerie de Fès et les zellige (mosaïques) sont des exemples de cette expertise millénaire. Ces artisans utilisent des techniques anciennes préservées dans les ateliers des médinas. Chaque pièce est unique et raconte l\'histoire de son créateur et de sa région.',
                'tagNames' => ['Maroc', 'Artisanat', 'Tradition', 'Culture'],
            ],
            [
                'titre' => 'La vallée de l\'Ourika et l\'écotourisme',
                'contenu' => 'La vallée de l\'Ourika, à proximité de Marrakech, est un paradis pour les amateurs de nature et d\'écotourisme. Avec ses cascades cristallines, ses forêts de cèdres et ses villages amazighs authentiques, elle offre une évasion parfaite. Les initiatives d\'écotourisme local aident à préserver l\'environnement tout en soutenant les communautés rurales. Les randonneurs peuvent explorer les sentiers qui serpentent à travers des paysages spectaculaires.',
                'tagNames' => ['Maroc', 'Nature', 'Écotourisme', 'Tourisme'],
            ],
            [
                'titre' => 'La musique et les rythmes marocains',
                'contenu' => 'La musique marocaine est un mélange fascinant de traditions arabes, berbères et africaines. Le Gnaoui, avec ses rythmes hypnotisants, le Raï moderne et la musique amazighe traditionelle forment une symphonie culturelle unique. Les musiciens marocains contemporains fusionnent ces traditions avec des styles modernes, créant une scène musicale dynamique et innovante. La musique joue un rôle central dans la vie sociale et les célébrations marocaines.',
                'tagNames' => ['Maroc', 'Musique', 'Culture', 'Tradition'],
            ],
            [
                'titre' => 'L\'évolution des villes marocaines',
                'contenu' => 'Les villes marocaines connaissent une transformation rapide avec la modernisation et l\'urbanisation. Casablanca, Rabat et Fès équilibrent le développement urbain avec la préservation du patrimoine historique. Les nouveaux quartiers offrent des infrastructures modernes tandis que les médinas anciennes conservent leur charme authentique. Cette évolution reflète la dynamique du Maroc contemporain, où tradition et modernité coexistent.',
                'tagNames' => ['Maroc', 'Urbain', 'Architecture', 'Innovation'],
            ],
            [
                'titre' => 'L\'agriculture marocaine et la durabilité',
                'contenu' => 'L\'agriculture est le cœur de l\'économie rurale marocaine. Les cultures d\'agrumes, d\'olives et de safran sont des moteurs économiques majeurs. Les agriculteurs marocains adoptent de plus en plus des pratiques durables pour préserver les ressources naturelles. Les coopératives agricoles jouent un rôle essentiel en soutenant les petits exploitants et en promouvant les exportations vers les marchés internationaux.',
                'tagNames' => ['Maroc', 'Agriculture', 'Nature', 'Innovation'],
            ],
        ];

        // Distribute articles among users and attach tags
        foreach ($articlesData as $index => $data) {
            $user = $createdUsers[$index % count($createdUsers)];
            $article = Article::create([
                'titre' => $data['titre'],
                'contenu' => $data['contenu'],
                'user_id' => $user->id,
            ]);

            // Attach tags to article
            $articleTags = [];
            foreach ($data['tagNames'] as $tagName) {
                $articleTags[] = $tags[$tagName]->id;
            }
            $article->tags()->attach($articleTags);
        }
    }
}
