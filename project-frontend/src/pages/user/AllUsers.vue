<template>
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
          <h3 class="panel-heading">List of users</h3>
          <div class="panel-body">
            <table class="table">
              <thead>
              <tr>
                <th>Name</th>
                <th>Email</th>
                <th>ID</th>
              </tr>
              </thead>
              <tbody>
              <tr v-for="user in users">
                <td>{{user.name}}</td>
                <td>{{user.email}}</td>
                <td v-model="friend" name="target_user_id">{{user.id}}</td>
                <div >
                  <button @click="addFriend">Add friend</button>
                </div>
              </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
export default {
  data: function () {
    return {
      friend: '',
      target_user_id: '',
      users: {
        name: '',
        email: '',
      },
    }
  },
  mounted() {
    this.getUsers()
    this.addFriend()
  },
  methods: {
    getUsers: function () {
      return new Promise((resolve, reject) => {
        axios.get('/users')
          .then(res => {
            if (res.status === 200) {
              this.users = res.data
              resolve(true)
            }
          })
          .catch(error => {
            reject(error)
          })
      })
    },
    addFriend: function () {
      return new Promise((resolve, reject) => {
        axios.post('friend-request/send')
          .then(res =>{
            if (res.status === 200) {
              this.target_user_id = res.data.user.id
              resolve(true)
            }
          })
          .catch(error => {
            reject(error)
          })
      })
    }
  }
}
</script>

<style scoped>
</style>
