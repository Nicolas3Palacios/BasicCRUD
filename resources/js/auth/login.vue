<template>
    <main class="d-flex justify-content-center align-items-center">
        <div class="my-5 d-flex justify-content-center" style="width: 250px">
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
                <div
                    class="d-flex justify-content-center justify-content-center my-2"
                >
                    <button type="submit" class="btn btn-primary">
                        Sign in
                    </button>
                </div>
            </form>
        </div>
    </main>
</template>

<script>
import Auth from "../helpers/auth";

export default {
    name: "login",
    data() {
        return {
            user: {
                email: "",
                password: "",
            },
        };
    },
    methods: {
        async login() {
            try {
                const res = await axios.post("/Auth/login", this.user);
                if (res.data.login) {
                    Auth.set(res.data.user.email, res.data.user.name);
                    window.location.href = "/";
                }
            } catch (e) {
                alert("Email or Password Incorrect");
                console.log(e, res);
            }
        },
    },
};
</script>
