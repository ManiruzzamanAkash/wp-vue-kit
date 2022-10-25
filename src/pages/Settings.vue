<script setup>
  import Button from '../components/button/Button.vue';
</script>

<template>
  <div class="settings-page">
    <h4>Settings</h4>
    <p>
      Demo settings using Vuex. This is of vuex working perfectly or not.
    </p>
    <form @submit="onSubmit" method="post">
      <label for="numrows"> Number of rows </label>
      <br />
      <input v-model="numrows" type="number" />
      <br />
      <br />

      <Button type="submit">Save</Button>
    </form>
  </div>
</template>

<script>
import { mapActions, mapGetters } from "vuex";
export default {
  name: "Settings",

  components: {
    Button
  },

  data() {
    return {
      numrows: 5,
    }
  },

  computed: { ...mapGetters(["isSaving", "settings"]) },

  methods: {
    ...mapActions(["storeSettings"]),
    onSubmit(e) {
      e.preventDefault();

      const setting = {
        numrows: parseInt(this.numrows)
      };

      this.storeSettings(setting);
    },
  },

  watch: {
    settings: function () {
      console.log('Vuex state settings::', this.settings);
    },
  },
};
</script>