<template>
  <div class="col-8 offset-2">
    <form @submit.prevent="onSubmit">

        <BaseInput label="Nombre"></BaseInput>

      <div class="form-group">
        <label>Nombre</label>
        <input v-model="form.name" type="text" class="form-control" />
      </div>

      <div class="form-group">
        <label>Apellido</label>
        <input v-model="form.surname" type="text" class="form-control" />
      </div>

      <div class="form-group">
        <label>Email</label>
        <input v-model="form.email" type="email" class="form-control" />
      </div>

      <div class="form-group">
        <label>Telefono</label>
        <input v-model="form.phone" type="text" class="form-control" />
      </div>

      <div class="form-group">
        <label>Contenido</label>
        <textarea v-model="form.content" class="form-control" rows="3"></textarea>
      </div>

      <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
  </div>
</template>

<script>

import BaseInput from "../components/BaseInput.vue";

export default {
  components: {
    BaseInput
  },

  data() {
    return {
      form: {
        name: "Aaron",
        surname: "",
        email: "",
        phone: "",
        content: ""
      }
    };
  },
  methods: {
    onSubmit() {
      console.log("enviado " + this.formValid);
    }
  },

  computed: {
    formValid() {
      return (
        this.form.name.length > 0 &&
        this.form.surname.length > 0 &&
        this.form.phone.length > 0 &&
        this.form.email.length > 0 &&
        this.form.content.length > 0
      );
    }
  }
};
</script>