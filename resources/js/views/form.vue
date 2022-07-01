<template>
    <main>
        <h2>Form</h2>
        <form @submit.prevent="save">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" v-model="person.name" />
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input
                    type="email"
                    class="form-control"
                    v-model="person.email"
                />
            </div>

            <div class="form-group">
                <label for="age">Age</label>
                <input
                    type="number"
                    class="form-control"
                    v-model="person.age"
                />
            </div>

            <button type="submit" class="btn btn-primary">Create!</button>
        </form>
    </main>
</template>

<script>
export default {
    name: "form",
    props: ["user"],
    data() {
        return {
            person: {
                name: "",
                email: "",
                age: "",
            },
        };
    },
    created() {
        this.index();
    },
    methods: {
        index() {
            this.readUser();
        },
        readUser() {
            this.user ? (this.person = this.user) : "";
        },
        async save() {
            let url = `/person/update/${this.person.id}`;
            if (!this.user) {
                url = "/person/store";
            }
            await axios.post(url, this.person).then((res) => {
                if (res.data.saved) {
                    this.person = {
                        name: "",
                        email: "",
                        age: "",
                    };
                    // this.allUsers.push(res.data.person)
                    this.$parent.allUsers.push(res.data.person);
                    alert("Information saved");
                } else if (res.data.updated) {
                    alert("Information updated");
                    window.location.href = "/person/vue";
                }
            });
        },
    },
};
</script>
