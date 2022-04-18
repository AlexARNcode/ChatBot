<?php

namespace App\Controller;

use App\Entity\Answers;
use App\Service\Answer;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GetAnswerController extends AbstractController
{
    #[Route('/getAnswer', name: 'app_get_answer', methods: ['GET'])]
    public function index(ManagerRegistry $doctrine, RequestStack $requestStack, Answer $answerService): Response
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

        $answer = $answerService->getAnswer($questionsAndAnswers, $userQuestion);

        return $this->json(
            $answer
        );
    }
}
