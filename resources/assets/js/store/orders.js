import axios from 'axios';

class Order {
  constructor(id, clientEmail, total, status, partner, items) {
    this.id = id;
    this.clientEmail = clientEmail;
    this.total = total;
    this.status = status;
    this.partner = partner;
    this.items = items;
  }
}

class Item {
  constructor(id, name, quantity, price) {
    this.id = id;
    this.name = name;
    this.quantity = quantity;
    this.price = price;
  }
}
export default {
  namespaced: true,
  state: {
    orders: [],
    order: {},
  },
  mutations: {
    setOrders(state, payload) {
      state.orders = payload;
    },
    setOrder(state, payload) {
      state.order = payload;
    },
  },
  actions: {
    async fetchOrders({ commit }) {
      const response = await axios.get('/api/orders');
      const orders = response.data;

      const resultOrders = orders.map(
        ({ id, client_email, total, status, items, partner }) =>
          new Order(
            id,
            client_email,
            total,
            status,
            partner,
            items.map(
              ({ id, product, quantity, price }) =>
                new Item(id, product.name, quantity, price),
            ),
          ),
      );
      commit('setOrders', resultOrders);
    },
    async fetchOrderById({ commit }, id) {
      const response = await axios.get(`/api/orders/${id}`);
      const orders = [response.data];
      const resultOrders = orders.map(
        ({ id, client_email, total, status, items, partner }) =>
          new Order(
            id,
            client_email,
            total,
            status,
            partner,
            items.map(
              ({ id, product, quantity, price }) =>
                new Item(id, product.name, quantity, price),
            ),
          ),
      );
      commit('setOrder', resultOrders[0]);
    },
    async updateOrder({ commit }, payload) {
      const response = await axios.patch(`/api/orders/${payload.id}`, payload);
      const orders = [response.data];
      const resultOrders = orders.map(
        ({ id, client_email, total, status, items, partner }) =>
          new Order(
            id,
            client_email,
            total,
            status,
            partner,
            items.map(
              ({ id, product, quantity, price }) =>
                new Item(id, product.name, quantity, price),
            ),
          ),
      );
      commit('setOrder', resultOrders[0]);
    },
  },
  getters: {
    orders(state) {
      return state.orders;
    },
    orderById(state) {
      return state.order;
    },
  },
};
