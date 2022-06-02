<template>
  <div class="container" style="height: 100%">
    <section class="h-100">
      <header class="container h-100">
        <div class="d-inline-flex align-items-center justify-content-center h-100 w-100">
          <div class="col-md-6 col-sm-12 f-50 text-center">
            <i v-if="cargando" class="fa-spin">...</i>
            {{ somos }} <small style="font-size: 0.8em"> P</small>
          </div>
          <div class="col-md-6 col-sm-12 f-50 text-center">
            <i v-if="cargando" class="fa-spin">...</i>
            {{ llevamos }} <small style="font-size: 0.8em"> M</small>
          </div>
        </div>
      </header>
    </section>
  </div>
</template>

<script>

import {fetchCorazones} from "../services/corazones-service";

export default {
  name: 'Corazones',
  components: {

  },
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

      let prometido = this.corazones.promesas / 1000000
      if(isNaN(prometido)){
        prometido = '';
      }

      return prometido ;
    },
    somos() {
      let personasHay = this.corazones.personas;
        if(personasHay === undefined){
          personasHay = '';
        }
      return personasHay ;
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
