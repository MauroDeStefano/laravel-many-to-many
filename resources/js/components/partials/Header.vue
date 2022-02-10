<template>
  <header >
    <nav class="container">
      <ul>
        <li><a href="">Home</a></li>
        <li><a href="">Blog</a></li>
        <li><a href="">Chi siamo</a></li>
        <li><a href="">Contatti</a></li>
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