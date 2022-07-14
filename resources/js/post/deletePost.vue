<template>
    <main>
        <button @click="askDelete" class="btn btn-sm btn-warning">
            Delete post
        </button>
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
                    window.location.href = "/"
                }
            });
        },
    },
};
</script>
