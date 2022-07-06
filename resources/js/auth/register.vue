<template>
    <main>
        <form @submit.prevent="register">
            <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input
                    type="text"
                    class="form-control"
                    id="name"
                    placeholder="Enter name"
                    v-model="user.name"
                />
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input
                    type="email"
                    class="form-control"
                    id="email"
                    placeholder="Enter email"
                    v-model="user.email"
                />
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input
                    type="password"
                    class="form-control"
                    id="password"
                    placeholder="Password"
                    v-model="user.password"
                />
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </main>
</template>

<script>
export default {
    name: "register",
    data() {
        return {
            user: {
                name: "",
                email: "",
                password: "",
            },
        };
    },
    methods: {
        async register() {
            const res = await axios.post("/Auth/register", this.user);
            if (res.data.saved) {
                alert("Sign up successfully");
                window.location.redirect("Auth/login");
            }
        },
    },
};
</script>
