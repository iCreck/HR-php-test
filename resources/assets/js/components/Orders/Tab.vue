<template>
  <b-tab :title="title">
    <orders-table :orders="orders" />
  </b-tab>
</template>

<script>
import OrdersTable from './Table';
export default {
  name: 'Orders',
  props: ['title', 'orders'],
  components: {
    ordersTable: OrdersTable,
  },
};
</script>

<style scoped></style>
