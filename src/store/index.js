/**
 * External dependencies.
 */
import { createStore, createLogger } from "vuex";
import settings from "./modules/settings";

const debug = process.env.NODE_ENV !== "production";

const store = createStore({
    modules: {
        settings,
    },
    strict: debug,
    plugins: debug ? [createLogger()] : []
});

export default store;
