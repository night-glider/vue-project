<template>
  <div class="header">
    <Button text="УБИЙЦА HeadHunter!" to="/"></Button>
    <Button text="Новое резюме" to="/add"></Button>
    <Button text="Просмотр резюме" to="/"></Button>
  </div>
</template>

<script>
import Button from './RouterButton.vue'

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
