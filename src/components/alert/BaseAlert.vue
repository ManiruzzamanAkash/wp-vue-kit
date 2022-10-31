<template>
  <div
    v-if="alert?.isVisible"
    :class="{alert, success: 'success' === alert.type, error: 'error' === alert.type}"
  >
    {{ alert?.message }}

    <div
      class="close-alert"
      @click="hideAlert"
    >
      &times;
    </div>
  </div>
</template>

<script>
import { mapActions, mapGetters } from "vuex";

export default {
    name: 'BaseAlert',

    computed: { ...mapGetters(["alert"]) },

    methods: {
        ...mapActions(["setAlert", "hideAlert"]),
    },
};
</script>

<style lang="scss" scoped>
.alert {
    position: relative;
    border: 1px solid #cccccc6e;
    background: var(--color-white);
    padding: 10px 20px;
    margin-left: 0;
    transition: all;

    &.success {
        color: var(--color-success);
    }

    &.error {
        color: var(--color-error);
    }

    .close-alert {
        position: absolute;
        top: 8px;
        right: 16px;
        color: var(--color-error);
        cursor: pointer;
        font-size: 18px;
    }
}
</style>