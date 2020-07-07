<template>
    <div>
        <vue-progress-bar></vue-progress-bar>
        <h3 class="main-title text-center">Deleted Blog Posts</h3><br/>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Body</th>
                <th>Image</th>
                <th>Deleted At</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="post in deletedposts" :key="post.id">
                <td>{{ post.id }}</td>
                <td>{{ post.title }}</td>
                <td>{{ post.desc }}</td>
                <td>{{ post.body }}</td>
                <td>{{ post.image }}</td>
                <td>{{ post.deleted_at }}</td>
                <td>{{ post.created_at }}</td>
                <td>{{ post.updated_at }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <button class="btn btn-danger" @click="restorePost(post.id)">Restore</button>
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
                deletedposts: []
            }
        },
        created() {
            this.$Progress.start()
            this.axios
                .get('http://localhost:8000/api/deletedposts')
                .then(response => {
                    this.deletedposts = response.data;
                    this.$Progress.finish()
                });
        },
        methods: {
            restorePost(id) {
                this.$Progress.start()
                this.axios
                    .delete(`http://localhost:8000/api/post/restore/${id}`)
                    .then(response => {
                        let i = this.deletedposts.map(item => item.id).indexOf(id); // find index of your object
                        this.deletedposts.splice(i, 1)
                        this.$Progress.finish()
                    });
            }
        }
    }
</script>