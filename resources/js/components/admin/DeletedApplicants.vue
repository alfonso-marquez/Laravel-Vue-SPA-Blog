<template>
    <div>
        <vue-progress-bar></vue-progress-bar>
        <h3 class="main-title text-center">Deleted Applicants</h3>
        <br />
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Last Name</th>
                    <th>First Name</th>
                    <th>Middle Name</th>
                    <th>Age</th>
                    <th>Details</th>
                    <th>Deleted At</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="applicant in deleteApplicant" :key="applicant.id">
                    <td>{{ applicant.id }}</td>
                    <td>{{ applicant.last_name }}</td>
                    <td>{{ applicant.first_name }}</td>
                    <td>{{ applicant.middle_name }}</td>
                    <td>{{ applicant.age }}</td>
                    <td>{{ applicant.details }}</td>
                    <td>{{ applicant.deleted_at }}</td>
                    <td>{{ applicant.created_at }}</td>
                    <td>{{ applicant.updated_at }}</td>
                    <td>
                        <div class="btn-group" role="group">
                            <button
                                class="btn btn-danger"
                                @click="restoreApplicant(applicant.id)"
                            >
                                Restore
                            </button>
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
            deletedApplicants: []
        };
    },
    created() {
        this.$Progress.start();
        this.axios
            .get("http://localhost:8000/api/deletedapplicants")
            .then(response => {
                this.deletedapplicants = response.data;
                this.$Progress.finish();
            });
    },
    methods: {
        restoreApplicant(id) {
            this.$Progress.start();
            this.axios
                .delete(`http://localhost:8000/api/applicant/restore/${id}`)
                .then(response => {
                    let i = this.deletedapplicants
                        .map(item => item.id)
                        .indexOf(id); // find index of your object
                    this.deletedapplicants.splice(i, 1);
                    this.$Progress.finish();
                });
        }
    }
};
</script>
