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

        $answerEntity = new Answers();
        $answerEntity->setMessage('Combien font 2 + 2');
        $answerEntity->setAnswer('2 + 2 = 4');
        $manager->persist($answerEntity);
        $manager->flush();

        $answerEntity = new Answers();
        $answerEntity->setMessage("Quel est le troisième mois de l'année ?");
        $answerEntity->setAnswer("Le troisième mois de l'année est Mars");
        $manager->persist($answerEntity);
        $manager->flush();

        $answerEntity = new Answers();
        $answerEntity->setMessage('Où le soleil se lève-t-il ?');
        $answerEntity->setAnswer("Le soleil se lève à l'Est");
        $manager->persist($answerEntity);
        $manager->flush();

        $answerEntity = new Answers();
        $answerEntity->setMessage('Quelle note correspond à 440 hertz ?');
        $answerEntity->setAnswer('La note qui correspond à 440 hertz est un La.');
        $manager->persist($answerEntity);
        $manager->flush();

        $answerEntity = new Answers();
        $answerEntity->setMessage('Comment vaincre la peur de quelque chose ?');
        $answerEntity->setAnswer("En s'y confrontant petit à petit, à dose réduite.");
        $manager->persist($answerEntity);
        $manager->flush();

        $answerEntity = new Answers();
        $answerEntity->setMessage("Quel est l'accordage standard d'une guitare ?");
        $answerEntity->setAnswer("L'accordage standard d'une guitare est Mi / La / Ré / Sol / Si / Mi.");
        $manager->persist($answerEntity);
        $manager->flush();

        $answerEntity = new Answers();
        $answerEntity->setMessage("Qui est l'inventeur de Linux ?");
        $answerEntity->setAnswer("L'inventeur de Linux est Linus Torvalds");
        $manager->persist($answerEntity);
        $manager->flush();
    }
}
