<template>
  <div class="header">
    <Button text="УБИЙЦА HeadHunter!"></Button>
    <Button text="Фишки"></Button>
    <Button text="Цены"></Button>
    <Button text="FAQ"></Button>
    <Button text="О сайте"></Button>
  </div>
</template>

<script>
import Button from './RegularButton.vue'

export default {
  name: 'HeaderComponent',
  props: {
    msg: String
  },
  components: {
    Button
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
.header {
  padding: 10px;
  display: flex;
  flex-direction: row;
  justify-content: space-around;
  background-color: rgb(51, 59, 79);
}

</style>
