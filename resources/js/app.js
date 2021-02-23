import './bootstrap';

import Vue from 'vue';
import axios from 'axios';

const app = new Vue({
    el: '#app',
    data: {
        types:[],
        name: '',
        restaurants: [],
        // actualType: 'tutte'
    },
    created() {
        axios.get('http://127.0.0.1:8000/api/filter', {
            params: {
                name: this.name,
                types: this.types,
            }
        })
            .then(response => {
            // handle success
                // console.log(response.data);
                this.restaurants = response.data;
                console.log(response.data);
            })
            .catch(error => {
            // handle error
            console.log(error);
            });
    },
    methods: {
         filterType() {
            axios.get('http://127.0.0.1:8000/api/filter', {
                params: {
                    name: this.name,
                    types: this.types,
                }
            })
                .then(response => {
                // handle success
                    // console.log(response.data);
                    this.restaurants = response.data;
                    console.log(response.data);
                })
                .catch(error => {
                // handle error
                console.log(error);
                });
             }
        //     // ARRAY FILTRATO
        //     this.types = typeList;
        //     // console.log(typeList);
        //     })
        //     .catch(error => {
        //     // handle error
        //     console.log(error);
        //     });
        // }
    }
});





