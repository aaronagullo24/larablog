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
  created() {
    this.getPost();
  },
  methods: {
    postClick: function(post) {
      this.postSelected = post;
    },
    getPost() {
      fetch("/api/post")
        .then(response=> response.json())
        .then(json=>this.posts = json.data.data);

      /*fetch("/api/post")
        .then(function(response) {
          return response.json();
        })
        .then(function(json) {
          this.posts = json.data.data;
          //console.log(json.data.data[0].title);
        })*/
    }
  },
  data: function() {
    return {
      postSelected: "",
      posts: []
    };
  }
};
</script>
