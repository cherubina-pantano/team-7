import Vue from 'vue';
import axios from 'axios';

const dish = new Vue({
    el: '#dish',
    data: {
        dishes: [],
        id: '',
        
    },
    created() {        
        this.id = document.getElementById('restaurantId').value;
        // console.log(this.id);
        axios.get('http://127.0.0.1:8000/api/dishesFilter', {
            params: {
                id: this.id,
            }
        })
                .then(response => {
                // handle success
                    // console.log(response.data);
                    this.dishes = response.data;
                    
                    console.log(response.data);
                })
                .catch(error => {
                // handle error
                console.log(error);
                });
        },
    methods: {
        
    } // --> fine methods

    

});