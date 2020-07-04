import AllPosts from './components/admin/AllPosts.vue';
import AddPost from './components/admin/AddPost.vue';
import EditPost from './components/admin/EditPost.vue';
import DeletedPosts from './components/admin/DeletedPosts.vue';

import HomePosts from './components/HomePosts.vue';
import ViewPost from './components/View.vue';



export const routes = [
    { 
        path: '*', redirect: '/'
    },
    {
        name: 'posts',
        path: '/admin/posts',
        component: AllPosts
    },
    {
        name: 'home',
        path: '/',
        component: HomePosts
    },
    {
        name: 'view',
        path: '/view/:id',
        component: ViewPost
    },
    {
        name: 'add',
        path: '/admin/add',
        component: AddPost
    },
    {
        name: 'edit',
        path: '/admin/edit/:id',
        component: EditPost
    },
    {
        name: 'deletedPosts',
        path: '/admin/deletedPosts',
        component: DeletedPosts
    },
];