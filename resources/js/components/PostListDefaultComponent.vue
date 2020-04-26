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
    props:["posts"],
  created() {
  },
  methods: {
    postClick: function(p) {
      this.postSelected = p;
    },
  },
  data: function() {
    return {
      postSelected: "",
    };
  }
};
</script>
