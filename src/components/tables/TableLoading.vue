<template>
  <table>
    <thead>
      <tr>
        <th>
          <SkeletonText width="100px" />
        </th>
        <th>
          <SkeletonText width="100px" />
        </th>
        <th>
          <SkeletonText width="100px" />
        </th>
        <th>
          <SkeletonText width="100px" />
        </th>
        <th>
          <SkeletonText width="100px" />
        </th>
      </tr>
    </thead>
    <tbody>
      <tr
        v-for="(n, i) in 5"
        :key="i"
        style="margin-top: 50px;"
      >
        <td><SkeletonText width="100px" /></td>
        <td><SkeletonText width="100px" /></td>
        <td><SkeletonText width="100px" /></td>
        <td><SkeletonText width="100px" /></td>
        <td><SkeletonText width="100px" /></td>
      </tr>
    </tbody>
  </table>
</template>

<script>
import SkeletonText from '../skeleton/SkeletonText.vue';

export default {
    name: 'TableLoading',

    components: {
        SkeletonText
    }
};
</script>

<style lang="scss" scoped>
table {
    width: 100%;
    border-collapse: collapse;
    border: 1px solid #8080801a;

    th, td {
        padding: 10px 20px;
    }

    th {
        background: var(--color-white);
    }
}
</style>