<template>
    <div class="container">
        <vue-progress-bar></vue-progress-bar>
        <h3 class="main-title text-center">Add Applicant</h3>
        <div class="row">
            <div class="col-lg-12">
                <form
                    @submit.prevent="addApplicant"
                    enctype="multipart/form-data"
                >
                    <div class="">
                        <div class="form-group">
                            <label>First Name</label>
                            <input
                                type="text"
                                class="form-control"
                                v-model="applicant.first_name"
                            />
                        </div>
                        <div class="form-group">
                            <label>Last Name</label>
                            <input
                                type="text"
                                class="form-control"
                                v-model="applicant.last_name"
                            />
                        </div>
                        <div class="form-group">
                            <label>Middle Name</label>
                            <textarea
                                type="text"
                                rows="10"
                                class="form-control"
                                v-model="applicant.middle_name"
                            ></textarea>
                        </div>
                        <div class="form-group">
                            <label>Age</label>
                            <textarea
                                type="number"
                                rows="10"
                                class="form-control"
                                v-model="applicant.age"
                            ></textarea>
                        </div>
                        <div class="form-group">
                            <label>Details</label>
                            <textarea
                                type="text"
                                rows="10"
                                class="form-control"
                                v-model="applicant.details"
                            ></textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label>Image</label>
                            <input
                                type="text"
                                class="form-control"
                                v-model="applicant.image"
                            />
                            <!-- <input type="file" name="image"  id="inputFileUpload"
                                v-on:change="onFileChange"> -->
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">
                        Add Applicant
                    </button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    mounted() {
        console.log("Component Successfully Mounted.");
    },
    data() {
        return {
            applicant: {},
            image: "",
            success: ""
        };
    },
    methods: {
        addApplicant() {
            this.$Progress.start();
            this.axios
                .post("http://localhost:8000/api/applicant/add", this.applicant)
                .then(
                    response => (
                        this.$router.push({ name: "home" }),
                        this.$Progress.finish()
                        // console.log(response.data)
                    )
                )
                .catch(error => console.log(error))
                .finally(() => (this.loading = false));
        },
        addLikeCounter() {
            this.$store.commit("ADD_LIKE_COUNTER", 1);
        }
    }
};
</script>
