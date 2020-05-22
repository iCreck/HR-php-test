<template>
  <div>
    <b-navbar
      toggleable="lg"
      type="dark"
      variant="dark"
    >
      <b-navbar-brand>Тестовое задание</b-navbar-brand>

      <b-navbar-toggle target="nav-collapse" />

      <b-collapse
        id="nav-collapse"
        is-nav
      >
        <b-navbar-nav>
          <b-nav-item
            :to="'/'"
            active-class="active"
          >
            Погода в Брянске
          </b-nav-item>
        </b-navbar-nav>

        <!-- Right aligned nav items -->
        <b-navbar-nav class="ml-auto">
          <b-nav-item
            :to="'/orders'"
            right
          >
            Заказы
          </b-nav-item>
          <b-nav-item
            :to="'/products/page/1'"
            right
          >
            Продукты
          </b-nav-item>
        </b-navbar-nav>
      </b-collapse>
    </b-navbar>
  </div>
</template>

<script>
export default {
  name: 'Navigation',
};
</script>

<style scoped>

</style>
