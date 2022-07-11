<template>
    <main>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Name</td>
                    <td>Email</td>
                    <td>Age</td>
                    <td>Actions</td>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(user, index) in allUsers" :key="index">
                    <td>{{ user.id }}</td>
                    <td>{{ user.name }}</td>
                    <td>{{ user.email }}</td>
                    <td>{{ user.age }}</td>
                    <td>
                        <a
                            :href="`/person/edit/${user.id}`"
                            class="btn btn-primary btn-sm"
                            >Edit</a
                        >
                        <a
                            href="#"
                            class="btn btn-danger btn-sm"
                            @click="deleteUser(user, index)"
                            >Delete</a
                        >
                    </td>
                </tr>
            </tbody>
        </table>
    </main>
</template>

<script>
export default {
    name: "table",
    props: ["allUsers"],
    methods: {
        async deleteUser(user, index) {
            await axios.post(`/person/delete/${user.id}`).then((res) => {
                if (res.data.deleted) {
                    this.$parent.allUsers.splice(index, 1);
                }
            });
        },
    },
};
</script>
