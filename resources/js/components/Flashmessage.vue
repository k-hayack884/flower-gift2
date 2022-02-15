<template>
  <div>
    <h1>フラッシュメッセージ跡地</h1>
  </div>
</template>

<script>
export default {
  el: "#flash",
  props: ["flashmessage"],
  mounted() {
    console.log("Component mounted.");
  },
};
</script>
