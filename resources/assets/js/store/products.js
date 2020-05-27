import axios from 'axios';

class Product {
  constructor(id, name, vendorName, price) {
    this.id = id;
    this.name = name;
    this.vendorName = vendorName;
    this.price = price;
  }
}

export default {
  namespaced: true,
  state: {
    products: [],
    totalPages: 1,
  },
  mutations: {
    setProducts(state, payload) {
      state.products = payload;
    },
    setTotalPages(state, payload) {
      state.totalPages = payload;
    },
  },
  actions: {
    async fetchProducts({ commit }, page = 1) {
      const response = await axios.get(`/api/products?page=${page}`);
      const products = response.data.data;

      const resultProducts = products.map(
        ({ id, name, vendor, price }) =>
          new Product(id, name, vendor.name, price),
      );
      commit('setProducts', resultProducts);
      commit('setTotalPages', response.data.last_page);
    },
    async changePrice(_, product) {
      await axios.patch(`/api/products/${product.id}`, product);
    },
  },
  getters: {
    products(state) {
      return state.products;
    },
    totalPages(state) {
      return state.totalPages;
    },
  },
};
