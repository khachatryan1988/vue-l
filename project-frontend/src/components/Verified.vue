<template>
  <div class=" verified">
    <div
      v-if="email"
      class="d-flex flex-column text-center "
    >
      <b>Congrats {{email}} </b>
      <p>You are fully registered</p>
      <p class="">Welcome</p>
    </div>
  </div>
</template>

<script>
export default {
  data(){
    return {
      email: ''
    }
  },
  mounted() {
    this.showParams();
  },
  methods: {
    showParams() {
      this.email = this.$route.query.email
    }
  }
}
</script>

<style scoped >

</style>
