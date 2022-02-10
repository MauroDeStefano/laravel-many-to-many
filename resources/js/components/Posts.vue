<template>
  <div>
    <h1>POSTS</h1>
    
    <!-- <PostItem 
    v-for="post in posts" :key="post.id"
    :post = 'post'
    /> -->
  </div>
</template>

<script>

import PostItem from "./partials/PostItem.vue"

export default {
  name: 'Posts',
  components :{
    PostItem
  },
  data(){
    return {
      apriUrl: 'http://127.0.0.1:8000/api/posts',
      posts : null,
      pages: {}
    }
  },

  mounted(){
    this.getPost();
  },

  methods : {
    getPost(){
      axios.get(this.apriUrl )
      .then(response =>{
        this.posts = response.data;
        console.log(response.data);
        
      })
    }
  }
}
</script>

<style>

</style>