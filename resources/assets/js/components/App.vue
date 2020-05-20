<template>
    <div>
        <navigation></navigation>
        <b-container>
            <router-view />
        </b-container>
    </div>
</template>

<script>
    import Navigation from "./Common/Navigation";

    export default {
        components: {
            Navigation
        }
    }
</script>
