<template>
    <div class="container-fluid">
        <vue-progress-bar></vue-progress-bar>
        <h2 class="text-center main-title">
            Candidate Soldier Applicants Record
        </h2>
        <div class="row mt-5">
            <div class="search-div col-5 offset-1">
                <div class="scanner-div ">
                    <div class="qr-div">
                        <h4>Scan QR Here</h4>
                        <p class="decode-result">
                            Last Result: <b>{{ search }}</b>
                        </p>

                        <qrcode-stream
                            :camera="camera"
                            @decode="onDecode"
                            @init="onInit"
                        >
                            <div
                                v-show="showScanConfirmation"
                                class="scan-confirmation"
                            >
                                <b style="font-size: 120px;">{{ search }}</b>
                            </div>
                        </qrcode-stream>
                    </div>
                </div>
                <div class="mt-3 ml-2">
                    <div class="row search-bar">
                        <input
                            type="text"
                            v-model="search"
                            placeholder="Search"
                        />
                    </div>
                </div>
            </div>
            <div class="col-5">
                <div class="result-div">
                    <h4>Records</h4>
                    <div class="row">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Last Name</th>
                                    <th>First Name</th>
                                    <th>Middle Name</th>
                                    <th>Age</th>
                                    <th>Details</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr
                                    v-for="applicant in filteredLists"
                                    :key="applicant.id"
                                >
                                    <td>{{ applicant.id }}</td>
                                    <td>{{ applicant.last_name }}</td>
                                    <td>{{ applicant.first_name }}</td>
                                    <td>{{ applicant.middle_name }}</td>
                                    <td>{{ applicant.age }}</td>
                                    <td>{{ applicant.details }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5"></div>
        <div class="container">
            <div class="row">
                <div class="col-12 d-flex justify-content-center">
                    <!-- {{ $applicants->links() }} -->
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { mapGetters } from "vuex";
import { QrcodeStream, QrcodeDropZone, QrcodeCapture } from "vue-qrcode-reader";

export default {
    components: {
        QrcodeStream,
        QrcodeDropZone,
        QrcodeCapture
    },

    data() {
        return {
            applicants: [],
            search: "",
            searchId: "",
            camera: "auto",
            result: null,
            showScanConfirmation: false
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
                return applicant.id.toString().includes(this.search.toString());
            });
        },
        ...mapGetters({
            likes: "getLikes",
            views: "getViews",
            likeStatus: "getLikeStatus"
        })
    },
    methods: {
        // addViewCounter() {
        //     this.$store.commit('ADD_VIEW_COUNTER', 1)
        // },
        async onInit(promise) {
            try {
                await promise;
            } catch (e) {
                console.error(e);
            } finally {
                this.showScanConfirmation = this.camera === "off";
            }
        },

        async onDecode(content) {
            this.result = content;
            this.search = content;
            console.log(this.result);
            this.pause();
            await this.timeout(500);
            this.unpause();
        },

        unpause() {
            this.camera = "auto";
        },

        pause() {
            this.camera = "off";
        },

        timeout(ms) {
            return new Promise(resolve => {
                window.setTimeout(resolve, ms);
            });
        }
    }
};
</script>

<style lang="scss" scoped>
.scan-confirmation {
    position: absolute;
    width: 100%;
    height: 100%;

    background-color: rgba(255, 255, 255, 0.8);

    display: flex;
    flex-flow: row nowrap;
    justify-content: center;
}
.search-div {
    display: flex;
    flex-direction: column;
}
.scanner-div {
    border-radius: 14px;
    background: #fafafa;
    box-shadow: 16px 16px 40px #b9b9b9, -16px -16px 40px #ffffff;
    padding: 16px;
}
.qr-wrapper {
    height: 50%;
    width: auto;
}
.result-div {
    padding: 16px;
    border-radius: 14px;
    background: #fafafa;
    box-shadow: 16px 16px 40px #b9b9b9, -16px -16px 40px #ffffff;
    height: 100%;
}
.search-bar {
    padding: 16px;
    width: 50%;
    border-radius: 14px;
    background: #fafafa;
    box-shadow: 16px 16px 40px #b9b9b9, -16px -16px 40px #ffffff;
    flex-direction: column;
}
.result-div {
    width: 100%;
}
</style>
