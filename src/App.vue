<template>
    <div id="wp-vue-kit">
        <div class="main-content">
            <h2 role="wp-vue-kit-notice" data-text="Don't remove me, I am super important for admin notice"></h2>
            <h3>{{ __('WP Vue Kit', 'wp-vue-kit') }}</h3>
            <tabs />
            <router-view />
        </div>
    </div>
</template>

<script>
import Tabs from './components/tabs/Tabs.vue';
import { menuFix } from './utils/menu-fix';

export default {
    name: 'App',
    components: {
        Tabs
    },
    watch: {
        $route() {
            menuFix();
        }
    }
};
</script>