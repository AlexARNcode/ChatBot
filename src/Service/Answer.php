<?php

namespace App\Service;

class Answer
{
    public function getAnswer($questionsAndAnswers, $userQuestion)
    {
        $highestScore = 0;

        foreach ($questionsAndAnswers as $questionsAndAnswer) {
            $currentScore =  similar_text(
                $questionsAndAnswer->getMessage(),
                $userQuestion,
                $similarityScoreInPercentage
            );

            if ($currentScore > $highestScore) {
                $highestScore = $currentScore;

                unset($scoreResults);

                $scoreResults =
                    [
                        'question' => $questionsAndAnswer->getMessage(),
                        'answer' => $questionsAndAnswer->getAnswer(),
                        'score' => $similarityScoreInPercentage
                    ];


                if ($scoreResults['score'] > 50) {
                    $answer = $scoreResults['answer'];
                } else {
                    $answer = "Désolé, je n'ai pas compris la question !";
                }
            } 

            
        }

        return $answer;
    }
}
