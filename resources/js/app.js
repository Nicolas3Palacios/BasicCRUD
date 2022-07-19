import './bootstrap';

import * as Vue from 'vue'
import swal from 'sweetalert';

import index from "./views/index.vue"
import Personform from "./views/form.vue"

import login from "./auth/login.vue"
import register from "./auth/register.vue"
import logout from "./auth/logout.vue"

import Postform from "./post/postForm.vue"
import Allpost from "./post/allPosts.vue"
import UserProfile from "./profile/userProfile.vue"

const app = Vue.createApp({
    components:{
        index,
        Personform,
        login,
        register,
        logout,
        Postform,
        Allpost,
        UserProfile,
    }
})

// app.component('index', index)
// app.component('form', form)
app.mount('#app')

