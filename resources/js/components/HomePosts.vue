<template>
    <div>
        <vue-progress-bar></vue-progress-bar>
        <div class="row search-bar">
             <input type="text" v-model="search" placeholder="Search Title..."/>
        </div>
        <h3 class="text-center main-title">Blog Posts</h3><br/>
        <div class="container">
            <ul class="blog-list">
                <li v-for="post in filteredLists" :key="post.id">
                    <router-link :to="{name: 'view', params: { id: post.id }}" class="post-links">
                    <div class="home-blog-container col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="row">
                            <div class="col-12">
                                <h4 class="post-title text-center">{{ post.title }}</h4>
                            </div>
                        </div>
                        <div class="row pt-2 pb-4">
                            <div class="col-12">
                                <div style="width:100%">
                                    <h5 class="post-description">{{ post.desc }}</h5>
                                    <p class="post.body">{{ post.body }}</p>
                                    <p>{{ post.image }}</p>
                                </div>
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
                posts: [],
                search: '',
            }
        },
        created() {
            this.$Progress.start()
            this.axios
                .get('http://localhost:8000/api/posts')
                .then(response => {
                    this.posts = response.data
                    this.$Progress.finish()
                });
        },
        computed: {
                filteredLists() {
                return this.posts.filter(post => {
                    return post.title.toLowerCase().includes(this.search.toLowerCase())
                })
                }
            },
    }
</script>