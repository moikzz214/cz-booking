require('./bootstrap');
import Vue from "vue";
import vuetify from "./plugins/vuetify";

Vue.component(
    "home-page",
    require("./components/ui/HomePage.vue").default
);


const app = new Vue({
    el: "#app",
    
    vuetify,
    data() {
        return {
            
        };
    },
    methods: {
        
    }
});
