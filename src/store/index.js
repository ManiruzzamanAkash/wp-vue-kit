/**
 * External dependencies.
 */
import { createStore, createLogger } from "vuex";
import settings from "./modules/settings";
import global from "./modules/global";

const debug = process.env.NODE_ENV !== "production";

const store = createStore({
    modules: {
        global,
        settings,
    },
    strict: debug,
    plugins: debug ? [createLogger()] : []
});

export default store;
