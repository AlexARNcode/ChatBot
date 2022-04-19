<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Answers;

class AddQuestionAnswerCoupleController extends AbstractController
{
    #[Route('/question-answer-couple', name: 'add_question_and_answer_couple', methods: ['POST'])]
    public function index(Request $request, ManagerRegistry $doctrine): Response
    {
        $userData = json_decode($request->getContent(), false);

        $userQuestionToAdd = filter_var($userData->question, FILTER_SANITIZE_STRING);
        $userAnswerToAdd = filter_var($userData->answer, FILTER_SANITIZE_STRING);

        $entityManager = $doctrine->getManager();
        $questionAndAnswer = new Answers();
        $questionAndAnswer->setMessage($userQuestionToAdd);
        $questionAndAnswer->setAnswer($userAnswerToAdd);

        /** @todo: Manage errors (exception) */
        $entityManager->persist($questionAndAnswer);
        $entityManager->flush();

        return new Response('Question and answers created.', 201);
    }
}
