<template>
  <div class="card">
    <div class="card-header">
      Programa de estudos
    </div>
    <div class="card-body">
      <div class="alert alert-success" v-if="messageSucess" role="alert">
        Programa de estudos criado com sucesso !
      </div>
      <div class="alert alert-danger" v-if="messageErro" role="alert">
        Programa de estudos já criado com essa banca e orgão !
      </div>
      <div style="color: lightcoral">
        <span v-if="errors.length">
          <p>Por favor, selecione os seguinte(s) campo(s):</p>
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
                <select v-model="programa.banca" class="custom-select">
                  <option value="">Banca</option>
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
          <span style="background-color: burlywood">Orgão: {{dados.orgao.nome}} - Banca: {{dados.banca.nome}}</span>
          <div v-for="assunto in dados.assuntos">
            <tree :item="assunto"></tree>
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
    };
    export default {
        name: 'Lista',
        components: {Tree},
        data() {
            return {
                messageSucess: false,
                messageErro: false,
                errors: [],
                programa: Object.assign({}, dadosFormulario),
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
            this.buscarOrgaosAction();
            this.buscarBancasAction();
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
                if (!this.validaProgramaCadastrado()) {
                    return false;
                }
                this.cadastrarProgramaAction(this.programa)
                    .then(() => {
                        this.messageSucess = true;
                        setTimeout(() => this.messageSucess = false, 2800);
                        this.programa = Object.assign({}, dadosFormulario);
                    })
            },
            validaSelects: function (e) {
                if (e.banca && e.orgao) {
                    this.errors = [];
                    return true;
                }
                this.errors = [];
                if (!e.banca) {
                    this.errors.push(`O banca é obrigatório.`);
                }
                if (!e.orgao) {
                    this.errors.push('O orgão é obrigatório.');
                }
            },
            validaProgramaCadastrado() {
                const programa = this.programas.filter((e) => e.banca.id === this.programa.banca.id && e.orgao.id === this.programa.orgao.id)
                this.errors = [];
                if (programa.length > 0) {
                    this.messageErro = true;
                    setTimeout(() => this.messageErro = false, 2800);
                    return false;
                }
                return true;
            },
        },
    };
</script>
