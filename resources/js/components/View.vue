<template>
    <div>
        <vue-progress-bar></vue-progress-bar>
        <h3 class="main-title text-center">View Post</h3>
        <div class="home-blog-container col-12">
            <h6>ID: {{ post.id }}</h6>
            <h4 class="post-title text-center">{{ post.title }}</h4> 
            <h5 class="post-description">{{ post.desc }}</h5>
            <p>{{ post.body }}</p>
            <p>{{ post.image }}</p>
            <!-- <router-link :to="{name: 'view', params: { id: post.id }}" class="btn btn-primary">
                View Blog Post
            </router-link> -->
            <div class="row pt-2 pb-4">
                <div class="col-2">
                    <p>Likes: {{likes}} </p>
                    <p>Liked: {{likeStatus}} </p>
                </div>
                <div class="col-2">
                    <p>Views: {{views}} </p>
                </div>
            </div>
            <Button type="button" class="btn btn-primary" @click="addLikeAction">
                <b-icon icon="hand-thumbs-up"></b-icon>
            </Button>
        </div>
    </div>
</template>

<script>
    import {mapGetters} from 'vuex'

    export default {
        data() {
            return {
                post: {}
            }
        },
        created() {  
            this.$Progress.start()
            // this.$store.commit('ADD_VIEW_COUNTER', 1)
            this.$store.dispatch('addViewAction', 1)
            this.axios
                .get(`http://localhost:8000/api/post/view/${this.$route.params.id}`)
                .then((response) => {
                    this.post = response.data;
                    this.$Progress.finish()
                    // console.log(response.data);
                });
        },
        computed : {
            ...mapGetters({
                'likes' : 'getLikes',
                'views' : 'getViews',
                'likeStatus' : 'getLikeStatus',
             })
        },
        methods: {
            addLikeAction() {
                // this.$store.commit('ADD_LIKE_COUNTER', 1)
                this.$store.dispatch('addLikeAction', 1)
            }
        },
    }
</script>