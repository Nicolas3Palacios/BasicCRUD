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
                    <div v-if="auth.username">
                        <DeletePost :postId="post.id" />
                    </div>
                </div>
            </div>
        </div>
    </main>
</template>

<script>
import Auth from "../helpers/auth";
import DeletePost from "./deletePost.vue";

export default {
    name: "Allpost",
    data() {
        return {
            posts: [],
            auth: "",
        };
    },
    created() {
        Auth.initialize();
        this.index();
    },
    methods: {
        index() {
            this.getPosts();
            this.validate();
        },
        async getPosts() {
            const { data } = await axios.get("/Post/list");
            this.responseAxios(data);
        },
        responseAxios(res) {
            this.posts = res.posts;
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
