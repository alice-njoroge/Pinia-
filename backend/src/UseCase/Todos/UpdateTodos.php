<?php

namespace App\UseCase\Todos;
use App\Entity\Todo;
use App\Repository\TodoRepository;
use Doctrine\ORM\EntityNotFoundException;


class UpdateTodos
{
    private TodoRepository $todoRepository;


    public function __construct(TodoRepository $todoRepository, )
    {
        $this->todoRepository = $todoRepository;
    }

    /**
     * @throws EntityNotFoundException
     */
    public function execute(string $id, array $data): Todo
    {
        $todo = $this->todoRepository->find($id);
        if (empty($todo)) {
            throw new EntityNotFoundException("todo with {$id} is not found");
        }

        $todo->setTitle($data['title']);
        $todo->setCompleted($data['isCompleted']);
        $todo->setFavourite($data['isFavourite']);

        $this->todoRepository->save($todo);
        return $todo;
    }


}