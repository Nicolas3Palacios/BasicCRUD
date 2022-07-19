<template>
    <main>
        <input class="form-control" type="text" :placeholder="user.username" disabled>
        <input class="form-control" type="text" :placeholder="user.email" disabled>
    </main>
</template>
<script>
export default {
    name: 'UserForm',
    props:['user']

}

</script>
