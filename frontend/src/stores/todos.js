import {defineStore} from "pinia";
import {ofetch} from "ofetch";
import {useApi} from "@/composables/useApi.js";

export const useTodoStore = defineStore('todosStore',
    {
        state: () => ({
            todos: [],
            loading: false,
            isCompleted: false

        }),
        actions: {
            setTodos(todos) {
                this.todos = todos;
            },
            setCompleted(id) {


            },
            setLoading(loading) {
                this.loading = loading;
            },

            async fetchTodos() {
                this.setLoading(true);
                const api = useApi();
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