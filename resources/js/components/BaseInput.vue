<template>
  <div class="form-group">
    <label>{{label}}</label>
    <input :type="type" class="form-control" />
  </div>
</template>
<script>
export default {
  props: {
    label: {
      type: String,
      requerid: true
    },
    type: {
      type: String,
      default: "text",
      validator(value) {
        return ["text", "email", "password"].includes(value);
      }
    }
  }
};
</script>