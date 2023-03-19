import {createRouter, createWebHistory} from "vue-router";
import FeedbackIndex from  '../components/feedback/index.vue';
import notFound from "../components/notFound.vue";

const routes = [
    {
        path: '/',
        name: 'feedbackIndex',
        component: FeedbackIndex,
        meta: {
            requiresAuth: false
        }
    },
    {
        path: '/:pathMatch(.*)*',
        name: 'notFound',
        component: notFound,
        meta: {
            requiresAuth: false
        }
    }
];

const router = createRouter({
    history: createWebHistory(),
    routes
});

export default router
