<template>
  <div class="combo-box">
    <span>{{label}}</span>
    <br>
    <input type="text" :list="label" :value="modelValue"
    @input="$emit('update:modelValue', $event.target.value)">
    <datalist :id="label">
      <option v-for="(option, index) in options" v-bind:key="index" 
      :value="option">
        {{ option }}
      </option>
    </datalist>
  </div>
</template>

<script>
export default {
  name: 'ComboBox',
  props: {
    modelValue: String,
    label: String,
    options: Array
  },
  computed: {

  },
  emits: ['update:modelValue']

}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
.combo-box {
  margin: 10px;
  text-align: left;
  display: inline-block;
  background-color: #191D27;
  border-style: solid;
  border-color: #191D27;
  border-width: 1px;
}
.combo-box:hover {
  border-color: #689CE8;
}
input {
  font: inherit;
  color: inherit;
  background-color: #202531;
  border-style: unset;
}
input:focus-visible {
  border-style: unset;
  outline-style: unset;
}
</style>
