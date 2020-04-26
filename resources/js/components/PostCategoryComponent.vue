<template lang="es">
    <div>
        <h1>{{category.title}}</h1>
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
  created() {
    this.getPosts();
  },
  methods: {
    postClick: function(post) {
      this.postSelected = post;
    },
    getPosts() {
      fetch("/api/post/" + this.$route.params.category_id + "/category")
        .then(response => response.json())
        .then(json => {
          this.posts = json.data.posts.data
          this.category = json.data.category
        });
    }
  },
  data: function() {
    return {
      postSelected: "",
      posts: [],
      category:"",
    };
  }
};
</script>
