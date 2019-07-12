<?php
/**
 * Created by PhpStorm.
 * User: wilder9
 * Date: 11/07/19
 * Time: 13:04
 */

namespace App\DataFixtures;


use App\Entity\Article;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;

class ArticleFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');
        for ($i=0; $i<=15; $i++) {
            $article = new Article();
            $article->setTitle($faker->sentence(15));
            $article->setContent($faker->sentence(150));
            $article->setPicture($faker->imageUrl($width=700, $height = 400));
            $article->setDate($faker->dateTime('now'));
            $manager->persist($article);
        }
        $manager->flush();
    }
}
