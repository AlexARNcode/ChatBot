<?php

namespace App\Controller;

use App\Entity\Answers;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GetAnswerController extends AbstractController
{
    #[Route('/getAnswer', name: 'app_get_answer')]
    public function index(ManagerRegistry $doctrine, RequestStack $requestStack): Response
    {
        $userMessage = ($requestStack->getCurrentRequest()->query->get('message'));

        $questionsAndAnswers = $doctrine->getRepository(Answers::class)->findAll();


        if (!$questionsAndAnswers) {
            throw $this->createNotFoundException(
                'No question/answers couple found in database, 
                please create at least one.'
            );
        }

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

        $finalResult = array_reduce($scoreResults, 'array_merge', array());

        if ($finalResult['score'] > 50) {
            $answer = $finalResult['answer'];
        } else {
            $answer = "Désolé, je n'ai pas compris la question !";
        }

        return $this->json(
            [
                'answer' => $answer
            ]
        );
    }
}
