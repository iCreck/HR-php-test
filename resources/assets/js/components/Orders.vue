<template>
  <b-card no-body>
    <b-tabs content-class="mt-3" fill card>
      <ordersTab :title="'Test tab 1'" :orders="orders" />
      <ordersTab :title="'Test tab'" :orders="orders" />
      <b-tab title="Tab 3">
        <b-card-text>Tab contents 3</b-card-text>
      </b-tab>
      <b-tab title="Tab 3">
        <b-card-text>Tab contents 2</b-card-text>
      </b-tab>
    </b-tabs>
  </b-card>
</template>

<script>
import { mapActions, mapGetters } from 'vuex';
import OrdersTab from './Orders/Tab';

export default {
  name: 'Orders',
  components: {
    ordersTab: OrdersTab,
  },
  computed: {
    ...mapGetters('orders', ['orders']),
  },
  created() {
    this.fetchOrders();
  },
  methods: {
    ...mapActions('orders', ['fetchOrders']),
  },
};
</script>

<style scoped></style>
