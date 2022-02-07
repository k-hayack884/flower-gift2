<template>
<div id="counter">
<button id="increment-button" @click="increment">+ 1</button>
      <button id="decrement-button" @click="decrement">- 1</button>
      <p id="count" v-cloak>{{count}}</p>
    </div>
</template>

<script>
export default {
   el: "#counter",
  data() {
    return {
      count: 0
    };
  },
  methods: {
    increment() {
      this.count++;
    },
    decrement() {
      this.count--;
    }
  }
};
</script>
