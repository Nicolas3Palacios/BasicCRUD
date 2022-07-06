<template>
    <main>
        <h1>Index</h1>
        <Personform></Personform>
        <Persontable :allUsers="allUsers"></Persontable>
    </main>
</template>

<script>
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
    components: {
        Personform,
        Persontable,
    },
};
</script>
