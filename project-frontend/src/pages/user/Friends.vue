<template>
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
          <h3 class="panel-heading">List of Friends</h3>
          <div class="panel-body">
            <table class="table">
              <thead>
              <tr>
                <th>Name</th>
                <th>Email</th>
              </tr>
              </thead>
              <tbody>
              <tr v-for="user in users">
                <td>{{user.name}}</td>
                <td>{{user.email}}</td>
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
export default {
  name: "Friends"
}
</script>

<style scoped>
</style>
