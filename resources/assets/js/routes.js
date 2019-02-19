import AdminHomeComponent from './components/admin/AdminHomeComponent.vue';
import ExampleComponent from './components/ExampleComponent.vue';
import ListComponent from './components/admin/category/ListComponent.vue';
import NewComponent from './components/admin/category/NewComponent.vue';
import EditComponent from './components/admin/category/EditComponent.vue';

export const routes = [
    { path: '/home', component: AdminHomeComponent },
    { path: '/post', component: ExampleComponent },
    { path: '/category-list', component: ListComponent },
    { path: '/add-category', component: NewComponent },
    { path: '/edit-category/:categoryId', component: EditComponent}
];