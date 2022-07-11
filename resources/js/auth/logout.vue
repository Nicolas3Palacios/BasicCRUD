<template>
    <main>
        <div>
            <button @click="logout" class="btn btn-dark">Logout</button>
        </div>
    </main>
</template>

<script>
import Auth from "../helpers/auth";

export default {
    name: "logout",
    methods: {
        async logout() {
            try {
                const res = await axios.get("/Auth/logout");
                if (res.data.logout) {
                    Auth.remove();
                    window.location.href = "/";
                }
            } catch (e) {
                alert("Error");
                console.log(e);
            }
        },
    },
};
</script>
