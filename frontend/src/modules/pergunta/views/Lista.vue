<template>
  <div class="card">
    <div class="card-header">
      Programa de estudos
    </div>
    <div class="card-body">
      <div class="alert alert-success" v-if="messageSucess" role="alert">
        Programa de estudos criado com sucesso !
      </div>
      <blockquote class="blockquote mb-0">
        <form method="post">
          <div class="container">
            <div class="row">
              <div class="col">

                <select class="custom-select">
                  <option selected>Orgão</option>
                  <option v-for='value in orgaos' :value='value.id' >{{value.nome}}</option>
                </select>
              </div>
              <div class="col">
                <select class="custom-select">
                  <option selected>Banca</option>
                  <option v-for='value in bancas' :value='value.id' >{{value.nome}}</option>
                </select>
              </div>
              <div class="col">
                <button type="submit" class="btn btn-primary" @click="cadastrarPrograma($event)">Criar programa de estudo</button>
              </div>
            </div>
          </div>
        </form>
      </blockquote>
    </div>
  </div>
</template>
<script>
  import {mapGetters, mapActions} from 'vuex';

  export default {
    name: 'Lista',
    components: {},
    data() {
      return {
        messageSucess: false,
      };
    },
    computed: {
      ...mapGetters({
        programas: 'pergunta/programas',
        bancas: 'pergunta/bancas',
        orgaos: 'pergunta/orgaos',
      }),
    },
    mounted() {
      this.buscarBancasAction();
      this.buscarOrgaosAction();
    },
    methods: {
      ...mapActions({
        buscarBancasAction: 'pergunta/buscarBancasAction',
        buscarOrgaosAction: 'pergunta/buscarOrgaosAction',
        cadastrarProgramaAction: 'programa/cadastrarProgramaAction',
      }),
      cadastrarPrograma(e) {
        e.preventDefault();

        this.messageSucess = true;
        setTimeout(() => this.messageSucess=false, 2800);

      },
    },
  };
</script>
