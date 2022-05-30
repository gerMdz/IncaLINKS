<template>
  <div class="container-fluid">
    <div class="row">
      <div class="col-6">
        {{ donantes }}
      </div>
      <div class="col-6">
        {{ loprometido }}
      </div>
    </div>
  </div>
</template>

<script>

import {fetchCorazones} from "../services/corazones-service";

export default {
  name: 'Corazones',
  components: {},
  data() {
    return {
      corazones:[],
      personas:[]
    }
  },
  watch: {

  },
  created() {
    this.loadCorazones();
  },
  computed: {
    /**
     * Returns a formatted price for the product
     * @returns {number}
     */
    donantes() {
      /**
       *
       * @type {array}
       */
      let personas = this.corazones;
      return personas[0]['personas'];
    },/**
     * Returns a formatted price for the product
     * @returns {number}
     */
    loprometido() {
      /**
       *
       * @type {array}
       */
      let promesas = this.corazones;
      return promesas[0]['promesas'];
    },
  },

  methods: {
    async loadCorazones() {

      let response;
      try {
        response = await fetchCorazones();


      } catch (e) {


        return;
      }

      this.corazones = response.data;
      console.log(this.corazones);
    },
  },
};
</script>
