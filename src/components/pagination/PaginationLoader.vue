<template>
  <div class="pagination-loading flex justify-between mt-10">
    <div>
      <SkeletonText width="150px" />
    </div>
    <div class="flex">
      <SkeletonText width="60px" />
      <SkeletonText width="60px" />
    </div>
  </div>
</template>

<script>
import SkeletonText from "../skeleton/SkeletonText.vue";

export default {
    name: "PaginationLoader",

    components: {
        SkeletonText,
    },
};
</script>

<style lang="scss" scoped>
.pagination-loading {
  .skeleton-text {
    height: 1.5rem;
  }

  .flex {
    .skeleton-text {
        margin-right: 5px;
    }
  }
}
</style>