import Vue from 'vue'
import Router from 'vue-router'
import HelloWorld from "../components/HelloWorld";
import auth from "../pages/auth/auth";
// import user from "../pages/user/user";
import Verified from "../components/Verified";
Vue.use(Router)

export default new Router({
  mode: 'history',
  routes: [
    { path: '/', name: 'HelloWorld', components: HelloWorld },
    {path: '/verify', name:'Verified',component: Verified },
    ...auth,
  ]
})
