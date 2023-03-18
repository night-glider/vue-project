<template>
  <div class="regular-button">
    {{text}}
  </div>
</template>

<script>
export default {
  name: 'RegularButton',
  props: {
    text: String
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
</style>
