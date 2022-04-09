<?php

namespace App\DataFixtures;

use App\Entity\Answers;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class QuestionsAndAnswersFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $answerEntity = new Answers();
        $answerEntity->setMessage('En quelle année est né Léonard Da Vinci ?');
        $answerEntity->setAnswer('Léonard Da Vinci est né le 14 avril 1452');
        $manager->persist($answerEntity);

        $answerEntity = new Answers();
        $answerEntity->setMessage('Qui a inventé la Montgolfière ?');
        $answerEntity->setAnswer('Joseph-Michel et Jacques-Étienne Montgolfier ont inventé la Montgolfière.');
        $manager->persist($answerEntity);
        $manager->flush();
    }
}
