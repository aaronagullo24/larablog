<template>
  <div class="col-8 offset-2">
    <form @submit.prevent="onSubmit">
      <BaseInput label="Nombre" v-model="$v.form.name.$model" :validator="$v.form.name"></BaseInput>
      <BaseInput label="Apellido" v-model="$v.form.surname.$model" :validator="$v.form.surname"></BaseInput>
      <BaseInput
        label="Email"
        type="email"
        v-model="$v.form.email.$model"
        :validator="$v.form.email"
      ></BaseInput>
      <BaseInput
        label="Telefono"
        :mask="'(##) ###-###-###'"
        v-model="$v.form.phone.$model"
        :validator="$v.form.phone"
      ></BaseInput>

      <div class="form-group">
        <label>Contenido</label>
        <textarea
          :class="{
        'is-valid':!$v.form.content.$error && $v.form.content.$dirty,
        'is-invalid':$v.form.content.$error,
        }"
          v-model="$v.form.content.$model"
          class="form-control"
          rows="3"
        ></textarea>
      </div>

      <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
  </div>
</template>

<script>
import BaseInput from "../components/BaseInput.vue";
import { required, minLength, email } from "vuelidate/lib/validators";

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
  validations: {
    form: {
      name: {
        required,
        minLength: minLength(3)
      },
      surname: {
        required,
        minLength: minLength(3)
      },
      email: {
        required,
        email
      },
      phone: {
        required,
        minLength: minLength(9)
      },
      content: {
        required
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