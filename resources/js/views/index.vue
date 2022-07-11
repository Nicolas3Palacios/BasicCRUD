<template>
    <main>
        <Personform></Personform>
        <Persontable :allUsers="allUsers"></Persontable>
    </main>
</template>

<script>
import Auth from "../helpers/auth"
import Personform from "./form";
import Persontable from "./table";
export default {
    name: "index",
    props: ["users"],
    data() {
        return {
            allUsers: this.users,
            person: {
                created: true,
            },
        };
    },
    mounted(){
        Auth.initialize()
    },
    components: {
        Personform,
        Persontable,
    },
};
</script>
