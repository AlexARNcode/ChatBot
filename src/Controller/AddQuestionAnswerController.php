<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Answers;

class AddQuestionAnswerController extends AbstractController
{
    #[Route('/questionsAndAnswers/add', name: 'add_question_and_answer', methods: ['POST'])]
    public function index(Request $request, ManagerRegistry $doctrine): Response
    {
        /** @todo: check/sanitize the user input data */
        $userData = json_decode($request->getContent(), false);

        $entityManager = $doctrine->getManager();
        $questionAndAnswer = new Answers();
        $questionAndAnswer->setMessage($userData->question);
        $questionAndAnswer->setAnswer($userData->answer);

        /** @todo: check that this couple doesn't already exists in DB */
        $entityManager->persist($questionAndAnswer);
        $entityManager->flush();

        return new Response('Question and answers created.', 201);
    }
}
