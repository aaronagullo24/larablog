<template lang="es">
    <div>
        <div v-if="post">
            <div class="card mt-3">
                <div class="card-header">
                    <img :src=" '/image/'+  post.image.image" class="card-img-top">
                </div>
                <div class="card-body">
                    <h1 class="card-title"> {{post.title}}</h1>
                    <router-link class="btn btn-primary" :to="{name:'detail',params:{id:post.id}}">{{post.category.title}}</router-link>
                    <p class="card-text">{{post.content}}</p>

                </div>
            </div>
        </div>
        <div v-else>
            <h1>El post no existe</h1>
        </div>
    </div>
</template>

<script>
    export default {
        created() {
           this.getPost();
        },
        methods: {
            getPost: function () {
                fetch("/api/post/"+ this.$route.params.id)
                    .then(response => response.json())
                    .then(json => (this.post = json.data));
            }
        },
        data: function () {
            return {
                postSelected: "",
                post:""
            };
        }
    };
</script>