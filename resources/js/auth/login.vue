<template>
    <main>
        <form @submit.prevent="login">
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input
                    type="email"
                    class="form-control"
                    id="exampleInputEmail1"
                    placeholder="Enter email"
                    v-model="user.email"
                />
                <small id="emailHelp" class="form-text text-muted"
                    >We'll never share your email with anyone else.</small
                >
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input
                    type="password"
                    class="form-control"
                    id="exampleInputPassword1"
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
    name: "login",
    data() {
        return {
            user: {
                email: "",
                password: "",
                con:'123'
            },
        };
    },
    methods: {
        async login() {
            try {
                const res = await axios.post("/Auth/login", this.user);
                if (res.data.login) {
                    alert("Sign in successfully");
                }
            } catch (e) {
                alert("Email or Password Incorrect");
                console.log(e, res);
            }
        },
    },
};
</script>
