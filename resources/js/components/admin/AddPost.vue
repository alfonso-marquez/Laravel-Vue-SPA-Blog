<template>
    <div>
        <h3 class="text-center">Add Post</h3>
        <div class="row">
            <div class="col-lg-12">
                <form @submit.prevent="addPost" enctype="multipart/form-data">
                    <div class="">
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" class="form-control" v-model="post.title">
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <input type="text" class="form-control" v-model="post.desc">
                        </div>
                        <div class="form-group">
                            <label>Body</label>
                            <textarea type="text" rows="10" class="form-control" v-model="post.body"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <input type="text" class="form-control" v-model="post.image">
                            <!-- <input type="file" name="image"  id="inputFileUpload"
                                v-on:change="onFileChange"> -->
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Post</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component Successfully Mounted.')
        },
        data() {
            return {
                post: {},
                image: '',
                success: '',
            }
        },
        methods: {
                    
            addPost() {
                this.axios
                    .post('http://localhost:8000/api/post/add', this.post)
                    .then(response => (
                        this.$router.push({name: 'home'})
                        // console.log(response.data)
                    ))
                    .catch(error => console.log(error))
                    .finally(() => this.loading = false)
            }
        }
    }
</script>