window.Vue = require('vue');
import VueRouter from 'vue-router';
import PostList from "../components/PostListComponent.vue";
const Foo = {
    template:
        '<div>foo<router-link to="/foo">Go to Foo</router-link><router-link to="/bar">Go to Bar</router-link><router-link to="/">Go to List</router-link>'
}
const Bar = {
    template:
        '<div>bar<router-link to="/foo">Go to Foo</router-link><router-link to="/bar">Go to Bar</router-link><router-link to="/">Go to List</router-link>'
}

Vue.use(VueRouter);

export default new VueRouter({
    routes: [
        { path: '/', component: PostList },
        { path: '/foo', component: Foo },
        { path: '/bar', component: Bar }
    ]
});