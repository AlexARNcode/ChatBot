<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Answers;

class RemoveQuestionAnswerCoupleController extends AbstractController
{
    private const NO_QUESTION_ANSWER_COUPLE_FOUND = 'No question/answer couple found for the id : ';
    private const QUESTION_ANSWER_COUPLE_DELETED = 'Successfully deleted question/answer couple with id : ';

    #[Route(
        '/questions-answers-couples/{questionAndAnswerCoupleId}',
        name: 'remove_question_and_answer_couple',
        requirements: ['questionAndAnswerCoupleId' => '\d+'],
        methods: ['DELETE', 'OPTIONS']
    )]
    public function index(ManagerRegistry $doctrine, $questionAndAnswerCoupleId): Response
    {
        $questionAndAnswerCouple = $doctrine->getRepository(Answers::class)->find($questionAndAnswerCoupleId);
        
        if (!$questionAndAnswerCouple) {
            return new Response(
                self::NO_QUESTION_ANSWER_COUPLE_FOUND . $questionAndAnswerCoupleId,
                400
            );
        }

        $entityManager = $doctrine->getManager();
        $entityManager->remove($questionAndAnswerCouple);
        $entityManager->flush();

        return new Response(self::QUESTION_ANSWER_COUPLE_DELETED .  $questionAndAnswerCoupleId, 200);
    }
}
