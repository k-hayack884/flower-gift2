<template>
  <div v-if="favo">
    <button @click="postFavo" class="pt-2">
      <svg
        xmlns="http://www.w3.org/2000/svg"
        class="h-8 w-8"
        fill="none"
        viewBox="0 0 24 24"
        stroke="currentColor"
      >
        <path
          stroke-linecap="round"
          stroke-linejoin="round"
          stroke-width="2"
          d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"
        />
      </svg>
    </button>
  </div>
  <div v-else>
    <button @click="deleteFavo" class="pt-2">
      <svg
        xmlns="http://www.w3.org/2000/svg"
        class="h-8 w-8"
        fill="yellow"
        viewBox="0 0 24 24"
        stroke="gold"
      >
        <path
          stroke-linecap="round"
          stroke-linejoin="round"
          stroke-width="2"
          d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"
        />
      </svg>
    </button>
  </div>
</template>

<script>
export default {
  el: "#favo",
  data() {
    return {
      favo: this.canfavorite, //初期値
      error: "",
    };
  },
  props: ["productid", "canfavorite"],
  methods: {
    postFavo() {
      axios
        .get("http://127.0.0.1:8000/sanctum/csrf-cookie", {
          withCredentials: true,
        })
        .then((response) => {
          axios
            .post(`http://127.0.0.1:8000/api/favorites/add`, {
              productId: this.productid,
              withCredentials: true,
            })
            .then((response) => (this.favo = false))
            .catch((response) => console.error(response.message));
        });
    },
    deleteFavo() {
      axios
        .get("http://127.0.0.1:8000/sanctum/csrf-cookie", {
          withCredentials: true,
        })
        .then((response) => {
          axios
            .post(`http://127.0.0.1:8000/api/favorites/delete`, {
              productId: this.productid,
              withCredentials: true,
            })
            .then((response) => (this.favo = true))
            .catch((response) => console.error(response.message));
        });
    },
  },
};
</script>