import axios from 'axios';

class Order {
  constructor(id, total, status, partnerName, items) {
    this.id = id;
    this.total = total;
    this.status = status;
    this.partnerName = partnerName;
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
  },
  mutations: {
    setOrders(state, payload) {
      state.orders = payload;
    },
  },
  actions: {
    async fetchOrders({ commit }) {
      const response = await axios.get('/api/orders');
      const orders = response.data;

      const resultOrders = orders.map(
        ({ id, total, status, items, partner }) =>
          new Order(
            id,
            total,
            status,
            partner.name,
            items.map(
              ({ id, product, quantity, price }) =>
                new Item(id, product.name, quantity, price),
            ),
          ),
      );
      commit('setOrders', resultOrders);
    },
  },
  getters: {
    orders(state) {
      return state.orders;
    },
  },
};
