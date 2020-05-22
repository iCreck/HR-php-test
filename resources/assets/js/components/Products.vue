<template>
  <div>
    <b-table striped hover small :items="products" :fields="fields">
      <template v-if="hasProducts" #table-busy>
        <div class="text-center text-danger my-2">
          <b-spinner class="align-middle" />
          <strong>Загрузка...</strong>
        </div>
      </template>
      <template #cell(price)="data">
        <b-col sm="6">
          <b-form-input
            v-model="data.item.price"
            size="sm"
            type="number"
            placeholder="Введите цену"
            @blur="changePrice(data.item)"
          />
        </b-col>
      </template>
    </b-table>
    <div class="overflow-auto">
      <b-pagination-nav
        :link-gen="linkGen"
        :number-of-pages="totalPages"
        use-router
      />
    </div>
  </div>
</template>

<script>
import { mapActions, mapGetters } from 'vuex';

export default {
  name: 'Products',
  props: ['page'],
  data() {
    return {
      fields: [
        {
          key: 'id',
          label: 'ID',
        },
        {
          key: 'name',
          label: 'Название продукта',
        },
        {
          key: 'vendorName',
          label: 'Название поставщика',
        },
        {
          key: 'price',
          label: 'Цена продукта',
        },
      ],
    };
  },
  computed: {
    ...mapGetters('products', ['products', 'totalPages']),
    hasProducts() {
      return this.products.length > 0;
    },
  },
  watch: {
    page(val) {
      this.fetchProducts(val);
    },
  },
  created() {
    this.fetchProducts();
  },
  methods: {
    ...mapActions('products', ['fetchProducts', 'changePrice']),
    linkGen(pageNum) {
      return `/products/page/${pageNum}`;
    },
    toggleBusy() {
      this.isBusy = !this.isBusy;
    },
  },
};
</script>

<style scoped></style>
