<template>
  <div>
    <b-table
      v-if="hasOrders"
      :items="orders"
      :fields="fields"
      striped
      bordered
      responsive="sm"
    >
      <template #cell(showItems)="row">
        <b-button size="sm" class="mr-2" @click="row.toggleDetails">
          {{ row.detailsShowing ? 'Скрыть' : 'Показать' }} состав заказа
        </b-button>
      </template>

      <template #row-details="row">
        <detailView :items="row.item.items" />
      </template>
    </b-table>
    <div class="text-center">
      <b-spinner v-if="!hasOrders" style="width: 3rem; height: 3rem;" />
    </div>
  </div>
</template>

<script>
import Detail from './Detail';

export default {
  name: 'Table',
  components: {
    detailView: Detail,
  },
  props: ['orders'],
  data() {
    return {
      fields: [
        {
          key: 'id',
          label: 'ID',
        },
        {
          key: 'partnerName',
          label: 'Название партнера',
        },
        {
          key: 'total',
          label: 'Стоимость заказа',
        },
        {
          key: 'showItems',
          label: 'Состав заказа',
        },
        {
          key: 'status',
          label: 'Статус заказа',
        },
      ],
    };
  },
  computed: {},
  methods: {
    hasOrders() {
      return this.orders.length > 0;
    },
  },
};
</script>

<style scoped></style>
