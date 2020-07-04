<template>
    <div>
        <h3 class="text-center main-title">Blog Posts</h3><br/>
        <div class="container">
            <ul class="blog-list">
                <li v-for="post in posts" :key="post.id">
                    <router-link :to="{name: 'view', params: { id: post.id }}" class="post-links">
                    <div class="home-blog-container col-10 offset-1">
                        <div class="row">
                            <div class="col-12">
                                <div class="">
                                    <h4 class="post-title text-center">{{ post.title }}</h4>
                                </div>
                            </div>
                        </div>  
                        <div class="row pt-2 pb-4">
                            <div class="col-12">
                                <h5 class="post.description
                                ">{{ post.desc }}</h5>
                                <p class="post.body">{{ post.body }}</p>
                                <p>{{ post.image }}</p>
                            </div>
                        </div>
                    </div>
                    </router-link>
                </li>
            </ul>
    <div class="row">
        <div class="col-12 d-flex justify-content-center">
            <!-- {{ $posts->links() }} -->
        </div>
    </div>          
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                posts: []
            }
        },
        created() {
            this.axios
                .get('http://localhost:8000/api/posts')
                .then(response => {
                    this.posts = response.data;
                });
        },
    }
</script>