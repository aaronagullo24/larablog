/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

 Vue.component('list-posts',{
     data:function(){
         return{
            posts2: [{
                title: 'Titulo 1',
                image: '1587497227.png',
                content: 'Hola buenos dias'
            },
            {
                title: 'Titulo 2',
                image: '1587497227.png',
                content: 'Hola buenos dias'
            },
            {
                title: 'Titulo 3',
                image: '1587497227.png',
                content: 'Hola buenos dias'
            },
            {
                title: 'Titulo 4',
                image: '1587497227.png',
                content: 'Hola buenos dias'
            },
            {
                title: 'Titulo 5',
                image: '1587497227.png',
                content: 'Hola buenos dias'
            },
            ]
         };
     },
     template:
     '<div><div class="card" v-for="post in posts2">  <div class="card-body"> <h5 class="card-title"> {{post.title}}</h5> <p class="card-text">{{post.content}}</p> <a href="#" class="btn btn-primary">Ver resumen</a> </div> </div></div>'
 })

const app = new Vue({
    el: '#app',
    data: {
        message: 'hola Vue',
        posts: [{
            title: 'Titulo 1',
            image: '1587497227.png',
            content: 'Hola buenos dias'
        },
        {
            title: 'Titulo 2',
            image: '1587497227.png',
            content: 'Hola buenos dias'
        },
        {
            title: 'Titulo 3',
            image: '1587497227.png',
            content: 'Hola buenos dias'
        },
        {
            title: 'Titulo 4',
            image: '1587497227.png',
            content: 'Hola buenos dias'
        },
        {
            title: 'Titulo 5',
            image: '1587497227.png',
            content: 'Hola buenos dias'
        },
        ]
    }
});
