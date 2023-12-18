import {ofetch} from "ofetch";

export function useApi() {
    return ofetch.create({
        baseURL: 'http://127.0.0.1:8000'
    })
}