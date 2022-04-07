<?php

namespace App\Controller;

use App\Entity\Answers;
use App\Service\Score;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GetAnswerController extends AbstractController
{
    #[Route('/getAnswer', name: 'app_get_answer', methods: ['GET'])]
    public function index(ManagerRegistry $doctrine, RequestStack $requestStack, Score $score): Response
    {
        $userQuestion = ($requestStack->getCurrentRequest()->query->get('userQuestion'));

        $questionsAndAnswers = $doctrine->getRepository(Answers::class)->findAll();

        if (!$userQuestion) {
            throw $this->createNotFoundException(
                'User question must not be empty.'
            );
        }

        if (!$questionsAndAnswers) {
            throw $this->createNotFoundException(
                'No question/answers couple found in database, 
                please create at least one.'
            );
        }

        $finalResult = $score->getHighestScore($questionsAndAnswers, $userQuestion);

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
