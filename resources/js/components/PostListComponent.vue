<template lang="es">
    <div>
      <post-list-default v-if="total > 0" :posts="posts" :total="total"></post-list-default>
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
        .then(json=>{
          this.posts = json.data.data;
          this.total = json.data.last_page
        });

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
      posts: [],
      total:0
    };
  }
};
</script>
