import './bootstrap';

import * as Vue from 'vue'
import index from "./views/index.vue"
import Personform from "./views/form.vue"
import Persontable from "./views/table.vue"


const app = Vue.createApp({
    components:{
        index,
        Personform
    }
})

// app.component('index', index)
// app.component('form', form)
app.mount('#app')

