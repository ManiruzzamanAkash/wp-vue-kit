module.exports = {
    extends: ["plugin:vue/vue3-essential", "plugin:vue/vue3-recommended"],
    rules: {
        semi: ["error", "always"],
        indent: ["error", 4],
        "no-multi-spaces": ["off"],
        "key-spacing": ["off"],
        "space-before-function-paren": ["error", "never"],
        camelcase: ["off"],
        "vue/no-unused-vars": "error"
    }
};
