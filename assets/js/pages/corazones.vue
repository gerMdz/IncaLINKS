<template>
  <div class="row">
<!--    <div class="col-md-1 col-sm-12"></div>-->
    <div class="col-sm-12 f-50 text-center">
      <i v-if="cargando" class="fa-spin">...</i>
      <span>{{ somos }} <small style="font-size: 0.8em"> P</small></span>
    </div>
    <div class="col-sm-12 f-50 text-center">
      <i v-if="cargando" class="fa-spin">...</i>
      <span>{{ llevamos }} <small style="font-size: 0.8em"> M</small></span>
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
        return prometido = '';
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
<style lang="scss">







</style>
