<template>
  <div class="col-8 offset-2">
    <form>
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
        <input v-model="form.email" type="text" class="form-control" />
      </div>

      <div class="form-group">
        <label>Telefono</label>
        <input v-model="form.phone" type="text" class="form-control" />
      </div>

      <div class="form-group">
        <label>Contenido</label>
        <textarea v-model="form.content" class="form-control" row="3"></textarea>
      </div>

      <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
  </div>
</template>

<script>
export default {
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
  }
};
</script>