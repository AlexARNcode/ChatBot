<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Answers;
use Symfony\Component\HttpFoundation\JsonResponse;

class ListAllQuestionsAnswersCouplesController extends AbstractController
{
    #[Route('/questions-answers-couples', name: 'list_questions_and_answers_couples', methods: ['GET'])]
    public function index(ManagerRegistry $doctrine): JsonResponse
    {
        $allQuestionsAndAnswers = $doctrine->getRepository(Answers::class)->findAll();

        foreach ($allQuestionsAndAnswers as $questionAndAnswerKey => $questionAndAnswerValues) {
            $response[$questionAndAnswerValues->getId()] = [
                $questionAndAnswerValues->getMessage() => $questionAndAnswerValues->getAnswer()
            ];
        }

        return new JsonResponse($response);
    }
}
