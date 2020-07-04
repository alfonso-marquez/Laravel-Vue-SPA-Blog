<template>
    <div>
        <h3>View Post</h3>
        <div>
        <p> {{ post.id }} </p>
        <p>{{ post.title }} </p> 
        <p>{{ post.title }} </p> 
        <p> {{ post.desc }}</p>
        <p>{{ post.body }}</p>
        <p>{{ post.image }} </p>
        <!-- <router-link :to="{name: 'view', params: { id: post.id }}" class="btn btn-primary">
            View Blog Post
        </router-link> -->
        </div>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                post: {}
            }
        },
        created() {
            this.axios
                .get(`http://localhost:8000/api/post/view/${this.$route.params.id}`)
                .then((response) => {
                    this.post = response.data;
                    // console.log(response.data);
                });
        },
    }
</script>