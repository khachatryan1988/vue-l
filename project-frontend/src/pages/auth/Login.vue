<template>
  <div class="mt-5 ml-5">
    <b-container>
      <b-row>
        <b-col cols="8">
          <h3 class="login-header font-weight-bold">Log In</h3>
          <ValidationObserver ref="login_observer">
            <b-form @submit.stop.prevent="login">
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
                    placeholder="Электронная почта"
                    v-model="login_form.email"
                    :state="errors[0] ? false : null"
                    trim
                  />
                </b-form-group>
              </ValidationProvider>
              <ValidationProvider
                name="password"
                rules="required"
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
                    placeholder="Пароль"
                    v-model="login_form.password"
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
                  Log in
                </b-button>
              </div>
              <div class="mt-2 mb-35">
            <span class="mr-1 fs-14 font-weight-bold">Forgot Password?
                <button class="link-button fs-14">
                    Restore
                </button>
            </span>
              </div>
            </b-form>
          </ValidationObserver>
          <div class="text-center pb-90">
            <div class="mt-2 mb-22">
        <span class="redirect-link">
          <span class="mr-1 fs-14 ">Don't have an account ?
            <button class="link-button"> Register</button>
          </span>
        </span>
            </div>
          </div>
        </b-col>
      </b-row>
    </b-container>
  </div>
</template>

<script>
import {ValidationProvider, ValidationObserver} from "vee-validate"
import axios from 'axios'
export default {
  components: {
    ValidationProvider,
    ValidationObserver,
  },

  data() {
    return {
      login_form: {
        email: '',
        password: ''
      },
    }
  },
  methods: {
    async login() {
      let valid = await this.$refs.login_observer.validate();
      if (!valid) return false;
      this.$store.dispatch('LOGIN_USER', this.login_form)
      .then(res => {
        console.log(res)

      })
      .catch(error => {
        console.log(error)
      })

    },
  }
}
</script>

<style scoped>

.cross {
  width: 24rem;
}

.login-header {
  margin: 0 15.5rem 4rem;
}

.pass-btn {
  position: absolute;
  top: 0;
  right: 0;
}

.login-modal {
  height: 61rem;
}

.link-button {
  background: none !important;
  border: none;
  padding: 0 !important;
  color: #069;
  text-decoration: underline;
  cursor: pointer;
}

</style>
