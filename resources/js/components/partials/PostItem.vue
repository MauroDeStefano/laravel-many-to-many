<template>
  <article>
    <p>questa è una prova</p>
    <h4><a href="">{{post.title}}</a></h4>
    <p>{{post.created_at}}</p>
    <p>{{post.content}}</p>
  </article>

  
</template>

<script>
export default {
  name: 'PostItem',

  props :{
    'post' : Object
  }
}
</script>

<style>

</style>