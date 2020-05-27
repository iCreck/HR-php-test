<template>
  <b-card>
    <b-table :items="items" :fields="fields" striped bordered responsive="sm" />
  </b-card>
</template>

<script>
export default {
  name: 'Detail',
  props: ['items'],
  data() {
    return {
      fields: [
        {
          key: 'id',
          label: 'ID',
        },
        {
          key: 'name',
          label: 'Название',
        },
        {
          key: 'price',
          label: 'Цена',
        },
        {
          key: 'quantity',
          label: 'Кол-во в заказе',
        },
      ],
    };
  },
};
</script>

<style scoped></style>
