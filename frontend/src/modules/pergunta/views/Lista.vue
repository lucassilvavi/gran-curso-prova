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
        <form
          ref="form"
          v-model="valid"
          autocomplete="off">
          <div class="container">
            <div class="row">
              <div class="col">
                <select v-model="programa.orgao" class="custom-select">
                  <option value="">Orgão</option>
                  <option v-for='value in orgaos' :value='value.id'>{{value.nome}}</option>
                </select>
              </div>
              <div class="col">
                <select v-model="programa.banca" class="custom-select" :disabled="disabledBanca">
                  <option v-for='value in bancas' :value='value.id'>{{value.nome}}</option>
                </select>
              </div>
              <div class="col">
                <button type="submit" class="btn btn-primary" @click="cadastrarPrograma($event)">
                  Criar programa de estudo
                </button>
              </div>
            </div>
          </div>
        </form>
      </blockquote>
    </div>
    <ul>
      <div v-for="arv in programas[0]">
        <span
        v-for="q in arv">{{q.nome}}</span>
<!--        <tree :item="q.assuntos"></tree>-->
      </div>
    </ul>

  </div>
</template>
<script>
  import {mapGetters, mapActions} from 'vuex';
  import Tree from "./components/Tree";

  export default {
    name: 'Lista',
    components: {Tree},
    data() {
      return {
        messageSucess: false,
        disabledBanca: true,
        valid: false,
        programa: {
          orgao: "",
          banca: ""
        },
        arvore: [],
      };
    },
    computed: {
      ...mapGetters({
        programas: 'pergunta/programas',
        bancas: 'pergunta/bancas',
        orgaos: 'pergunta/orgaos',
      }),
    },
    watch: {
      "programa.orgao": function (idOrgao) {
        this.disabledBanca = idOrgao === '';
        this.buscarBanca(idOrgao)
      },
    },
    mounted() {
      this.buscarOrgaosAction();
    },
    methods: {
      ...mapActions({
        buscarBancasAction: 'pergunta/buscarBancasAction',
        buscarOrgaosAction: 'pergunta/buscarOrgaosAction',
        cadastrarProgramaAction: 'pergunta/cadastrarProgramaAction',
      }),
      cadastrarPrograma() {
        this.cadastrarProgramaAction({idOrgao: this.programa.orgao, idBanca: this.programa.banca})
          .then(() => {
            this.messageSucess = true;
            setTimeout(() => this.messageSucess = false, 2800);
          })
      },
      buscarBanca(idOrgao) {
        this.buscarBancasAction(idOrgao)
          .then((response) => {
            this.bancas = response.data;
          })
      }
    },
  };
</script>
