require('./bootstrap');

import Vue from 'vue';

const app = new Vue({
    el:'#app',
    data: {
        types:[]


    }
});

// Make a request for a user with a given ID

axios.get('http://127.0.0.1:8000/api/api')
  .then(function (response) {
    // handle success
    console.log(response);
  })
  .catch(function (error) {
    // handle error
    console.log(error);
  });

