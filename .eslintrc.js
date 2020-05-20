// https://eslint.org/docs/user-guide/configuring

module.exports = {
  env: {
    browser: true,
    es6: true,
    node: true,
  },

  parserOptions: {
    parser: 'babel-eslint',
  },
  extends: ['airbnb-base', 'plugin:vue/recommended'],
  rules: {},
};
