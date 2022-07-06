import './bootstrap';

import * as Vue from 'vue'
import index from "./views/index.vue"
import Personform from "./views/form.vue"
import login from "./auth/login.vue"
import register from "./auth/register.vue"


const app = Vue.createApp({
    components:{
        index,
        Personform,
        login,
        register
    }
})

// app.component('index', index)
// app.component('form', form)
app.mount('#app')

