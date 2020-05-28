<template>
  <div>
    <div>
      <b-table
        v-if="hasProducts"
        striped
        hover
        small
        :items="products"
        :fields="fields"
      >
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
      <div v-if="hasProducts" class="overflow-auto">
        <b-pagination-nav
          :link-gen="linkGen"
          :number-of-pages="totalPages"
          use-router
        />
      </div>
    </div>
    <div class="text-center">
      <b-spinner v-if="!hasProducts" style="width: 3rem; height: 3rem;" />
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
  },
};
</script>

<style scoped></style>
