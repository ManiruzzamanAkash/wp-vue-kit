<template>
  <div class="wp-emailer-card">
    <div class="wp-emailer-card-header wp-emailer-form-row">
      <h2 class="title">
        {{ headerTitle }}
      </h2>
      <p class="description">
        {{ headerDescription }}
      </p>
    </div>
    <div class="wp-emailer-card-content">
      <slot name="content" />
    </div>
  </div>
</template>

<script>
export default {
    name: "BaseCard",

    props: {
        headerTitle: {
            type: String,
            required: true,
        },

        headerDescription: {
            type: String,
            required: false,
            default: "",
        },
    },
};
</script>

<style lang="scss" scoped>
.wp-emailer-card {
  border-radius: 4px;

  .wp-emailer-card-header {
    padding: 20px 0 !important;

    .title {
      color: var(--color-secondary-dark);
      font-size: 20px;
      font-weight: 700;
      margin: 0 0 6px 0;
    }
    .description {
      color: var(--color-secondary-lite);
    }
  }
}
</style>