<?php

namespace App\Controller;

use App\Entity\Todo;
use App\Repository\TodoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

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

    #[Route('/todos/{id}', name: 'app_todo_update', methods: ['PUT'])]
    public function update(Request $request, string $id): JsonResponse
    {
        $todo = $this->todoRepository->find($id);
        if (empty($todo)) {
            return $this->json(["error" => "todo with {$id} is not found"], status: 404); //:TODO how to find enum
        }
        $data = $request->toArray();
        $todo->setTitle($data['title']);
        $todo->setCompleted($data['isCompleted']);
        $todo->setFavourite($data['isFavourite']);

        $this->todoRepository->save($todo);
        return $this->json($todo);
    }
}
