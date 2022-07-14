<template>
    <main class="d-flex justify-content-center align-items-center">
        <div class="my-5 d-flex justify-content-center" style="width: 30rem">
            <form @submit.prevent="save">
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
                    <label for="image">Image</label>
                    <input
                        type="file"
                        class="form-control-file"
                        id="image"
                        @change="previewImage"
                    />
                </div>
                <div
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
    data() {
        return {
            image: "",
            post: {
                title: "",
                description: "",
                image: "",
            },
        };
    },
    mounted() {
        Auth.initialize();
    },
    components: {},
    methods: {
        async save() {
            let data = new FormData();

            data.append("title", this.post.title);
            data.append("description", this.post.description);
            data.append("image", this.post.image, this.post.image.name);

            await axios.post("/Post/save", data).then((res) => {
                if (res.data.saved) {
                    this.post = {
                        title: "",
                        description: "",
                        image: "",
                    };
                    this.image = null
                    swal({
                        title: "Success!",
                        text: "Post succed!",
                        icon: "success",
                    });
                    window.location.href = "/"
                }
            });
        },
        previewImage(e) {
            if (e.target.files[0]) {
                this.post.image = e.target.files[0];
                this.image = URL.createObjectURL(this.post.image);
            }
        },
    },
};
</script>
