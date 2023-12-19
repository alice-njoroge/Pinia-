import {defineStore} from "pinia";
import {useApi} from "@/composables/useApi.js";

const api = useApi();

export const useTodoStore = defineStore('todosStore',
    {
        state: () => ({
            todos: [],
            loading: false,
            isCompleted: false

        }),
        getters: {
            favourites() {
                return this.todos.filter(todo => todo.isFavourite);
            },
            completed(){
               return this.todos.filter(todo => todo.isCompleted);
            }
        },
        actions: {
            setTodos(todos) {
                this.todos = todos;
            },
            async updateTodo(todo) {
                this.setLoading(true);
                await api(`/todos/${todo.id}`, {
                    method: 'PUT',
                    body: JSON.stringify(todo)
                });
                await this.fetchTodos();
                this.setLoading(false);

            },
            setLoading(loading) {
                this.loading = loading;
            },

            async fetchTodos() {
                this.setLoading(true);

                try {
                    const todos = await api('/todos');
                    this.setTodos(todos);
                    this.setLoading(false);
                } catch (e) {
                    console.log(e)
                    this.setLoading(false);
                }
            }
        }
    })