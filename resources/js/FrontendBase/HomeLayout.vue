<template>
    <head>
        <title>B2B</title>
    </head>
    <body>
        <div>
            <HomeNavbar />
            <slot/>
            <HomeFooter/>
        </div>
    </body>
</template>

<script>


import HomeNavbar from "./HomeNavbar.vue";
import HomeFooter from "./HomeFooter.vue";

export default {
    name: "HomeLayout",
    components: {HomeFooter, HomeNavbar},
    props:{
        user: Object,
        categories: Object,
    }

}
</script>

<style scoped>

</style>
