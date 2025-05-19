<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ChatController extends AbstractController
{
    #[Route('/chat', name: 'chat_index')]
    public function index()
    {
        return $this->render('chat/index.html.twig');
    }

    #[Route('/chat/send', name: 'chat_send', methods: ['POST'])]
    public function send(Request $request): JsonResponse
    {
        $message = strtolower(trim($request->request->get('message')));

        $reponses = [
            'bonjour' => 'Bonjour ! Comment puis-je vous aider ? 😊',
            'qui es-tu' => 'Je suis un chatbot simple développé avec Symfony.',
            'aide' => 'Voici quelques commandes : bonjour, qui es-tu, merci...',
            'merci' => 'Avec plaisir ! 😊',
            'au revoir' => 'À bientôt 👋',
            'who is gay in sousse?' => 'Ahmed Amara',
            'are you sure?' => 'yes',
            'who else?'=> 'Aymen amara',
            'ok, thank you'=>'asba lik',

        ];

        $reply = 'Désolé, je ne comprends pas. 😅  essaye avec un autre message';

        foreach ($reponses as $cle => $reponse) {
            if (str_contains($message, $cle)) {
                $reply = $reponse;
                break;
            }
        }

        return new JsonResponse(['reply' => $reply]);
    }
}
