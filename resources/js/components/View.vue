<template>
    <div>
        <h3 class="main-title text-center">View Post</h3>
        <div class="home-blog-container col-12">
        <p>ID: {{ post.id }}</p>
        <p class="post-title">{{ post.title }}</p> 
        <p class="post-description">{{ post.desc }}</p>
        <p>{{ post.body }}</p>
        <p>{{ post.image }}</p>
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