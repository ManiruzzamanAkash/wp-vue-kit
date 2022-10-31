<template>
  <div class="wp-emailer-input wp-emailer-form-row">
    <div class="wp-emailer-input-label">
      <label :for="name">
        {{ label }}
      </label>
    </div>
    <div class="wp-emailer-input-content">
      <slot name="input-content">
        <div class="flex">
          <BaseInput
            :id="name"
            :name="name"
            :type="type"
            :value="value"
            :placeholder="placeholder"
            :on-change="onChange"
            :min="min"
            :max="max"
          />
          <div>
            <slot name="input-right" />
          </div>
        </div>

        <p
          v-if="hint"
          class="input-hint"
        >
          {{ hint }}
        </p>
      </slot>
    </div>
  </div>
</template>

<script>
import BaseInput from "./BaseInput.vue";

export default {
    name: "InputSection",

    components: {
        BaseInput,
    },

    props: {
        label: {
            type: String,
            required: true,
        },

        name: {
            type: String,
            required: true,
        },

        type: {
            type: String,
            required: false,
            default: "text",
        },

        value: {
            type: [String, Number, Array],
            required: false,
            default: '',
        },

        hint: {
            type: String,
            required: false,
            default: "",
        },

        placeholder: {
            type: String,
            required: false,
            default: "",
        },

        required: {
            type: Boolean,
            required: false,
            default: false,
        },

        onChange: {
            type: Function,
            required: false,
            default: () => {},
        },

        // eslint-disable-next-line vue/require-default-prop
        min: {
            type: Number,
            required: false,
        },

        // eslint-disable-next-line vue/require-default-prop
        max: {
            type: Number,
            required: false,
        },
    },
};
</script>

<style lang="scss" scoped>
.wp-emailer-input {
  display: flex;
  flex-wrap: wrap;
  flex-direction: column;

  label {
    display: block;
    margin-bottom: 10px;
  }
}

.input-hint {
  color: var(--color-secondary);
  margin: 5px 0px;
}

// Medium screen
@media only screen and (min-width: 600px) {
  .wp-emailer-input {
    flex-direction: row;

    .wp-emailer-input-label {
      flex-basis: 20%;
    }

    .wp-emailer-input-content {
      flex-basis: 80%;
      max-width: 450px;
    }
  }
}
</style>