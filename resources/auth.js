import Vue from 'vue'

import auth                  from '@websanova/vue-auth/dist/v2/vue-auth.esm.js';
import driverAuthBearer      from '@websanova/vue-auth/dist/drivers/auth/bearer.esm.js';
import driverHttpAxios       from '@websanova/vue-auth/dist/drivers/http/axios.1.x.esm.js';
import driverRouterVueRouter from '@websanova/vue-auth/dist/drivers/router/vue-router.2.x.esm.js';
/**
 * Authentication configuration, some of the options can be override in method calls
 */
const config = {
  auth: driverAuthBearer,
  //auth: bearer,
  //http: axios,
  http: driverHttpAxios,
  //router: router,
  router: driverRouterVueRouter,
  tokenDefaultName: 'laravel-jwt-auth',
  tokenStore: ['localStorage'],
  
  // API endpoints used in Vue Auth.
  registerData: {
    url: 'auth/register', 
    method: 'POST', 
    redirect: '/login'
  },
  loginData: {
    url: 'auth/login', 
    method: 'POST', 
    redirect: '', 
    fetchUser: true
  },
  logoutData: {
    url: 'auth/logout', 
    method: 'POST', 
    redirect: '/', 
    makeRequest: true
  },
  fetchData: {
    url: 'auth/user', 
    method: 'GET', 
    enabled: true
  },
  refreshData: {
    url: 'auth/refresh', 
    method: 'GET', 
    enabled: true, 
    interval: 30
  }
}
export default config