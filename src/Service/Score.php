<?php

namespace App\Service;

class Score
{
    public function getHighestScore($questionsAndAnswers, $userMessage)
    {
        $highestScore = 0;

        foreach ($questionsAndAnswers as $questionsAndAnswer) {
            $currentScore =  similar_text(
                $questionsAndAnswer->getMessage(),
                $userMessage,
                $similarityScoreInPercentage
            );

            if ($currentScore > $highestScore) {
                $highestScore = $currentScore;

                unset($scoreResults);

                $scoreResults[] =
                    [
                        'question' => $questionsAndAnswer->getMessage(),
                        'answer' => $questionsAndAnswer->getAnswer(),
                        'score' => $similarityScoreInPercentage
                    ];
            }
        }

        return array_reduce($scoreResults, 'array_merge', array());
    }
}
