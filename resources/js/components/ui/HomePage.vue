<template>
  <v-container>
    <v-img
      class="grey lighten-2"
      :src="`${baseUrl + '/images/header.jpg'}`"
      :lazy-src="`${baseUrl + '/images/header.jpg'}`"
    ></v-img>

    <v-row>
      <div class="margin-top margin-size">
        <v-row>
          <div class="col-md-6 col-sm-12 pb-0">
            <v-card class="card-size blue darken-3 white--text">
              <v-card-title>Welcome</v-card-title>
              <div class="col-12 mx-auto py-0 pb-2">
                <v-divider class="border-white"></v-divider>
              </div>
              <v-card-text class="white--text">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                Curabitur vestibulum tellus id ultricies commodo. Nulla
                facilisi. Nunc lobortis diam enim, sed lobortis lectus viverra
                id. Maecenas a tincidunt sapien. Curabitur ut ante lacinia,
                eleifend nibh vitae, bibendum massa. Vestibulum nec purus enim.
              </v-card-text>
            </v-card>
          </div>
          <div class="col-md-6 col-sm-12 pb-0">
            <v-card class="card-size primary-border">
              <v-card-title class="primary-text">Book Now</v-card-title>
              <div class="col-12 mx-auto py-0 pb-2">
                <v-divider class="border-white"></v-divider>
              </div>
              <v-card-text>
                  <v-row>
                      <div class="col-12">
                           Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                Curabitur vestibulum tellus
                      </div>
                  </v-row> 
                <v-row>
                <div class="col-12">
                    
                  <v-text-field    v-model="cname" hide-details dense label="Name*"></v-text-field>
                 
                </div>
                <div class="col-md-6 col-sm-12">
                 
                  <v-text-field  required type="number" v-model="phone" hide-details dense label="Phone*"></v-text-field>
                   
                </div>
                <div class="col-md-6 col-sm-12">
                  <v-btn dense style="width:100%;"  @click="submitForm" :loading="loading"  class="primary-bg">Submit</v-btn>
                </div>
                </v-row>
   
                
              </v-card-text>
            </v-card>
          </div>
          <div class="col-md-6 col-sm-12 pb-0">
            <v-card class="card-size primary-border">
              <v-card-title class="primary-text">Facilities</v-card-title>
              <div class="col-12 mx-auto py-0 pb-2">
                <v-divider class="border-white"></v-divider>
              </div>
              <v-card-text>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                Curabitur vestibulum tellus id ultricies commodo. Nulla
                facilisi.
                <br />
                <br />
                Nunc lobortis diam enim, sed lobortis lectus viverra id.
                Maecenas a tincidunt sapien. Curabitur ut ante lacinia, eleifend
                nibh vitae, bibendum massa. Vestibulum nec purus enim.
              </v-card-text>
            </v-card>
          </div>
          <div class="col-md-6 col-sm-12 pb-0">
            <v-card class="card-size">
              <v-img
                :src="`${baseUrl + '/images/capture.jpg'}`"
                height="300px"
              ></v-img>
            </v-card>
          </div>
        </v-row>
      </div>
    </v-row>
    <div class="mt-10" id="map" style="height: 450px"></div>
    <div class="black" style="width: 100%">
      <div class="row mt-0 footer-row">
        <div class="col-md-12 d-flex footer">
          <span>© 2021, Dubai, UAE</span>
          <div class="spacer"></div>
          <span
            ><i
              aria-hidden="true"
              class="v-icon mr-2 notranslate mdi mdi-facebook theme--light"
            ></i>
            <i
              aria-hidden="true"
              class="v-icon mr-2 notranslate mdi mdi-twitter theme--light"
            ></i>
            <i
              aria-hidden="true"
              class="v-icon mr-2 notranslate mdi mdi-instagram theme--light"
            ></i
          ></span>
        </div>
      </div>
    </div>
  </v-container>
</template>
<script>
import {
  ValidationObserver,
  ValidationProvider,
} from "vee-validate/dist/vee-validate.full";

export default {
  components: {
    ValidationProvider,
    ValidationObserver,
  },
  data: () => ({
    baseUrl: window.location.origin,
    phone: '',
    cname: '',
    loading: false,
  }),

  methods: {
    submitForm(){
      this.loading = true;
        let data = { 'phone': this.phone, 'name': this.cname };
        axios
        .post("/v/booking/submit", data)
        .then((response) => {

            this.cname = '';
            this.phone = '';
            setTimeout(() => {
                    this.loading = false;
            }, 1500);
        })
        .catch((error) => { 
           this.loading = false;
        });
    },
    loadMap() {
      let defaultLatLong = {
        lat: 25.2001175,
        lng: 55.2729386,
      };

      let map = new google.maps.Map(document.getElementById("map"), {
        center: defaultLatLong,
        zoom: 17,
        mapTypeId: "roadmap",
      });

      new google.maps.Marker({
        draggable: false,
        position: defaultLatLong,
        map: map,
        clickable: true,
      });
    }, 
  },

  mounted() {
      this.fetchBooking();
    this.loadMap();
  },
};
</script>
<style>
.container {
  max-width: 1240px;
  margin: 0 auto;
}
.card-size {
  height: 300px;
}
.footer div,
.footer .v-icon,
.footer span {
  color: #fff;
}
.footer-row {
  margin: auto 60px;
}
.margin-top {
  margin-top: 30px;
}
.margin-size {
  margin-left: 12%;
  margin-right: 12%;
}
.border-white {
  border-color: #c6c6c6 !important;
}
.primary-text {
  color: #1565c0;
}
.primary-bg{ background-color: #1565c0 !important; color: #fff !important;}
.primary-border {
  border: 3px solid #1565c0 !important;
}
.theme--light.v-text-field>.v-input__control>.v-input__slot:before{ border-color: rgb(21 101 192) !important;}
.theme--light.v-label{ color: rgb(21 101 192) !important;}
@media only screen and (max-width: 600px) {
  .margin-size {
    margin-left: 10px;
    margin-right: 10px;
  }
  .footer-row {
    margin-left: 10px;
    margin-right: 10px;
  }
}
</style>