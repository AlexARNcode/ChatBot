<?php

namespace App\DataFixtures;

use App\Entity\Answers;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class QuestionsAndAnswersFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $questionsAndAnswers = [
            "En quelle année est né Léonard Da Vinci ?" => "Léonard Da Vinci est né le né le 14 avril 1452",
            "Qui a inventé la Montgolfière ?" => "Joseph-Michel et Jacques-Étienne Montgolfier ont inventé la Montgolfière.",
            "Combien font 2 + 2" => "2 + 2 = 4",
            "Quel est le troisième mois de l'année ?" => "Le troisième mois de l'année est Mars",
            "Où le soleil se lève-t-il ?" => "Le soleil se lève à l'Est",
            "Quelle note correspond à 440 hertz ?" => "La note qui correspond à 440 hertz est un La.",
            "Comment vaincre la peur de quelque chose ?" => "En s'y confrontant petit à petit, à dose réduite.",
            "Quel est l'accordage standard d'une guitare ?" => "L'accordage standard d'une guitare est Mi / La / Ré / Sol / Si / Mi.",
            "Qui est l'inventeur de Linux ?" => "L'inventeur de Linux est Linus Torvalds"
        ];

        foreach ($questionsAndAnswers as $question => $answer) {
            dump($question, $answer);
            $answerEntity = new Answers();
            $answerEntity->setMessage($question);
            $answerEntity->setAnswer($answer);
            $manager->persist($answerEntity);
        }
        $manager->flush();
    }
}
