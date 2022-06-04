<template>
  <div class="container-fluid " style="height: 100%">


    <div class="d-flex align-items-center h-100 w-100">
      <div class="col-md-5 col-sm-12 f-50 text-end mr-5 ">
        <i v-if="cargando" class="fa-spin">...</i>
        {{ somos }} <small style="font-size: 0.8em"> P</small>
      </div>
      <div class="col-sm-1"></div>
      <div class="col-md-6 col-sm-12 f-50">
        <i v-if="cargando" class="fa-spin">...</i>
        {{ llevamos }} <small style="font-size: 0.8em"> M</small>
      </div>
    </div>


  </div>
</template>

<script>

import {fetchCorazones} from "../services/corazones-service";
import formatPromise from '../helpers/format-promise';

export default {
  name: 'Corazones',
  components: {},
  data() {
    return {
      cargando: true,
      corazones: {
        promesas: this.corazones,
        personas: this.corazones,
      }
    }
  }
  ,
  watch: {
    currentCategoryId() {
      this.loadCorazones();
    },
  },
  created() {
    this.loadCorazones();
    this.timer = setInterval(this.loadCorazones, 15000);
  },
  computed: {
    llevamos() {

      let prometido = this.corazones.promesas
      if (isNaN(prometido)) {
       return  prometido = '';
      }
      return formatPromise(this.corazones.promesas);

    },
    somos() {
      let personasHay = this.corazones.personas;
      if (personasHay === undefined) {
        personasHay = '';
      }
      return personasHay;
    }
  },

  methods: {

    async loadCorazones() {

      let response;
      try {
        response = await fetchCorazones();

      } catch (e) {

        return;
      }
      this.cargando = false;
      this.corazones = response.data[0];

    },
  },
};
</script>
<style>
@import url('https://fonts.googleapis.com/css2?family=Domine:wght@500&display=swap');

.f-50 {
  font-size: 10rem;
  font-family: 'Domine', serif;
}

</style>
