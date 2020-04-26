<template lang="es">
    <div>
        <div v-if="post">
            <div class="card mt-3">
                <div class="card-header">
                    <img :src=" '/image/'+  post.image" class="card-img-top">
                </div>
                <div class="card-body">
                    <h1 class="card-title"> {{post.title}}</h1>
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
        create() {
            console.log("hola mundo");
        },
        methods: {
            getPost: function () {

            }
        },
        data: function () {
            return {
                postSelected: "",
                post:
                {
                    title: "Titulo 102020",
                    image: "1587497227.png",
                    content: "Hola buenos dias"


                }
            }
        }
    };
</script>