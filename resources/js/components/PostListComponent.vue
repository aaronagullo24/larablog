<template lang="es">
    <div>
        <div class="card mt-3" v-for="post in posts" :key="post.title">
            <img :src=" '/image/'+  post.image" class="card-img-top" >
                <div class="card-body">
                    <h5 class="card-title"> {{post.title}}</h5>
                    <p class="card-text">{{post.content}}</p>
                    <button class="btn btn-primary" v-on:click="postClick(post)">Ver resumen</button>
                    <router-link class="btn btn-primary" :to="{name:'detail',params:{id:post.id}}">ver</router-link>
                </div>
        </div>
        <modal-post :post="postSelected"></modal-post>

    </div>
</template>

<script>
export default {
  methods: {
    postClick: function(post) {
      this.postSelected = post;
    }
  },
  data: function() {
    return {
      postSelected: "",
      posts: [
        {
          id:1,
          title: "Titulo 102020",
          image: "1587497227.png",
          content: "Hola buenos dias"
        },
        {
          id:2,
          title: "Titulo 2",
          image: "1587497227.png",
          content: "Hola buenos dias"
        },
        {
          id:3,
          title: "Titulo 3",
          image: "1587497227.png",
          content: "Hola buenos dias"
        },
        {
          id:4,
          title: "Titulo 4",
          image: "1587497227.png",
          content: "Hola buenos dias"
        },
        {
          id:5,
          title: "Titulo 5",
          image: "1587497227.png",
          content: "Hola buenos dias"
        }
      ]
    };
  }
};
</script>
