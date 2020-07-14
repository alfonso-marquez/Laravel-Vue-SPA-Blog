<template>
    <div>
        <vue-progress-bar></vue-progress-bar>
        <div class="row search-bar">
             <input type="text" v-model="search" placeholder="Search Title..."/>
        </div>
        <h3 class="text-center main-title">Blog Posts</h3><br/>
        <div class="container">
            <ul class="blog-list">
                <span v-if="!filteredLists.length">No results.</span>
                <li v-for="post in filteredLists" :key="post.id">
                    <div class="home-blog-container col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="row">
                            <div class="col-12">
                                <h4 class="post-title text-center">{{ post.title }}</h4>
                            </div>
                        </div>
                        <div class="row pt-2 pb-3">
                            <div class="col-12">
                                <div style="width:100%">
                                    <h5 class="post-description">{{ post.desc }}</h5>
                                    <p class="post.body">{{ post.body | truncate(300, ' ... Contine Reading')}}</p>
                                    <p>{{ post.image }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="row pt-2 pb-1">
                            <div class="col-2">
                                <p>Likes: {{likes}}</p>
                            </div>
                            <div class="col-2">
                                <p>Views: {{views}} </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 mx-2">
                                <router-link :to="{name: 'view', params: { id: post.id }}" class="post-links">
                                    <Button type="button" class="btn btn-info">View Post</Button>
                                </router-link>
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
    import {mapGetters} from 'vuex'

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
                },
                ...mapGetters({
                    'likes' : 'getLikes',
                    'views' : 'getViews',
                    'likeStatus' : 'getLikeStatus',
                }),
            },
        methods: {
            // addViewCounter() {
            //     this.$store.commit('ADD_VIEW_COUNTER', 1)
            // },
        }
    }
</script>