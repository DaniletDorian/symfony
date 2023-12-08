<?php

namespace App\DataFixtures;

use App\Entity\Season;
use App\DataFixtures\ProgramFixtures;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
;

class EpisodeFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {

    for($i = 0; $i < 5000; $i++) {

        $episode = new Episode();
        $episode->setSeason($this->getReference('season_'.rand(0, 499)));
        $episodeTitle = $faker->sentence();
        $episode->setTitle($episodeTitle);
        $episode->setSynopsis($faker->paragraph(3, true));
        
        $manager->persist($episode);
    
    }

        $manager->flush();
    }
    
    public function getDependencies()
    {
        return [
            SeasonFixtures::class,
        ];
    }
}