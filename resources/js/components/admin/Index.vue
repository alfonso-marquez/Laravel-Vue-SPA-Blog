<template>
    <div>
        <vue-progress-bar></vue-progress-bar>
        <div class="row search-bar">
            <input
                v-on:@keyup.enter="searchApplicant"
                type="search"
                v-model="search"
                placeholder="Search Title..."
            />
        </div>
        <h3 class="main-title text-center">CS Applicants Record</h3>
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
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="applicant in filteredLists" :key="applicant.id">
                    <td>{{ applicant.id }}</td>
                    <td>{{ applicant.last_name }}</td>
                    <td>{{ applicant.first_name }}</td>
                    <td>{{ applicant.middle_name }}</td>
                    <td>{{ applicant.age }}</td>
                    <td>{{ applicant.details }}</td>
                    <td>{{ applicant.created_at }}</td>
                    <td>{{ applicant.updated_at }}</td>
                    <td>
                        <div class="btn-group" role="group">
                            <router-link
                                :to="{
                                    name: 'edit',
                                    params: { id: applicant.id }
                                }"
                                class="btn btn-primary"
                                >Edit
                            </router-link>
                            <button
                                class="btn btn-danger"
                                @click="deleteApplicant(applicant.id)"
                            >
                                Delete
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
            applicants: [],
            search: ""
        };
    },
    created() {
        this.$Progress.start();
        this.axios
            .get("http://localhost:8000/api/applicants")
            .then(response => {
                this.applicants = response.data;
                this.$Progress.finish();
            });
    },
    computed: {
        filteredLists() {
            return this.applicants.filter(applicant => {
                return applicant.last_name
                    .toLowerCase()
                    .includes(this.search.toLowerCase());
            });
        }
    },
    methods: {
        searchApplicant() {
            // this.axios
            //     .get(`http://localhost:8000/api/applicant/${id}`)
            //     .then(response => {
            //         this.searchResult = response.data;
            //     })
            //     .catch(e => console.log(e));
            console.log("search");
        },
        deleteApplicant(id) {
            this.$Progress.start();
            this.axios
                .delete(`http://localhost:8000/api/applicant/delete/${id}`)
                .then(response => {
                    let i = this.applicants.map(item => item.id).indexOf(id); // find index of your object
                    this.applicants.splice(i, 1);
                    this.$Progress.finish();
                });
        }
    }
};
</script>
