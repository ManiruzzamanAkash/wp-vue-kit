<template>
  <div class="chart-loading-area">
    <SkeletonText />
    <SkeletonText />
    <SkeletonText />
    <SkeletonText />
    <SkeletonText />
  </div>
</template>

<script>
import SkeletonText from '../skeleton/SkeletonText.vue';

export default {
    name: 'BarChartLoading',

    components: {
        SkeletonText
    }
};
</script>

<style lang="scss" scoped>
.chart-loading-area {
    margin-top: 20px;
    border: 1px solid #8080801a;
    padding: 40px 20px;

    .skeleton {
      margin-top: 20px;
    }

    .skeleton-text {
      height: 1.8rem;
    }
}
</style>