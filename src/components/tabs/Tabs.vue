<template>
  <div id="wp-vue-kit-tabs">
    <div class="tab-item">
      <router-link to="/">
        Settings
      </router-link>
    </div>
    <div class="tab-item">
      <router-link to="/list">
        List
      </router-link>
    </div>
    <div class="tab-item">
      <router-link to="/graph">
        Graph
      </router-link>
    </div>
  </div>
</template>

<script>
import "./style.scss";

export default {
    name: "Tabs",
    components: {},
    data() {
        return {};
    },
};
</script>