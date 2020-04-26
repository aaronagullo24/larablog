<template lang="es">
    <div>
        <div class="card mt-3" v-for="post in posts" :key="post.title">
            <img :src=" '/image/'+  post.image" class="card-img-top" >
                <div class="card-body">
                    <h5 class="card-title"> {{post.title}}</h5>
                    <p class="card-text">{{post.content}}</p>
                    <a href="#" class="btn btn-primary">Ver resumen</a>
                </div>
        </div>
    </div>
</template>

<script>
export default {
  props: ["title", "final_posts"],
  data: function() {
    return {
      posts: [
        {
          title: "Titulo 102020",
          image: "1587497227.png",
          content: "Hola buenos dias"
        },
        {
          title: "Titulo 2",
          image: "1587497227.png",
          content: "Hola buenos dias"
        },
        {
          title: "Titulo 3",
          image: "1587497227.png",
          content: "Hola buenos dias"
        },
        {
          title: "Titulo 4",
          image: "1587497227.png",
          content: "Hola buenos dias"
        },
        {
          title: "Titulo 5",
          image: "1587497227.png",
          content: "Hola buenos dias"
        }
      ]
    };
  }
};
</script>
