<?php

namespace App\Service;

class Answer
{
    /**
     * Returns an answer corresponding to a question sent by the user.
     * It will search for the more similar question in the database, and will find its corresponding answer.
     * If the user question is not similar enough to a question in the database (i.e less than 50%), it will generate a default answer.
     *
     * @param  array $questionsAndAnswers
     * @param  string $userQuestion
     * @return string
     */

    protected const DEFAULT_ANSWER = "Désolé, je n'ai pas compris la question !";

    public function getAnswer($questionsAndAnswers, $userQuestion) {
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
                    return $scoreResults['answer'];
                }
            }
        }

        return self::DEFAULT_ANSWER;
    }
}
