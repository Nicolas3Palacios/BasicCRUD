<template>
    <main>
        <div class="btn-group" role="group">
            <button type="button" @click="askDelete" class="btn btn-warning">
                Delete
            </button>
        </div>
    </main>
</template>

<script>
import axios from "axios";

export default {
    name: "DeletePost",
    props:['postId'],
    data() {
        return {
        };
    },
    methods: {
        askDelete() {
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this post!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    this.deletePost(this.postId)
                } else {
                    swal("Your post is safe!");
                }
            });
        },
        async deletePost(id) {
            await axios.delete(`/Post/delete/${id}`).then((res) => {
                if (res.data.deleted) {
                    swal({
                        title: "Success!",
                        text: "Post deleted!",
                        icon: "success",
                    });
                    this.$root.$refs.allPost.index()

                    // window.location.href = "/"
                }
            });
        },
    },
};
</script>
