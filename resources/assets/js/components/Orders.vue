<template>
  <b-card no-body>
    <b-tabs content-class="mt-3" fill card>
      <b-tab title="Tab 1" active>
        <b-card-text> </b-card-text>
      </b-tab>
      <ordersTab :title="'Test tab'" :orders="items"></ordersTab>
      <b-tab title="Tab 3"> <b-card-text>Tab contents 3</b-card-text> </b-tab>
      <b-tab title="Tab 3">
        <b-card-text>Tab contents 2</b-card-text>
      </b-tab>
    </b-tabs>
  </b-card>
</template>

<script>
import OrdersTab from './Orders/Tab';

export default {
  name: 'Orders',
  data() {
    return {
      items: [
        {
          isActive: true,
          age: 40,
          first_name: 'Dickerson',
          last_name: 'Macdonald',
        },
        {
          isActive: false,
          age: 21,
          first_name: 'Larsen',
          last_name: 'Shaw',
        },
        {
          isActive: false,
          age: 89,
          first_name: 'Geneva',
          last_name: 'Wilson',
          _showDetails: true,
        },
        {
          isActive: true,
          age: 38,
          first_name: 'Jami',
          last_name: 'Carney',
        },
      ],
    };
  },
  components: {
    ordersTab: OrdersTab,
  },
};
</script>

<style scoped></style>
