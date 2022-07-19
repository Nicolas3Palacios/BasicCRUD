<template>
    <main>
        <div>
            <h1>User Profile</h1>
        </div>
        <div>
            <user-form :user="user"></user-form>
            <user-posts></user-posts>
        </div>
    </main>
</template>

<script>
import UserForm from "./userForm";
import UserPosts from "./userPosts"
import Auth from "../helpers/auth";

export default {
    name: "userProfile",
    data() {
        return {
            user: [],
        };
    },
    mounted() {
        Auth.initialize();
        this.index();
    },
    methods: {
        index(){
            this.user = Auth.data
        },
    },
    components: {
        UserForm,
        UserPosts
    },
};
</script>
