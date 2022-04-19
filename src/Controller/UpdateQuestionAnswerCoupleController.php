<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Answers;
use Symfony\Component\HttpFoundation\RequestStack;

class UpdateQuestionAnswerCoupleController extends AbstractController
{
    #[Route(
        '/questions-answers-couples/{questionAndAnswerCoupleId}', 
        name: 'update_questions_and_answers_couples', 
        methods: ['PUT'],
        requirements: ['questionAndAnswerCoupleId' => '\d+']
    )]
    public function index(ManagerRegistry $doctrine, $questionAndAnswerCoupleId, RequestStack $request): Response
    {
        $entityManager = $doctrine->getManager();

        $questionAndAnswerCouple = $entityManager->getRepository(Answers::class)->find($questionAndAnswerCoupleId);

        if (!$questionAndAnswerCouple) {
            throw $this->createNotFoundException(
                'No question/answer couple found for id '.$questionAndAnswerCoupleId
            );
        }

        $questionAndAnswerCouple->setMessage(
            $request->getCurrentRequest()->query->get('question')
        );
        $questionAndAnswerCouple->setAnswer(
            $request->getCurrentRequest()->query->get('answer')
        );
        $entityManager->flush();

        return new Response(
            "Question/Answer couple with id $questionAndAnswerCoupleId successfully updated", 
            200
        );
    }
}
