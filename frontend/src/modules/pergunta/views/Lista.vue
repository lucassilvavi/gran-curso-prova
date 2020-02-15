<template>
  <div class="card">
    <div class="card-header">
      Programa de estudos
    </div>
    <div class="card-body">
      <div class="alert alert-success" v-if="messageSucess" role="alert">
        A simple success alert—check it out!
      </div>
      <blockquote class="blockquote mb-0">
        <form method="post">
          <div class="container">
            <div class="row">
              <div class="col">
                <select class="custom-select">
                  <option selected>Orgão</option>
                  <option v-for='value in arrayTeste' :value='value.name' >{{value.descricao}}</option>
                </select>
              </div>
              <div class="col">
                <select class="custom-select">
                  <option selected>Banca</option>
                  <option v-for='value in arrayTeste' :value='value.name' >{{value.descricao}}</option>
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
        arrayTeste:[{name:'sksdkn',descricao:'dsdsd'},{name:'sksdkn',descricao:'dsdsd'},{name:'sksdkn',descricao:'dsdsd'}],
        messageSucess: false,
      };
    },
    computed: {
      ...mapGetters({
        // programas: 'programa/programas',
        // bancas: 'programa/bancas',
        // orgaos: 'programa/orgaos',
      }),
    },
    mounted() {
      this.buscarBancasAction();
      // this.buscarOrgaosAction();
    },
    methods: {
      ...mapActions({
        buscarBancasAction: 'pergunta/buscarBancasAction',
        // buscarOrgaosAction: 'programa/buscarOrgaosAction',
        // cadastrarProgramaAction: 'programa/cadastrarProgramaAction',
      }),
      cadastrarPrograma(e) {
        e.preventDefault();

        this.messageSucess = true;
        setTimeout(() => this.messageSucess=false, 2800);

      },
    },
  };
</script>
