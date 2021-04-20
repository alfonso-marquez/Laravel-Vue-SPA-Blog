<template>
    <div>
        <vue-progress-bar></vue-progress-bar>
        <h3 class="text-center">Edit Applicant</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="updateApplicant">
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
                            type="text"
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
                    <div class="form-group">
                        <label>Image</label>
                        <input
                            type="text"
                            class="form-control"
                            v-model="applicant.image"
                        />
                    </div>
                    <button type="submit" class="btn btn-primary">
                        Update Applicant
                    </button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            applicant: {}
        };
    },
    created() {
        this.$Progress.start();
        this.axios
            .get(
                `http://localhost:8000/api/applicant/edit/${this.$route.params.id}`
            )
            .then(response => {
                this.applicant = response.data;
                // console.log(response.data);
            });
    },
    methods: {
        updateApplicant() {
            this.axios
                .post(
                    `http://localhost:8000/api/applicant/update/${this.$route.params.id}`,
                    this.applicant
                )
                .then(response => {
                    this.$router.push({ name: "home" });
                    this.$Progress.finish();
                });
        }
    }
};
</script>
