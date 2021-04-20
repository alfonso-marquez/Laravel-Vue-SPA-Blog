import Index from "./components/admin/Index.vue";
import AddApplicant from "./components/admin/AddApplicant.vue";
import EditApplicant from "./components/admin/EditApplicant.vue";
import DeletedApplicants from "./components/admin/DeletedApplicants.vue";

import Home from "./components/Home.vue";
import ViewApplicant from "./components/ViewApplicant.vue";

export const routes = [
    {
        path: "*",
        redirect: "/"
    },
    {
        name: "index",
        path: "/admin/index",
        component: Index
    },
    {
        name: "home",
        path: "/",
        component: Home
    },
    {
        name: "index",
        path: "/admin/applicants",
        component: Index
    },
    {
        name: "view",
        path: "/view/:id",
        component: ViewApplicant
    },
    {
        name: "add",
        path: "/admin/add",
        component: AddApplicant
    },
    {
        name: "edit",
        path: "/admin/edit/:id",
        component: EditApplicant
    },
    {
        name: "deletedApplicants",
        path: "/admin/deletedApplicants",
        component: DeletedApplicants
    }
];
