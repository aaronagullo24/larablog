<template lang="es">
    <div class="col-8 offset-2">
        <div class="card">
            <div class="card-header">
                ssssssasa
            </div>
            <div class="card-body">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Nombre</span>
                    </div>
                    <input type="text" class="form-control" />
                </div>


                <div class="input-group mt-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Apellido</span>
                    </div>
                    <input type="text" class="form-control" />
                </div>

                <div class="input-group mt-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Email</span>
                    </div>
                    <input type="email" class="form-control" />
                </div>

                <div class="input-group mt-3">
                    <textarea class="form-control" placeholder="Comentarios..."></textarea>
                </div>
                <button class="btn btn-primary float-right mt-3 btn-lg">Enviar</button>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        created() { },
        methods: {
            saveContact: function () {
                return;
            }
        },
        data: function () {
            return {};
        }
    };
</script>