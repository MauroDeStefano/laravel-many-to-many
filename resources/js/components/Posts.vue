<template>
  <div class="container">
    <h1>POSTS</h1>
    
    <PostItem 
    v-for="post in posts" :key="post.id"
    :post = 'post'
    />

    <button class="" @click="getPost(pages.current - 1)"
    :disabled= "pages.current === 1"
    >Indietro</button>

    <button v-for="item in pages.last" :key="`pagina` + item"
    @click="getPost(item)"
    :disabled = "pages.current === item"
    >
    {{item}}
    </button>


    <button class="" @click="getPost(pages.current + 1)"
    :disabled= "pages.current === pages.last"
    >Avanti</button>
  
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
      apriUrl: 'http://127.0.0.1:8000/api/posts?page=',
      posts : null,
      pages: {}
    }
  },

  mounted(){
    this.getPost();
  },

  methods : {
    getPost(page = 1){
      axios.get(this.apriUrl + page )
      .then(response =>{
        this.posts = response.data.data;
        this.pages = {
          current : response.data.current_page,
          last : response.data.last_page
        }
        
        ;
      })
    }
  }
}
</script>

<style>

</style>