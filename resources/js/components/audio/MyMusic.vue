<template>
    <div class="container-full-width" style="height: 100%; background-color: #1b1e21; color: white;">
        <h3 style="padding: 50px">MY LIBRARY {{ auth_id }}</h3>

    </div>
</template>

<script>
export default {
    name: "MyMusic",

    props: ['auth_id'],

    data() {
        return {
            auth_id: ''
        }
    },
}
</script>
