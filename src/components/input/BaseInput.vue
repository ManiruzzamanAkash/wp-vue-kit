<template>
  <div class="input-area">
    <!-- Handle input component for general inputs like, text, number, email -->
    <input
      v-if="isDefaultInput"
      :id="name"
      class="input-main"
      :name="name"
      :type="type"
      :value="value"
      :placeholder="placeholder"
      :onchange="onChangeInput"
      :min="min"
      :max="max"
    >

    <!-- Handle input component for switch type input -->
    <label v-if="isCheckbox">
      <input
        type="checkbox"
        :checked="isChecked"
        :onchange="onChangeInput"
      >
      <span class="toggle-switch" />

      <span>
        {{ isChecked ? "On" : "Off" }}
      </span>
    </label>
  </div>
</template>

<script>
export default {
    name: "BaseInput",

    props: {
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

    computed: {
        isDefaultInput() {
            const defaultInputTypes = ["text", "number", "email", "search", "url"];
            return defaultInputTypes.includes(this.type);
        },

        isCheckbox() {
            return "switch" === this.type || "checkbox" === this.type;
        },

        isChecked() {
            return parseInt(this.value) === 1;
        }
    },

    methods: {
        onChangeInput(e) {
            // Handle various input type and process.
            if (this.isCheckbox) {
                this.onChange({
                    key: this.name,
                    value: e.target.checked ? 1 : 0,
                });
                return;
            }

            this.onChange({
                key: this.name,
                value: e.target.value,
            });
        },
    },
};
</script>

<style lang="scss" scoped>
.input-area {
  background: transparent;
  flex-basis: 90%;
}

.input-main {
  border: 1px solid var(--color-border);
  border-radius: 4px;
  box-shadow: none;
  color: var(--color-secondary-dark);
  display: inline-block;
  vertical-align: middle;
  padding: 7px 12px;
  margin: 0 10px 0 0;
  width: 100%;
  min-height: 35px;
  line-height: 1.3;
}

.toggle-switch {
  position: relative;
  cursor: pointer;
  background-color: #ccc;
  border-radius: 15px;
  -webkit-transition: all 0.2s ease-in-out;
  -moz-transition: all 0.2s ease-in-out;
  -ms-transition: all 0.2s ease-in-out;
  transition: all 0.2s ease-in-out;
  vertical-align: middle;
  display: inline-block;
  margin: -1px 5px 0 0;
  width: 36px;
  height: 20px;

  &::before {
    position: absolute;
    content: "";
    height: 16px;
    width: 16px;
    left: 2px;
    top: 2px;
    background-color: #fff;
    border-radius: 50%;
    -webkit-transition: all 0.2s ease-in-out;
    -moz-transition: all 0.2s ease-in-out;
    -ms-transition: all 0.2s ease-in-out;
    transition: all 0.2s ease-in-out;
  }
}

input[type="checkbox"] {
  position: absolute;
  top: auto;
  overflow: hidden;
  clip: rect(1px, 1px, 1px, 1px);
  width: 1px;
  height: 1px;
  white-space: nowrap;

  &:checked::before {
    content: url("data:image/svg+xml;utf8,%3Csvg%20xmlns%3D%27http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%27%20viewBox%3D%270%200%2020%2020%27%3E%3Cpath%20d%3D%27M14.83%204.89l1.34.94-5.81%208.38H9.02L5.78%209.67l1.34-1.25%202.57%202.4z%27%20fill%3D%27%233582c4%27%2F%3E%3C%2Fsvg%3E");
    margin: -0.1875rem 0 0 -0.25rem;
    height: 1.3125rem;
    width: 1.3125rem;
  }

  &:checked + .toggle-switch {
    background-color: #00a32a;

    &::before {
      -webkit-transform: translateX(16px);
      -ms-transform: translateX(16px);
      transform: translateX(16px);
    }
  }
}

// Medium screen
@media only screen and (min-width: 600px) {
  .input-main {
    max-width: 400px;
  }
}
</style>