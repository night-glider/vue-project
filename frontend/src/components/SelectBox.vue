<template>
  <div class="select-box">
    <span>{{label}}</span>
    <br>
    <select :value="modelValue" @input="$emit('update:modelValue', $event.target.value)">
      <option v-for="(option, index) in options" v-bind:key="index" 
      :value="option">
        {{ option }}
      </option>
    </select>
  </div>
</template>

<script>
export default {
  name: 'SelectBox',
  props: {
    label: String,
    modelValue: String,
    options: Array
  },
  emits: ['update:modelValue']
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
.select-box {
  margin: 10px;
  text-align: left;
  display: inline-block;
  background-color: #191D27;
  border-style: solid;
  border-color: #191D27;
  border-width: 1px;
}
.select-box:hover {
  border-color: #689CE8;
}

select {
  font: inherit;
  color: inherit;
  background-color: #202531;
  border-style: unset;
}
select:focus-visible {
  border-style: unset;
  outline-style: unset;
}
</style>
