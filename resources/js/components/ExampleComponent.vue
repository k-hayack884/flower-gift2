<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div>{{ message }}</div>
        <div class="card">
          <div class="card-header">Example Component</div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>

export default {
  setup() {
    const message = "Hello Laravel Vue 3"
    return {
      message,
    };
  },

  mounted() {
    console.log("Component mounted.");
  },
};
</script>             