import VueRouter from 'vue-router';
import HomePage from '@/pages/HomePage.vue';
import Blog from '@/pages/Blog.vue';
import BlogDetails from '@/pages/BlogDetails.vue';
import ProjectPages from '@/pages/ProjectPage.vue';
import ProjectDetails from '@/pages/ProjectDetails.vue';
import NotFound from '@/pages/NotFound.vue';


export const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'Home',
            component: HomePage
        },
        {
            path: '/project-interno/',
            name: 'Home',
            component: HomePage
        },
        {
            path: '/project-interno/blog/:pageNumber?',
            name: 'Blog',
            component: Blog
        },
        {
            path: '/project-interno/blogdetails',
            name: 'BlogDetails',
            component: BlogDetails
        },
        {
            path: '/project-interno/project/:category?/:pageNumber?',
            name: 'Project',
            component: ProjectPages
        },
        {
            path: '/project-interno/projectdetails',
            name: 'ProjectDetails',
            component: ProjectDetails
        },
        {
            path: '/project-interno/:CatchAll(.*)',
            name: '404',
            component: NotFound
        },
    ],
    scrollBehavior(to, from, savedPosition) {
        // возврат страницы вверх при обновлении и переходе (по пагинации)
        return { x: 0, y: 0 }
    }
})
