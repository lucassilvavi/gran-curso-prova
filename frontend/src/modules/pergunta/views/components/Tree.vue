<template>
  <div class="card"
       style="background-color: bisque">
    <li>
      <div
        :class="{bold: isArquivo}"
        @click="abertir">
        {{ item.nome }}
        <span> / Quantidade questão no assunto  - {{item.qt_questao}}</span>
        <div v-for="questao in item.questao">
          {{questao.nome}}
        </div>
        <span v-if="isArquivo">[{{ isOpen ? '-' : '+' }}]</span>
      </div>
      <ul v-show="isOpen" v-if="isArquivo">
        <tree
          class="item"
          v-for="(child, index) in item.filhos"
          :key="index"
          :item="child"
        ></tree>
      </ul>
    </li>
  </div>
</template>
<script>
    export default {
        name: 'Tree',
        props: {
            item: Object
        },
        data: function () {
            return {
                isOpen: false,
                quantidade: 0
            }
        },
        computed: {
            isArquivo: function () {
                return this.item.filhos &&
                    this.item.filhos.length
            }
        },
        methods: {
            abertir: function () {
                if (this.isArquivo) {
                    this.isOpen = !this.isOpen
                }
            },
        }
    };
</script>
<style>

  .item {
    cursor: pointer;
  }

  ul {
    padding-left: 1em;
    line-height: 1.5em;
    list-style-type: dot;
  }
</style>
