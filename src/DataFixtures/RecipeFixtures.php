<?php

namespace App\DataFixtures;

use App\Entity\Recipe;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class RecipeFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $recipesData = [
            [
                'title' => 'Spaghetti Carbonara',
                'description' => 'Délicieux spaghetti à la sauce crémeuse avec lardons et parmesan.',
                'preparationTime' => 30,
                'difficulty' => 'Facile',
                'ingredients' => 'Spaghetti, lardons, œufs, parmesan, sel, poivre',
            ],
            [
                'title' => 'Tarte aux pommes',
                'description' => 'Tarte maison simple et rapide.',
                'preparationTime' => 45,
                'difficulty' => 'Facile',
                'ingredients' => 'Pâte brisée, pommes, sucre, beurre, cannelle',
            ],
            [
                'title' => 'Poulet rôti au four',
                'description' => 'Poulet doré et croustillant, accompagné de légumes.',
                'preparationTime' => 60,
                'difficulty' => 'Moyen',
                'ingredients' => 'Poulet entier, carottes, pommes de terre, huile, sel, poivre',
            ],
            [
                'title' => 'Salade César',
                'description' => 'Salade fraîche avec poulet, croûtons et parmesan.',
                'preparationTime' => 15,
                'difficulty' => 'Facile',
                'ingredients' => 'Laitue, poulet grillé, croûtons, parmesan, sauce César',
            ],
            [
                'title' => 'Quiche lorraine',
                'description' => 'Quiche traditionnelle avec lardons et fromage.',
                'preparationTime' => 40,
                'difficulty' => 'Moyen',
                'ingredients' => 'Pâte brisée, lardons, œufs, crème, fromage râpé, sel, poivre',
            ],
            [
                'title' => 'Ratatouille',
                'description' => 'Mélange de légumes mijotés aux herbes de Provence.',
                'preparationTime' => 50,
                'difficulty' => 'Facile',
                'ingredients' => 'Aubergine, courgette, poivron, tomate, oignon, huile, herbes de Provence',
            ],
            [
                'title' => 'Boeuf bourguignon',
                'description' => 'Boeuf mijoté au vin rouge avec légumes et champignons.',
                'preparationTime' => 150,
                'difficulty' => 'Difficile',
                'ingredients' => 'Boeuf, vin rouge, carottes, oignons, champignons, lardons, ail, bouquet garni',
            ],
            [
                'title' => 'Crêpes sucrées',
                'description' => 'Crêpes fines et légères, parfaites pour le dessert.',
                'preparationTime' => 20,
                'difficulty' => 'Facile',
                'ingredients' => 'Farine, œufs, lait, sucre, beurre, sel',
            ],
            [
                'title' => 'Soupe de légumes',
                'description' => 'Soupe saine et nourrissante, idéale pour l’hiver.',
                'preparationTime' => 35,
                'difficulty' => 'Facile',
                'ingredients' => 'Carottes, poireaux, pommes de terre, oignon, bouillon, sel, poivre',
            ],
            [
                'title' => 'Lasagnes à la bolognaise',
                'description' => 'Lasagnes généreuses avec sauce bolognaise maison.',
                'preparationTime' => 90,
                'difficulty' => 'Moyen',
                'ingredients' => 'Feuilles de lasagnes, viande hachée, sauce tomate, béchamel, fromage râpé',
            ],
        ];

        foreach ($recipesData as $data) {
            $recipe = new Recipe();
            $recipe->setTitle($data['title']);
            $recipe->setDescription($data['description']);
            $recipe->setPreparationTime($data['preparationTime']);
            $recipe->setDifficulty($data['difficulty']);
            $recipe->setIngredients($data['ingredients']); // IMPORTANT
            $manager->persist($recipe);
        }
   

        $manager->flush();
    }
}
