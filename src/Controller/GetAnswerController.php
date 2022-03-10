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

        $answer = $doctrine->getRepository(Answers::class)->getAnswerWhereQuestionisLike($userMessage);

        if (empty($answer)) {
            return $this->json([
                'answer' => null
            ]);
        }

        return $this->json([
            'answer' => $answer[0]->getAnswer(),
        ]);
    }
}
