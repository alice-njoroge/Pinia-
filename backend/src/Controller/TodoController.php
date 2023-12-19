<?php

namespace App\Controller;


use App\Repository\TodoRepository;
use App\UseCase\Todos\UpdateTodos;
use Doctrine\ORM\EntityNotFoundException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class TodoController extends AbstractController
{
    private TodoRepository $todoRepository;
    private UpdateTodos $updateTodos;


    public function __construct(TodoRepository $todoRepository, UpdateTodos $updateTodos)
    {
        $this->todoRepository = $todoRepository;
        $this->updateTodos = $updateTodos;

    }

    #[Route('/todos', name: 'app_todo', methods: ['GET'])]
    public function index(): JsonResponse
    {
        $todos = $this->todoRepository->findAll();

        return $this->json($todos);
    }

    /**
     * @throws EntityNotFoundException
     */
    #[Route('/todos/{id}', name: 'app_todo_update', methods: ['PUT'])]
    public function update(Request $request, string $id): JsonResponse
    {
        $data = $request->toArray();
        $todo = $this->updateTodos->execute($id, $data);

        return $this->json($todo);
    }
}
