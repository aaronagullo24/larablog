window.Vue = require('vue');
import VueRouter from 'vue-router';
import PostList from "../components/PostListComponent.vue";
import PostDetail from "../components/PostDetailComponent.vue";

Vue.use(VueRouter);

export default new VueRouter({
    routes: [
        { path: '/', component: PostList,name:"list" },
        { path: '/detail/:id', component: PostDetail,name:"detail"},
   
    ]
});