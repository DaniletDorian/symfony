<?php

namespace App\DataFixtures;

use APP\Entity\Program;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
;

class ProgramFixtures extends Fixture implements DependentFixtureInterface
{

    const PROGRAM = [
        'The Walking Dead' => [
            'category' =>"category_Action",
            'synopsis'=>"Un petit groupe de survivants mené par Rick Grimes qui tente de survivre dans un monde post-apocalyptique en proie à une invasion de zombies.",
            'poster' =>"TheWalkingDead.png"
        ],
        'Rick & Morty' => [
            'category' =>"category_Animé",
            'synopsis'=>"La série suit les mésaventures de Rick Sanchez, un scientifique cynique et fantasque, et de son petit-fils, Morty Smith, perturbé et facilement influençable, qui partagent leur temps entre une vie domestique et des aventures interdimensionnelles.",
            'poster' =>"RickMorty.png"
        ],
        'Brooklyn 99' => [
            'category' =>"category_Comédie",
            'synopsis'=>"La vie du commissariat de police du 99ème district, dans l'arrondissement de Brooklyn à New York.",
            'poster' =>"B99.png"
        ],
        'Peaky Blinders' => [
            'category' =>"category_Drame",
            'synopsis'=>"Tommy Shelby est un vétéran décoré de la Première Guerre mondiale. Avec sa fratrie, il est à la tête d'un gang, les Peaky Blinders.",
            'poster' =>"PeakyBlinders.png"
        ],
        'Ratched' => [
            'category' =>"category_Horreur",
            'synopsis'=>"Mildred Ratched, ancienne infirmière de guerre souhaite rejoindre l'équipe de l'hôpital psychiatrique du Dr Richard Hanover.",
            'poster' =>"Ratched.png"
        ],
    ];

    public function load(ObjectManager $manager)
    {
        foreach (self::PROGRAM as $title => $data) {
            $program = new Program();
            $program->setTitle($title);
            $program->setSynopsis($data['synopsis']);
            $program->setCategory($this->getReference($data['category']));
            $program->setPoster($data['poster']);
            $manager->persist($program);
            $this->addReference($title, $program);
    }
    $manager->flush();
    }

    public function getDependencies()
    {
        // Tu retournes ici toutes les classes de fixtures dont ProgramFixtures dépend
        return [
          CategoryFixtures::class,
        ];
    }
}
