<template>
  <div class="card">
    <div class="card-header">
      Programa de estudos
    </div>
    <div class="card-body">
      <div class="alert alert-success" v-if="messageSucess" role="alert">
        Programa de estudos criado com sucesso !
      </div>
      <div style="color: lightcoral">
        <span v-if="errors.length">
          <b>Por favor, selecione os seguinte(s) campo(s):</b>
        <ul>
          <li v-for="error in errors">{{ error }}</li>
        </ul>
        </span>
      </div>
      <blockquote class="blockquote mb-0">
        <form
          ref="form"
          autocomplete="off">
          <div class="container">
            <div class="row">
              <div class="col">
                <select v-model="programa.orgao" class="custom-select">
                  <option value="">Orgão</option>
                  <option v-for='value in orgaos' :value='value'>{{value.nome}}</option>
                </select>
              </div>
              <div class="col">
                <select v-model="programa.banca" class="custom-select" :disabled="disabledBanca">
                  <option v-for='value in bancas' :value='value'>{{value.nome}}</option>
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
      <div v-for="dados in programas">
        <div class="card">
          <span>Orgão: {{dados.orgao.nome}} - Banca: {{dados.banca.nome}}</span>
          <div v-for="questao in dados.questoes">
            <span>{{questao[0].nome}}</span>
            <div v-for="assuntos in questao[0].assuntos">
              <tree :item="assuntos"></tree>
            </div>
          </div>
        </div>
        <br>
      </div>
    </ul>
  </div>
</template>
<script>
  import {mapGetters, mapActions} from 'vuex';
  import Tree from "./components/Tree";

  const dadosFormulario = {
    orgao: "",
    banca: ""
  }
  export default {
    name: 'Lista',
    components: {Tree},
    data() {
      return {
        messageSucess: false,
        disabledBanca: true,
        errors: [],
        programa: Object.assign({}, dadosFormulario),
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
      "programa.orgao": function (orgao) {
        this.disabledBanca = orgao.id === '';
        this.buscarBanca(orgao.id)
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
        if (!this.validaSelects(this.programa)) {
          return false;
        }
        this.cadastrarProgramaAction(this.programa)
          .then(() => {
            this.messageSucess = true;
            setTimeout(() => this.messageSucess = false, 2800);
            this.programa = Object.assign({}, dadosFormulario);
          })
      },
      buscarBanca(idOrgao) {
        this.buscarBancasAction(idOrgao)
          .then((response) => {
            this.bancas = response.data;
          })
      },
      validaSelects: function (e) {
        if (e.banca && e.orgao) {
          this.errors = [];
          return true;
        }

        if (!e.banca) {
          this.errors.push(`O banca é obrigatório.`);
        }
        if (!e.orgao) {
          this.errors.push('O orgão é obrigatório.');
        }
      }
    },
  };
</script>
