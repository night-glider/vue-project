<template>
  <Header/>
  <router-view></router-view>
</template>

<script>
import Header from './components/Header.vue'




export default {
  name: 'App',
  components: {
    Header,
  },
  data() {
    return {
    }
  },
}

</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: rgb(204, 206, 211);
}
</style>
