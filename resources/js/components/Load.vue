<template>
  <div id="load">
      <div v-if="show"><img src="/images/loading.gif"></div>
  </div>
</template>

<script>
 
export default {
    el: "#load",
  props: {
    text: {
      default: "ロード中...",
      type: String,
    },
    show: {
      default: false,
      type: Boolean,
    },
  },
  
  template: '<div v-if="show"><img src="images/loading.gif">&nbsp;<span v-text="text"></span></div>'
};
</script>