<template>
  <article>
    <div class="title-date">
    <h4><a href="">{{post.title}}</a></h4>
    <p>{{setNewDate}}</p>
    </div>
    <p class="content">{{post.content}}</p>
  </article>

  
</template>

<script>
export default {
  name: 'PostItem',

  props :{
    'post' : Object
  },
    computed:{
    setNewDate(){
      const d = new Date(this.post.created_at);
      let day= d.getDate();
      let month = d.getMonth();
      const year = d.getFullYear();
      if(day < 10) day = "0" + day;
      if(month < 10) month = "0" + month;
      return `${day}/${month}/${year}`;

    }
  }
}
</script>

<style lang="scss">
article {
   margin: 40px 0;
  .title-date, p.content{
    padding: 10px;
    border: 1px solid rgb(177, 176, 176);
  }

  
}
</style>