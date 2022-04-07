<?php

namespace App\Service;

class Score
{
    public function getHighestScore($questionsAndAnswers, $userQuestion): array
    {
        foreach ($questionsAndAnswers as $questionsAndAnswer) {
            $currentScore =  similar_text(
                $questionsAndAnswer->getMessage(),
                $userQuestion,
                $similarityScoreInPercentage
            );

                unset($scoreResults);

                $scoreResults[] =
                    [
                        'question' => $questionsAndAnswer->getMessage(),
                        'answer' => $questionsAndAnswer->getAnswer(),
                        'score' => $similarityScoreInPercentage
                    ];
            
        }

        return array_reduce(
            $scoreResults, 'array_merge', array()
        );
    }
}
