<template>
  <div>
    <b-navbar type="dark" variant="dark">
      <b-navbar-nav class="ml-auto">
        <b-nav-item v-if="isLoggedIn" :to="{name : 'Profile'}">Profile</b-nav-item>
        <b-nav-item v-if="isLoggedIn" :to="{name : 'AllUsers'}">Users</b-nav-item>
        <b-nav-item @click="logoutUser()" v-if="isLoggedIn" :to="{name : 'Login'}">Logout</b-nav-item>

        <b-nav-item v-if="!isLoggedIn" :to="{name : 'Login'}">Login</b-nav-item>
        <b-nav-item v-if="!isLoggedIn" :to="{name : 'Register'}">Registration</b-nav-item>
      </b-navbar-nav>
    </b-navbar>
  </div>
</template>

<script>
export default {
  name: "Navbar",
  computed: {
    isLoggedIn: function () {
      return this.$store.getters.isLoggedIn;
    }
  },
  methods: {
    logoutUser: function () {
      this.$store.dispatch('logoutUser')
        .then(() => {
          this.$router.push({name: 'Login'}).catch(() => {});
        })
    }
  },
}
</script>

<style scoped>
</style>
