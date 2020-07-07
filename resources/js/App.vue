<template>
    <div>
        <b-navbar toggleable="lg" type="dark" variant="dark">
            <b-button v-b-toggle.sidebar-backdrop><b-icon icon="list"></b-icon></b-button>
            <!-- <b-navbar-brand style=" color: white;">
                Laravel Vue Blog (SPA)
            </b-navbar-brand> -->
            <b-navbar-nav class="ml-auto">
                <b-nav-item-dropdown right>
                <!-- Using 'button-content' slot -->
                <template v-slot:button-content>
                    <em>User</em>
                </template>
                <b-dropdown-item href="#">Profile</b-dropdown-item>
                <b-dropdown-item href="#">Sign Out</b-dropdown-item>
                </b-nav-item-dropdown>
            </b-navbar-nav>
        </b-navbar>
    
        <b-sidebar
            id="sidebar-backdrop"
            backdrop
            shadow
        >   
            <div class="container">
                <h4 class="app-title">Laravel Vue Blog (SPA)</h4>
                <div class="home-panel">
                    <h5 class="nav-item">User Panel</h5>
                    <router-link to="/" class="nav-item nav-link"><b-icon icon="house-fill"></b-icon> Home</router-link>
                </div>
                <div class="admin-panel">
                    <h5 class="nav-item">Admin Panel</h5>
                    <router-link to="/admin/posts" class="nav-item nav-link"><b-icon icon="folder-fill"></b-icon> List Blog Posts</router-link>
                    <router-link to="/admin/add" class="nav-item nav-link"><b-icon icon="plus-circle-fill"></b-icon> Add Blog Post</router-link>
                    <router-link to="/admin/deletedPosts" class="nav-item nav-link"><b-icon icon="trash-fill"></b-icon> Deleted Blog Posts</router-link>
                </div>
            </div>
         </b-sidebar>
         
        <div class="container">
            <router-view></router-view>
        </div>
    </div>
</template>

<script>
    export default {}
</script>