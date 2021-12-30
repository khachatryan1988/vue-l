import Login from './Login';
import Register from './Register';
import AllUsers from "../user/AllUsers";
import Friends from "../user/Friends";

export default [
  {path: '/login', name: 'Login', component: Login},
  {path: '/register', name: 'Register', component: Register},
  {path: '/users', name: 'AllUsers', component: AllUsers},
  {path: '/friends', name: 'Friends', component: Friends},
]
