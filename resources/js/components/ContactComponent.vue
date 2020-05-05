<template>
  <div class="col-8 offset-2">
    <form @submit.prevent="onSubmit">
      <BaseInput label="Nombre" v-model="form.name"></BaseInput>
      {{$v}}
      <BaseInput label="Apellido" v-model="form.surname"></BaseInput>
      <BaseInput label="Email" type="email" v-model="form.email"></BaseInput>
      <BaseInput label="Telefono" :mask="'(###) ###-####'"  v-model="form.phone"></BaseInput>

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
import { required,minLength} from 'vuelidate/lib/validators';

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
  validations:{
    form:{
      name:{
        required,
        minLength:minLength(3)
      }
    }
  },
  methods: {
    onSubmit() {
      if (this.formValid) {
        console.log("enviado");
      } else {
        console.log("no enviado");
      }
    }
  },

  computed: {
    formValid() {

      console.log(this.$v.form.name.$invalid);

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