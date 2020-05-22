<template>
  <b-card>
    <b-row class="mb-2">
      <b-col sm="3" class="text-sm-right">
        <b>Age:</b>
      </b-col>
      <b-col>{{ item.age }}</b-col>
    </b-row>

    <b-row class="mb-2">
      <b-col sm="3" class="text-sm-right">
        <b>Is Active:</b>
      </b-col>
      <b-col>{{ item.isActive }}</b-col>
    </b-row>
  </b-card>
</template>

<script>
export default {
  name: 'Detail',
  props: ['item'],
};
</script>

<style scoped></style>
