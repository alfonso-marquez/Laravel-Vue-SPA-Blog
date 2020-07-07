<template>
    <div>
        <vue-progress-bar></vue-progress-bar>
        <div class="row search-bar">
             <input type="text" v-model="search" placeholder="Search Title..."/>
        </div>
        <h3 class="main-title text-center">Blog Posts</h3><br/>

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Body</th>
                <th>Image</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="post in filteredLists" :key="post.id">
                <td>{{ post.id }}</td>
                <td>{{ post.title }}</td>
                <td>{{ post.desc }}</td>
                <td>{{ post.body }}</td>
                <td>{{ post.image }}</td>
                <td>{{ post.created_at }}</td>
                <td>{{ post.updated_at }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <router-link :to="{name: 'edit', params: { id: post.id }}" class="btn btn-primary">Edit
                        </router-link>
                        <button class="btn btn-danger" @click="deletePost(post.id)">Delete</button>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
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
                    this.posts = response.data;
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
        methods: {
        //     getFilteredPosts() {
        //         console.log("filter loaded");
        //         this.axios
        //          .get('http://localhost:8000/api/posts')
        //          .then(response =>)
        //         .then(res => {
        //         if (this.search) {
        //             this.posts = res.results.filter(posts =>
        //             posts.title.toLowerCase().includes(this.search.toLowerCase())
        //             );
        //         } else {
        //             this.posts = res.results;
        //         }
        //     });
        // },
            deletePost(id) {
                this.$Progress.start()
                this.axios
                    .delete(`http://localhost:8000/api/post/delete/${id}`)
                    .then(response => {
                        let i = this.posts.map(item => item.id).indexOf(id); // find index of your object
                        this.posts.splice(i, 1)
                        this.$Progress.finish()
                    });
            }
        }
    }
</script>