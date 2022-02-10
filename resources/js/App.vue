<template>
<div>
  <Header />
  <Posts />
</div>  
</template>

<script>

import Header from './components/partials/Header.vue';
import Posts from './components/Posts.vue';

export default {
  name: "App",
  components: {
    Header,
    Posts,
  }
}
</script>

<style lang="scss">

</style>