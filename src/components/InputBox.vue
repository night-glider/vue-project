<template>
  <div class="input-box">
    <span>{{label}}</span>
    <br>
    <input type="span" :value="modelValue"
    @input="$emit('update:modelValue', $event.target.value)">
    <br v-if="!valid && error_message">
    <span v-if="!valid && error_message" class="error-message">{{error_message}}</span>
  </div>
</template>

<script>
export default {
  name: 'InputBox',
  props: {
    modelValue: String,
    label: String,
    error_message: String,
    regex: {
        type: String,
        default: ""
      }
  },
  computed: {
    valid() {
      return new RegExp(this.regex).test(this.modelValue)
    },
  },
  emits: ['update:modelValue']

}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
.input-box {
  margin: 10px;
  text-align: left;
  display: inline-block;
  background-color: #191D27;
  border-style: solid;
  border-color: #191D27;
  border-width: 1px;
}
.input-box:hover {
  border-color: #689CE8;
}
.error-message {
  color: red;
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
