<template>
  <div class="container" style="height: 100%">
    <section class="h-100">
      <header class="container h-100">
        <div class="d-inline-flex align-items-center justify-content-center h-100 w-100">
          <div class="col-md-6 col-sm-12 f-50 text-center">
            {{ somos }}
          </div>
          <div class="col-md-6 col-sm-12 f-50 text-center">
            {{ llevamos }}
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
  components: {},
  data() {
    return {
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
      let prometido = 0;
      if (this.corazones.promesas > 1000000) {
        prometido = this.corazones.promesas / 1000000
      }
      return prometido + ' M';
    },
    somos() {
      let personasHay = this.corazones.personas;
        if(personasHay === undefined){
          personasHay = '';
        }
      return personasHay + ' P';
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
      this.corazones = response.data[0];

    },
  },
};
</script>
<style>
@import url('https://fonts.googleapis.com/css2?family=Tinos&display=swap');

.f-50 {
  font-size: 10rem;
  font-family: 'Tinos', serif;
}

</style>
