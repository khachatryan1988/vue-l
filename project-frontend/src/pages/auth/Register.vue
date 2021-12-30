<template>
  <div>
    <b-container>
      <b-row>
        <b-col class="mt-3" cols="8">
          <h3 class="text-center">Register</h3>
          <ValidationObserver ref="register_observer">
            <b-form @submit.prevent="registerUser">
              <ValidationProvider rules="required" name="Name" v-slot="{ valid, errors }">
                <b-form-group>
                  <b-form-input
                    class="mt-3"
                    type="text"
                    v-model="form.name"
                    :state="errors[0] ? false : (valid ? true : null)"
                    placeholder="Enter Name"
                  ></b-form-input>
                  <b-form-invalid-feedback id="inputLiveFeedback">{{ errors[0] }}</b-form-invalid-feedback>
                </b-form-group>
              </ValidationProvider>
              <ValidationProvider rules="required|email" name="Email" v-slot="{ valid, errors }">
                <b-form-group>
                  <b-form-input
                    class="mt-3"
                    type="email"
                    v-model="form.email"
                    :state="errors[0] ? false : (valid ? true : null)"
                    placeholder="Enter email"
                  ></b-form-input>
                  <b-form-invalid-feedback id="inputLiveFeedback">{{ errors[0] }}</b-form-invalid-feedback>
                </b-form-group>
              </ValidationProvider>
              <ValidationProvider
                rules="required"
                name="regex"
                vid="password"
                v-slot="{ valid, errors }"
              >
                <b-form-group>
                  <b-form-input
                    type="password"
                    v-model="form.password"
                    :state="errors[0] ? false : (valid ? true : null)"
                    placeholder="Enter password"
                  ></b-form-input>
                  <b-form-invalid-feedback id="inputLiveFeedback">{{ errors[0] }}</b-form-invalid-feedback>
                </b-form-group>
              </ValidationProvider>

              <b-button class="float-right" type="submit" variant="primary">Registration</b-button>
            </b-form>
          </ValidationObserver>
        </b-col>
      </b-row>
    </b-container>
  </div>
</template>

<script>
import axios from "axios";
import {ValidationObserver, ValidationProvider} from "vee-validate";
export default {
  name: "BootstrapForm",
  components: {
    ValidationObserver,
    ValidationProvider
  },
  data: () => ({
    form: {
      name: "",
      email: "",
      password: "",
    }
  }),
  methods: {
    async registerUser() {
      let valid = await this.$refs.register_observer.validate();
      if (!valid) return false;
      this.$store
        .dispatch('register_User', this.form)
        .then(res => {
          if (res) {
            alert(res.message)
            this.$router.push({name: "Login"});
          }
        })
        .catch(error => {
          console.log(error)
        })
    },
  }
};
</script>

<style scoped>
</style>
