<template>
    <main class="d-flex justify-content-center align-items-center">
        <div class="grid">
            <div
                class="card my-5 g-col-4"
                style="width: 18rem"
                v-for="(post, index) in posts"
                :key="index"
            >
                <img :src="post.image" class="card-img-top" alt="alt image" />
                <div class="card-body">
                    <h5 class="card-title">{{ post.title }}</h5>
                    <p class="card-text">
                        {{ post.description }}
                    </p>
                    <div v-if="auth.username" class="btn-group" role="group">
                        <DeletePost :postId="post.id" v-if="post.user_id == user_id"/>
                        <a v-if="post.user_id == user_id" :href="`/Post/edit/${post.id}`" type="button" class="btn btn-success">Edit</a>
                    </div>
                </div>
            </div>
        </div>
    </main>
</template>

<script>
import Auth from "../helpers/auth";
import DeletePost from "../post/deletePost.vue";

export default {
    name: "UserPost",
    data() {
        return {
            posts: [],
            auth: "",
            user_id:''
        };
    },
    mounted() {
        Auth.initialize();
        this.index();
    },
    methods: {
        index() {
            this.getPosts();
            this.validate();
        },
        async getPosts() {
            const {data}  = await axios.get("/User/posts");
            this.responseAxios(data);
        },
        responseAxios(res) {
            this.posts = res.posts;
            this.user_id = res.user_id
            console.log(this.posts)
        },
        validate() {
            this.auth = Auth.data;
        },
    },
    components: {
        DeletePost,
    },
};
</script>
