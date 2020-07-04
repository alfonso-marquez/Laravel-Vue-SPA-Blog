<template>
    <div>
        <h3 class="text-center">Blog Posts</h3><br/>

        <div class="container">

        <div class="row">
        <div class="col-6 offset-3">
        <!-- <a href="/profile/{{ $post.id }}"> -->
            <!-- <img src="/storage/{{ $post.image }}" class="w-100"> -->
        <!-- </a> -->
        </div>
    </div>

    <ul class="blog-list">
        <li v-for="post in posts" :key="post.id">
            <div class="home-blog-container">
                <div class="row">
                    <div class="col-8 offset-2">
                        <div class="">
                            <h4>{{ post.title }}</h4>
                        </div>
                    </div>
                </div>  
                <div class="row pt-2 pb-4">
                    <div class="col-8 offset-2">
                        <h5>{{ post.desc }}</h5>
                        <p>{{ post.body }}</p>
                        <p>{{ post.image }}</p>
                    </div>
                </div>
    </div>
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