<template lang="es">
    <div>
      <post-list-default :posts="posts"></post-list-default>
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
