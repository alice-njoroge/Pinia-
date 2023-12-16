import {defineStore} from "pinia";

export const useTodoStore = defineStore('todosStore',
    {
        state: () => ({
            todos: [
                {task: 'make the bed', id: 1, status: '1', favourites: false},
                {task: 'watch TV', id: 2, status: '2', favourites: true},
                {task: 'journaling', id: 3, status: '2', favourites: true},
            ]
        })
    })