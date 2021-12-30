import Login from './Login';
import Register from './Register';
import ForgotPassword from './ForgotPassword';

export default [
  { path: '/login', name: 'Login', component: Login },
  { path: '/register', name: 'Register', component: Register },
  { path: '/forgot-password', name: 'ForgotPassword', component: ForgotPassword },
]

