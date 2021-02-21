require('./bootstrap');

import Vue from 'vue';

const app = new Vue({
    el:'#app',
    data: {
        types:[],
        actualType: ''
    },
    created() {
        axios.get('http://127.0.0.1:8000/api/api')
            .then(response => {
            // handle success
                console.log(response.data);
                this.types = response.data;
            })
            .catch(error => {
            // handle error
            console.log(error);
            });
        },
    methods:{
        filterType() {
            axios.get('http://127.0.0.1:8000/api/api')
            .then(response => {
            let typeList = response.data;
            console.log(response.data);
            // CONDIZIONE
            if(this.actualType !== '') {
                typeList = typeList.filter(typeElement => typeElement.tipology === this.actualType);
            }
            // ARRAY FILTRATO
            this.types = typeList;
            console.log(typeList);
            })
            .catch(error => {
            // handle error
            console.log(error);
            });
        }
    }
});

// Make a request for a user with a given ID




