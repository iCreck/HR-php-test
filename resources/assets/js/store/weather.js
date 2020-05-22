import axios from 'axios';

class Weather {
  constructor(data) {
    const {
      temp,
      feelsLike,
      icon,
      condition,
      windSpeed,
      windDirection,
      pressure,
    } = data;
    this.temp = temp;
    this.feelsLike = feelsLike;
    this.icon = icon;
    this.condition = condition;
    this.windSpeed = windSpeed;
    this.windDirection = windDirection;
    this.pressure = pressure;
  }
}
export default {
  namespaced: true,
  state: {
    weather: {},
  },
  mutations: {
    loadWeather(state, payload) {
      state.weather = payload;
    },
  },
  actions: {
    async fetchWeather({ commit }) {
      const lat = 53.24332428;
      const lon = 34.36373138;
      const lang = 'ru_RU';

      const response = await axios.get(
        `/api/weather?lat=${lat}&lon=${lon}&lang=${lang}`,
      );
      commit('loadWeather', new Weather(response.data));
    },
  },
  getters: {
    weather(state) {
      return state.weather;
    },
  },
};
