<template>
      <div id="api">
        わからん
</div>
</template>

<script>
export default {
   el: "#api",
  data() {
    return {
      info: null
    };
  },
   mounted () {
    axios
      .get('api/nasu')
      .then(response => (this.info = response))
  }
};
</script>
