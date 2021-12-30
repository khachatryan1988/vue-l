import axios from "axios";

export default {
  state: {
    user : {},
    token : '',
  },
  mutations: {
    setUserData(state,data){

    },
    setToken(state,data){
      localStorage.setItem('access_token', data)
    }
  },
  getters: {},
  actions: {
    LOGIN_USER(context, data) {
      return new Promise((resolve, reject) => {
        axios.post('/auth/login', data)
          .then(res => {
            if(res.status === 200){
              context.commit('setToken', res.data.access_token)
            }
          })
          .catch(error => {
            console.log(error)
          })
      })
    },

    REGISTER_USER(context, data) {
      console.log(data, 'store')
      return new Promise((resolve, reject) => {
        axios.post('/auth/registration', data)
          .then((res) => {
            if (res.status === 200) {
              resolve(res.data);
            }
          })
          .catch(error => {
            console.log(error)
          })
      })
    },
    GET_USER(context){
      return new Promise((resolve, reject) => {

        axios.post('/auth/me')
          .then(res => {
            console.log(res)
          })
          .catch(error => {
            console.log(error)
          })
      })
    }
  }

}
