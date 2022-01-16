<template>
    <div>
        <h1>Sample Component</h1>
    </div>
</template>

<script>
import { defineComponent, ref } from "vue";
    export default defineComponent({
  setup() {
    const message = "Hello World";
    return {
      message
    };
  }
});

</script>
