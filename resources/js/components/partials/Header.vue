<template>
  <header >
    <nav clnoneass="container">
      <ul>
        <li>
          <router-link :to="{name: 'home'}">Home</router-link>
        </li>
        <li>
          <router-link :to="{name: 'posts'}">Blog</router-link>
          
        </li>
        <li>
          <router-link :to="{name: 'about'}">Chi siamo</router-link>
        </li>
        <li>
          <router-link :to="{name: 'contacts'}">Contatti</router-link>
        </li>
      </ul>
    </nav>
  </header>
</template>

<script>
export default {
  name: "Header"
}
</script>

<style lang="scss" scoped>
header {

  height: 80px;
  line-height: 80px;
  text-align: center;
  background-color: rgb(204, 187, 155);

  nav{
    ul {
      list-style: none;

      li{
        display: inline-block;
        margin: 0 45;

        a{
          color: black;
          text-decoration: none;

          &:hover{
            color: rgb(94, 94, 94);
            text-shadow: 0 1;
          }
        }
      }
    }
  }
}
</style>