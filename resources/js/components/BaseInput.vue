<template>
  <div class="form-group">
    <label>{{ label }}</label>
    <input
      v-if="mask"
      :type="type"
      v-mask="mask"
      v-on:input="$emit('input',$event.target.value)"
      class="form-control"
    />

    <input
      v-else
      :type="type"
      v-on:input="$emit('input',$event.target.value)"
      class="form-control"
    />
  </div>
</template>
<script>
export default {
  props: {
    label: {
      type: String,
      required: true
    },
    type: {
      type: String,
      default: "text",
      validator(value) {
        return ["text", "email", "password"].includes(value);
      }
    },
    value: {
      type: String,
      required: true
    },
    mask: {
      type: String,
      required: false
    }
  }
};
</script>