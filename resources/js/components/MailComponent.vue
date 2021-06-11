<template>

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-md-8">

                <div class="card">

                    <div class="card-header">Enviar Email</div>

                    <div class="card-body">

                        <form class="form-group" @submit.prevent="send">
                            <div class="text-center mb-4">
                                <h6 class="h3 mb-3 font-weight-normal">Enviar Email</h6>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail">Para</label>
                                <input type="email" id="inputEmail" class="form-control" placeholder="Email"
                                       required="required"
                                       v-model="fields.email"
                                >
                                <div v-if="errors && errors.email" class="text-danger">{{ errors.email[0] }}</div>
                            </div>

                            <div class="form-group">
                                <label for="inputTitle">Assunto</label>
                                <input type="text" id="inputTitle" class="form-control" placeholder="Assunto"
                                       required=""
                                       v-model="fields.title"
                                >
                                <div v-if="errors && errors.title" class="text-danger">{{ errors.title[0] }}</div>
                            </div>

                            <div class="form-group">
                                <label for="inputText">Mensagem</label>
                                <textarea rows="5" cols="5" id="inputText" class="form-control"
                                          required="required"
                                          v-model="fields.text"
                                ></textarea>
                                <div v-if="errors && errors.text" class="text-danger">{{ errors.text[0] }}</div>
                            </div>

                            <div class="form-row float-right">

                                <div class="display-inline">

                                    <button class="btn btn-default" type="button"
                                            @click="clearFields()"
                                    >
                                        <i class="fas fa-times text-danger"></i> Cancelar
                                    </button>

                                    <button class="btn btn-success" type="submit"
                                            @click="send()"
                                    >
                                        <i class="fas fa-check"></i> Enviar
                                    </button>

                                </div>

                            </div>

                        </form>
                    </div>

                </div>

            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        url: {
            type: String,
            required: true
        },
    },
    data() {
        return {
            loaded: true,
            sending: false,
            errors: {},
            success: false,
            fields: {},
        }
    },
    methods: {
        send() {

            if (this.loaded) {

                this.loaded = false;
                this.success = false;
                this.errors = {};

                let url = this.url;

                axios.post(url, this.fields)
                    .then(() => {
                        this.success = true;
                        this.fields = {};
                        this.showMessage('s', 'Email enviado com sucesso');
                    })
                    .catch(error => {

                        if (error.response.status === 500) {
                            this.showMessage('e', 'Não foi possível completar requisição');
                        }

                        if (error.response.status === 401) {
                            this.showMessage('w', error.response.data.server_error);
                        }

                        if (error.response.status === 400) {
                            this.errors = error.response.data.errors || {};
                            this.showMessage('w', 'Preencha todos os campos corretamente.');
                        }
                    })
                    .finally(() => this.loaded = true)
            }
        },
        clearFields() {
            this.fields = {};
            this.errors = {};
        },
        showMessage(type, message) {
            alert(message);
        }
    },
    beforeCreate() {
    },
    created() {
    },
    beforeMount() {
    },
    mounted() {
        this.fields = {
            email: '',
            title: '',
            text: '',
        };
    },
}
</script>

<style scoped>
</style>
