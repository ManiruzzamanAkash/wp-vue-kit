<template>
  <div class="mt-50">
    <SkeletonText width="200px" />
    <SkeletonText width="500px" />

    <div class="flex w-full mt-50">
      <div><SkeletonText width="200px" /></div>
      <div class="ml-50">
        <SkeletonText width="400px" />
      </div>
    </div>

    <div class="flex w-full mt-20">
      <div><SkeletonText width="200px" /></div>
      <div class="ml-50">
        <SkeletonText width="400px" />
      </div>
    </div>

    <div class="flex w-full mt-20">
      <div><SkeletonText width="200px" /></div>
      <div class="ml-50">
        <SkeletonText width="400px" />
      </div>
    </div>

    <div class="flex w-full mt-50">
      <div><SkeletonText width="200px" /></div>
      <div class="ml-50">
        <SkeletonText width="400px" />
      </div>
    </div>
    <div class="flex w-full mt-20">
      <div><SkeletonText width="200px" /></div>
      <div class="ml-50">
        <SkeletonText width="400px" />
      </div>
    </div>
  </div>
</template>

<script>
import SkeletonText from "../skeleton/SkeletonText.vue";

export default {
    name: "SettingFormLoading",

    components: {
        SkeletonText,
    },
};
</script>
