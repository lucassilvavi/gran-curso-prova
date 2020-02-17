<template>
  <div class="alert alert-primary" v-if="value" role="alert">
    {{message}}
  </div>
</template>
<script>
  export default {
    name: 'Message',
    props: {
      message: String,
      time: Number,
      type: String,
      value:{
        type: Boolean,
        default: false
      }
    },
    data: function () {
      return {
        value: false,
      }
    },
  };
</script>
