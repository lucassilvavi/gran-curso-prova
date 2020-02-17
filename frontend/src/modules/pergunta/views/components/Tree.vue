<template>
  <div class="card">
    <li>
      <div
        :class="{bold: isFolder}"
        @click="toggle"
        @dblclick="makeFolder">
        {{ item.nome }}
        <span v-if="isFolder">[{{ isOpen ? '-' : '+' }}]</span>
      </div>
      <ul v-show="isOpen" v-if="isFolder">
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
        isOpen: false
      }
    },
    computed: {
      isFolder: function () {
        return this.item.filhos &&
          this.item.filhos.length
      }
    },
    methods: {
      toggle: function () {
        if (this.isFolder) {
          this.isOpen = !this.isOpen
        }
      },
      makeFolder: function () {
        if (!this.isFolder) {
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
  .item {
    cursor: pointer;
  }
  .bold {
    font-weight: bold;
  }
  ul {
    padding-left: 1em;
    line-height: 1.5em;
    list-style-type: dot;
  }
</style>
