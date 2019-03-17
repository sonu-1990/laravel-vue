import AdminHomeComponent from './components/admin/AdminHomeComponent.vue';
import ExampleComponent from './components/ExampleComponent.vue';
import CategoryListComponent from './components/admin/category/ListComponent.vue';
import CategoryAddComponent from './components/admin/category/NewComponent.vue';
import CategoryEditComponent from './components/admin/category/EditComponent.vue';
// Post
import PostListComponent from './components/admin/post/ListComponent.vue';
import PostAddComponent from './components/admin/post/AddComponent.vue';
import PostEditComponent from './components/admin/post/EditComponent.vue';
// FrontEnd
import PublicHomeComponent from './components/public/PublicHome.vue';
import BlogPostComponent from './components/public/blog/BlogPost.vue';
import SingleBlogPost from './components/public/blog/SingleBlog.vue';



export const routes = [
    { path: '/home', component: AdminHomeComponent },
    { path: '/category-list', component: CategoryListComponent },
    { path: '/add-category', component: CategoryAddComponent },
    { path: '/edit-category/:categoryId', component: CategoryEditComponent},
    // Post 
    { path: '/post-list', component: PostListComponent },
    { path: '/add-post', component: PostAddComponent },
    { path: '/edit-post/:postId', component: PostEditComponent},

    // Frontend Component
    { path: '/', component: PublicHomeComponent },
    { path: '/blog', component: BlogPostComponent },
    { path: '/singlepost/:id', component: SingleBlogPost },
    { path: '/categories/:id', component: BlogPostComponent },
];