<template>
  <div
    class="skeleton skeleton-text"
    :style="skeletonWidthStyle"
  />
</template>

<script>
export default {
    name: "SkeletonText",

    props: {
        width: {
            type: String,
            required: false,
            default: '100%',
        }
    },

    computed: {
        skeletonWidthStyle() {
            return {
                width: this.width
            };
        }
    }
};
</script>

<style lang="scss" scoped>
.skeleton {
  animation: skeleton-loading 1s linear infinite alternate;
}

@keyframes skeleton-loading {
  0% {
    background-color: hsl(200, 20%, 80%);
  }
  100% {
    background-color: hsl(200, 20%, 95%);
  }
}

.skeleton-text {
  width: 100%;
  height: 0.7rem;
  margin-bottom: 0.5rem;
  border-radius: 0.25rem;
}
</style>