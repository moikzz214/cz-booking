import Vue from "vue";
import Vuetify from "vuetify";
// import 'vuetify/dist/vuetify.min.css'

Vue.use(Vuetify);

const opts = {
    theme: {
        themes: {
          light: {
            primary: "#191e47",
            // secondary: '#c7a92e',
            secondary: '#20b4e2',
            textcolor: '#5a5b5c',
            // black: '#333',
            // Vuetify Action Colors
            // secondary: '#f5f5f5',
            // accent: '#82B1FF',
            // error: '#FF5252',
            // info: '#2196F3',
            // success: '#4CAF50',
            // warning: '#FFC107',
          }
        }
      },
    icons: {
        iconfont: "mdi"
    }
};

export default new Vuetify(opts);
