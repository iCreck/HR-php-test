<template>
  <b-overlay :show="overlay" rounded="sm">
    <b-card v-if="hasOrder">
      <h1>Заказ #{{ id }}</h1>
      <b-form @submit="onSubmit">
        <b-form-group
          id="input-group-1"
          label="Email клиента:"
          label-for="input-1"
        >
          <b-form-input
            id="input-1"
            v-model="form.clientEmail"
            type="email"
            required
            placeholder="Введите email"
          />
        </b-form-group>

        <b-form-group id="input-group-2" label="Статус:" label-for="input-2">
          <b-form-select
            id="input-2"
            v-model="form.partnerId"
            lazy
            :options="partners"
            text-field="name"
            value-field="id"
            required
          />
        </b-form-group>

        <b-form-group id="input-group-3" label="Статус:" label-for="input-3">
          <b-form-select
            id="input-3"
            v-model="form.status"
            lazy
            :options="statuses"
            required
          />
        </b-form-group>
        <b-form-group
          id="input-group-4"
          label="Стоимость заказа"
          label-for="input-4"
        >
          <b-form-input id="input-4" v-model="form.total" lazy disabled />
        </b-form-group>
        <b-form-row>
          <b-col offset-md="9" md="3">
            <b-button block type="submit" variant="primary">
              Сохранить изменения
            </b-button>
          </b-col>
        </b-form-row>
      </b-form>
      <h3>Состав заказа:</h3>
      <detailView :items="orderById.items" />
    </b-card>
    <div class="text-center">
      <b-spinner v-if="!hasOrder" style="width: 3rem; height: 3rem;" />
    </div>
  </b-overlay>
</template>

<script>
import { mapActions, mapGetters } from 'vuex';
import Detail from './Detail';

export default {
  name: 'Edit',
  components: {
    detailView: Detail,
  },
  props: ['id'],
  data() {
    return {
      statuses: [
        { value: 0, text: 'Новый' },
        { value: 10, text: 'Подтвержден' },
        { value: 20, text: 'Завершен' },
      ],
      form: {
        id: '',
        clientEmail: '',
        partnerId: '',
        status: '',
        total: '',
      },
    };
  },
  computed: {
    ...mapGetters({
      orderById: 'orders/orderById',
      partners: 'partners/partners',
      overlay: 'common/overlay',
    }),
    hasOrder() {
      return this.orderById.id > 0 && this.partners;
    },
  },
  watch: {
    orderById(order) {
      this.form.id = order.id;
      this.form.clientEmail = order.clientEmail;
      this.form.partnerId = order.partner.id;
      this.form.status = order.status.value;
      this.form.total = order.total;
    },
  },
  created() {
    this.fetchOrderById(this.id);
    this.fetchPartners();
  },
  methods: {
    ...mapActions('orders', ['fetchOrderById', 'updateOrder']),
    ...mapActions('partners', ['fetchPartners']),
    ...mapActions('common', ['setOverlay']),
    onSubmit(event) {
      event.preventDefault();
      this.setOverlay({ value: true, timeout: 0 });
      this.updateOrder(this.form);
      this.setOverlay({ value: false, timeout: 500 });
    },
  },
};
</script>

<style scoped></style>
