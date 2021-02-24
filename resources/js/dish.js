import Vue from 'vue';
import axios from 'axios';

const app = new Vue({
    el: '#dish',
    data: {
        dishes: [],
    },
    created() {
        // axios.get('http://127.0.0.1:8000/api/dishes_filter', {
        //         params: {
        //             //nameDish: this.nameDish,
        //             dishes: this.dishes,
        //         }
        //         })
        //         .then(response => {
        //         // handle success
        //             // console.log(response.data);
        //             this.dishes = response.data;
        //             console.log(response.data);
        //         })
        //         .catch(error => {
        //         // handle error
        //         console.log(error);
        //         });
    }

});