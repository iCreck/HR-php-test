<template>
  <b-table
    :items="orders"
    :fields="fields"
    striped
    bordered
    responsive="sm"
  >
    <template #cell(show_details)="row">
      <b-button
        size="sm"
        class="mr-2"
        @click="row.toggleDetails"
      >
        {{ row.detailsShowing ? 'Скрыть' : 'Показать' }} состав заказа
      </b-button>
    </template>

    <template #row-details="row">
      <detailView :item="row.item" />
    </template>
  </b-table>
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
      fields: ['first_name', 'last_name', 'show_details'],
    };
  },
  computed: {},
};
</script>

<style scoped></style>
