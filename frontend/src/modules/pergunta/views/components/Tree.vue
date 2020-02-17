<template>
  <div class="container">
    <div class="row">
      <div class="col">
        <li v-for="assuntos in item">
          <div
            @click="toggle(assuntos)"
            @dblclick="makeFolder(assuntos)"
          >
            {{assuntos.nome}}
            <span v-if="isFolder(assuntos)">[{{ isOpen ? '-' : '+' }}]</span>
          </div>
          <ul v-show="isOpen" v-if="isFolder(assuntos)">
            <tree
              :item="assuntos.filhos"
              @make-folder="$emit('make-folder', $event)"
            ></tree>
          </ul>
        </li>
      </div>
    </div>
  </div>
</template>
<script>
  export default {
    name: 'Tree',
    props: {
      item: ''
    },
    data: function () {
      return {
        isOpen: false
      }
    },
    methods: {
      isFolder: function (e) {
        return e.filhos &&
          e.filhos.length

      },
      toggle: function (e) {
        if (this.isFolder(e)) {
          this.isOpen = !this.isOpen
        }
      },
      makeFolder: function (e) {
        if (!this.isFolder(e)) {
          this.$emit('make-folder', this.item)
          this.isOpen = true
        }
      }
    }
  };
</script>
<style>
  body {
    font-family: Menlo, Consolas, monospace;
    color: #444;
  }
</style>
