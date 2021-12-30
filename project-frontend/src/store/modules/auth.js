import axios from "axios";

export default {
  state: {
    user: {},
    token: localStorage.getItem('accessToken') || null,
  },
  mutations: {
    setUserData(state, data) {
      state.user = data;
    },
    setToken(state, data) {
      localStorage.setItem('accessToken', data);
    }
  },
  getters: {
    isLoggedIn: function (state) {
      return !!state.token;
    },
    getUserData(state) {
      return state.user
    }
  },
  actions: {
    loginUser(context, data) {
      return new Promise((resolve, reject) => {
        axios.post('/auth/login', data)
          .then(res => {
            if (res.status === 200) {
              context.commit('setToken', res.data.accessToken);
              resolve(res);
            }
          })
          .catch(error => {
            reject(error);
          })
      })
    },
    logoutUser(context, data) {
      return new Promise((resolve, reject) => {
        axios.post('/auth/logout', data)
          .then(res => {
            if (res.status === 200) {
              context.commit('setToken', '')
              context.commit('setUserData', {})
              resolve(true)
            }
          })
          .catch(error => {
            reject(error)
          })
      })
    },
    register_User(context, data) {
      return new Promise((resolve, reject) => {
        axios.post('/register', data)
          .then((res) => {
            if (res.status === 200) {
              resolve(res.data);
            }
          })
          .catch(error => {
            reject(error)
          })
      })
    },
    getUser(context) {
      return new Promise((resolve, reject) => {
        axios.post('/auth/me')
          .then(res => {
            if (res.status === 200) {
              context.commit('setUserData', res.data)
              resolve(true)
            }
          })
          .catch(error => {
            reject(error)
          })
      })
    },
  }
}
