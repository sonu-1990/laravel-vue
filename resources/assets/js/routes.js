import AdminHomeComponent from './components/admin/AdminHomeComponent.vue';
import ExampleComponent from './components/ExampleComponent.vue';
import ListComponent from './components/admin/category/ListComponent.vue';
export const routes = [
    { path: '/home', component: AdminHomeComponent },
    { path: '/post', component: ExampleComponent },
    { path: '/category-list', component: ListComponent }
];