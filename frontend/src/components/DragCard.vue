<template>
  <div class="card">
    <img :src="photo_url" width=100 height=100 />
    {{profession}}
    <br>
    {{name}}
    <br>
    {{age}}
    <br>
    <Button text="Перейти" :to="'/edit?id=' + id"></Button>
  </div>

</template>

<script>
import Button from './RouterButton.vue'

  export default {
    name: 'DragCard',
    props: {
    photo_url: String,
    profession: String,
    name: String,
    age: String,
    id: String,
    },
    components: {
      Button
    }
  }
</script>

<style scoped>
  .card {
    display:flex;
    align-items: center;
    flex-direction: column;
    background-color: rgb(51, 59, 79);
    margin: 10px;
    padding: 5px;
  }
</style>