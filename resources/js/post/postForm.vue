<template>
    <main class="d-flex justify-content-center align-items-center">
        <div class="my-5 d-flex justify-content-center" style="width: 30rem">
            <form @submit.prevent="save">
                <h4 v-if="add">Add New Post</h4>
                <h4 v-if="!add">Update Post</h4>
                <div class="form-group">
                    <label for="tittle">Tittle</label>
                    <input
                        type="text"
                        class="form-control"
                        id="tittle"
                        v-model="post.title"
                    />
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <input
                        type="text"
                        class="form-control"
                        id="description"
                        v-model="post.description"
                    />
                </div>
                <div class="form-group">
                    <label for="image" class="form-label">Image</label>
                    <input
                        type="file"
                        class="form-control"
                        id="image"
                        @change="previewImage"
                    />
                </div>
                <div
                    v-if="!show"
                    class="form-group d-flex justify-content-center justify-content-center mt-2"
                >
                    <img :src="post.image" />
                </div>
                <div
                    v-if="show"
                    class="form-group d-flex justify-content-center justify-content-center mt-2"
                >
                    <img :src="image" />
                </div>
                <div
                    class="d-flex justify-content-center justify-content-center"
                >
                    <button type="submit" class="btn btn-primary">Post</button>
                </div>
            </form>
        </div>
    </main>
</template>

<script>
import Auth from "../helpers/auth";

export default {
    name: "Postform",
    props: ["pozt"],
    data() {
        return {
            image: "",
            post: {
                title: "",
                description: "",
                image: "",
            },
            show: false,
            add: false
        };
    },
    mounted() {
        Auth.initialize();
        this.index();
    },
    components: {},
    methods: {
        index() {
            this.pozt ? (this.post = this.pozt) : "";
            if(!this.pozt){
                this.add = true
            }
        },
        async save() {
            let url = `/Post/update/${this.post.id}`;
            if (!this.pozt) {
                url = "/Post/save";
            }

            let data = new FormData();

            data.append("title", this.post.title);
            data.append("description", this.post.description);
            if (this.show == true) {
                data.append("image", this.post.image, this.post.image.name);
            }

            await axios.post(url, data).then((res) => {
                if (res.data.saved) {
                    this.post = {
                        title: "",
                        description: "",
                        image: "",
                    };
                    this.image = null;
                    swal({
                        title: "Success!",
                        text: "Post succed!",
                        icon: "success",
                    });

                    this.$root.$refs.allPost.index();
                } else if (res.data.updated) {
                    swal({
                        title: "Success!",
                        text: "Post updated!",
                        icon: "success",
                    });
                    window.location.href = "/";
                }
            });
        },
        previewImage(e) {
            if (e.target.files[0]) {
                this.post.image = e.target.files[0];
                this.image = URL.createObjectURL(this.post.image);
                this.show = true;
            }
        },
    },
};
</script>
