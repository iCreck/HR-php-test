<template>
  <b-row class="wrap">
    <b-col>
      <h4>Погода в Брянске</h4>
      <b-card
        v-if="hasWeather"
        no-body
        class="overflow-hidden"
      >
        <b-row no-gutters>
          <b-col md="4">
            <b-img
              :src="weather.icon"
              thumbnail
              fluid
            />
          </b-col>
          <b-col md="8">
            <b-card-body>
              <b-list-group flush>
                <b-list-group-item>
                  Текущая температура: <span class="bold">{{ weather.temp }} ℃</span>
                </b-list-group-item>
                <b-list-group-item>
                  Ощущается как: <span class="bold">{{ weather.feelsLike }} ℃</span>
                </b-list-group-item>
                <b-list-group-item>
                  Состояние: <span class="bold">{{ weather.condition }}</span>
                </b-list-group-item>
                <b-list-group-item>
                  Скорость ветра: <span class="bold">{{ weather.windSpeed }} м/с</span>
                </b-list-group-item>
                <b-list-group-item>
                  Направление ветра: <span class="bold">{{ weather.windDirection }}</span>
                </b-list-group-item>
                <b-list-group-item>
                  Атмосферное давление: <span class="bold">{{ weather.pressure }} мм р.с.</span>
                </b-list-group-item>
              </b-list-group>
            </b-card-body>
          </b-col>
        </b-row>
      </b-card>
      <div class="text-center">
        <b-spinner
            v-if="!hasWeather"
            style="width: 3rem; height: 3rem;"
        />
      </div>
    </b-col>
  </b-row>
</template>

<script>
import { mapActions, mapGetters } from 'vuex';

export default {
  computed: {
    ...mapGetters('weather', ['weather']),
    hasWeather() {
      return Boolean(this.weather.temp);
    },
  },
  created() {
    this.fetchWeather();
  },
  methods: {
    ...mapActions('weather', ['fetchWeather']),
  },
};
</script>

<style scoped lang="sass">
  .wrap
    margin-top: 20px
  .bold
    font-weight: bold
</style>
