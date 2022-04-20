<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Answers;


class ListAllQuestionsAnswersCouplesController extends AbstractController
{
    #[Route(
        '/questions-answers-couples', 
        name: 'list_questions_and_answers_couples', 
        methods: ['GET'])
    ]
    public function index(ManagerRegistry $doctrine)
    {
        $em = $doctrine->getManager();
        $query = $em->createQuery(
            'SELECT a
            FROM App\Entity\Answers a'
        );
        $allQuestionsAndAnswers = $query->getArrayResult();
    
        $response = new Response(json_encode($allQuestionsAndAnswers));
        $response->headers->set('Content-Type', 'application/json');
    
        return $response;
    
    }
}
