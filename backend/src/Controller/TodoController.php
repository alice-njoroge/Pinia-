<?php

namespace App\Controller;

use App\Repository\TodoRepository;
use http\Client\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Normalizer\NormalizableInterface;
use Symfony\Component\Serializer\SerializerInterface;

class TodoController extends AbstractController
{
    private TodoRepository $todoRepository;

    public function __construct(TodoRepository $todoRepository)
    {
        $this->todoRepository = $todoRepository;

    }

    #[Route('/todos', name: 'app_todo', methods: ['GET'])]
    public function index(): JsonResponse
    {
        $todos = $this->todoRepository->findAll();

        return $this->json($todos);
    }
}
