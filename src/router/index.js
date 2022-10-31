/**
 * External dependencies.
 */
import { createRouter, createWebHistory } from "vue-router";

/**
 * Internal dependencies.
 */
import List from "../pages/List.vue";
import Settings from "../pages/Settings.vue";
import Graph from "../pages/Graph.vue";

const routes = [
    {
        path: "/",
        name: "Settings",
        component: Settings,
        alias: '/settings'
    },
    {
        path: "/list",
        name: "List",
        component: List,
    },
    {
        path: "/graph",
        name: "Graph",
        component: Graph
    }
];

const router = createRouter({
    history: createWebHistory(wpEmailer.site.base_url),
    routes
});

export default router;
