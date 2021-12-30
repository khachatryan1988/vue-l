<template>
  <div>
    <b-container class="mt-3">
      <h2>Profile data</h2>
      <div v-if="user">
        <ValidationObserver ref="profile_update_observer">
          <b-form @submit.stop.prevent="updateProfile">
            <ValidationProvider
              name="name"
              rules="required"
            >
              <b-form-group
                label-class="form-label"
                class="mt-27 mb-10 position-relative"
                label-for="name"
                slot-scope="{ errors }"
                :invalid-feedback="errors[0]"
              >
                <b-form-input
                  id="name"
                  name="name"
                  placeholder="Name"
                  v-model="profileForm.name"
                  :state="errors[0] ? false : null"
                  trim
                />
              </b-form-group>
            </ValidationProvider>
            <ValidationProvider
              name="email"
              rules="required|email"
            >
              <b-form-group
                label-class="form-label"
                label-for="email"
                slot-scope="{ errors }"
                :invalid-feedback="errors[0]"
              >
                <b-form-input
                  id="email"
                  placeholder="Email"
                  v-model="profileForm.email"
                  :state="errors[0] ? false : null"
                  trim
                />
              </b-form-group>
            </ValidationProvider>
            <ValidationProvider
              name="password"
              rules="min:6"
            >
              <b-form-group
                label-class="form-label"
                class="mt-27 mb-10 position-relative"
                label-for="password"
                slot-scope="{ errors }"
                :invalid-feedback="errors[0]"
              >
                <b-form-input
                  id="password"
                  name="password"
                  placeholder="Password"
                  v-model="profileForm.password"
                  :state="errors[0] ? false : null"
                  trim
                />
              </b-form-group>
            </ValidationProvider>
            <ValidationProvider
              name="password_confirmation"
              rules="confirmed:password"
            >
              <b-form-group
                label-class="form-label"
                class="mt-27 mb-10 position-relative"
                label-for="password"
                slot-scope="{ errors }"
                :invalid-feedback="errors[0]"
              >
                <b-form-input
                  id="password"
                  name="password"
                  placeholder="Password confirmation"
                  v-model="profileForm.password_confirmation"
                  :state="errors[0] ? false : null"
                  trim
                />
              </b-form-group>
            </ValidationProvider>
            <div class="d-grid gap-2 mt-33 mb-35">
              <b-button
                variant="primary"
                block
                type="submit"
              >
                Update
              </b-button>
            </div>
          </b-form>
        </ValidationObserver>
      </div>
    </b-container>
  </div>
</template>

<script>
import {ValidationObserver, ValidationProvider} from "vee-validate";
import axios from "axios";
export default {
  components: {
    ValidationProvider,
    ValidationObserver,
  },
  data() {
    return {
      user: {},
      profileForm: {
        name: '',
        email: '',
        password: null,
        password_confirmation: null
      },
    }
  },
  mounted() {
    this.getData()
  },
  methods: {
    getData() {
      this.$store.dispatch('getUser')
        .then(res => {
          if (res) {
            this.user = this.$store.getters.getUserData
            this.profileForm.name = this.user.name;
            this.profileForm.email = this.user.email;
          }
        }).catch(error => {
        console.log(error)
      })
    },
    async updateProfile() {
      let valid = await this.$refs.profile_update_observer.validate();
      if (!valid) return false;
      axios.put('/user', this.profileForm)
        .then(res => {
          if (res.status === 200) {
            alert('Profile data updated.')
          }
        })
        .catch(error => {
          console.log(error);
        })
    }
  }
}
</script>

<style scoped>
</style>
