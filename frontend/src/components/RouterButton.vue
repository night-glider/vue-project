<template>
  <div class="regular-button">
    <router-link :to="to">
      {{text}}
    </router-link>
  </div>
</template>

<script>
export default {
  name: 'RegularButton',
  props: {
    text: String,
    to:String,
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
.regular-button {
  display: inline;
  padding: 5px;
  margin: 5px;
  background-color: #262C3B;
  border-style: solid;
  border-width: 1px;
  border-color: #202531;
}
.regular-button:hover {
  border-color: #666C7B;
  cursor:pointer;
}
a {
  color: inherit;
  text-decoration: inherit;
}
</style>
