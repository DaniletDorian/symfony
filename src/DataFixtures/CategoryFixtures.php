<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;


class CategoryFixtures extends Fixture
{

    const CATEGORIES = [
        'Action',
        'Animé',
        'Comédie',
        'Drame',
        'Horreur',
        'Policier',
        'Romance',
        'Séries documentaires',
        'Science fiction',
        'Téléréalité',
    ];
    
    public function load(ObjectManager $manager)
    {
        foreach (self::CATEGORIES as $key => $categoryName) {  
            $category = new Category();  
            $category->setName($categoryName);  

            $manager->persist($category);  
        }  
        $manager->flush();
    }
}