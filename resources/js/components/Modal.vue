<template>
  <!-- template for the modal component -->

  <span id="app">
    <button v-on:click="openModal" class="absolute top-0 p-48"></button>

    <div id="overlay" v-show="showContent" class="z-20 flex justify-center">
      <div id="content" class="md:absolute top-40">
        <div class="flex justify-end">
        <button
          v-on:click="closeModal"
          class="ml-30 z-30 w-8 h-8"
        >
          <svg
            xmlns="http://www.w3.org/2000/svg"
            className="h-3 w-3"
            fill="red"
            viewBox="0 0 24 24"
            stroke="white"
            text-anchor="w-8 h-8"
          >
            <path
              strokeLinecap="round"
              strokeLinejoin="round"
              strokeWidth="{2}"
              d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"
            />
          </svg>
        </button>
</div>
        <section class="text-gray-600 body-font">
          <div
            class="relative mx-auto px-5 py-12"
            style="background-image: url('/images/back_img.jpg')"
          ></div>
          <div
            class="
              container
              mx-auto
              flex
              px-5
              py-4
              items-center
              justify-center
              flex-col
            "
          >
            <h1
              class="
                title-font
                sm:text-xl
                text-2xl
                mb-4
                font-medium
                text-gray-900
              "
            >
              利用のためにログインしてください
            </h1>
            <div class="flex justify-center flex-col md:flex-row">
              <a
                href="/login"
                class="
                  text-center text-white
                  bg-indigo-500
                  border-0
                  py-2
                  px-6
                  mb-4
                  focus:outline-none
                  hover:bg-indigo-600
                  rounded
                  text-lg
                  md:mx-4
                "
                >ログイン</a
              >
              <a
                href="/register"
                class="
                  text-center text-gray-700
                  bg-gray-300
                  border-0
                  py-2
                  px-6
                  mb-4
                  focus:outline-none
                  hover:bg-gray-200
                  rounded
                  text-lg
                  md:mx-4
                "
                >新規登録</a
              >
            </div>
          </div>
        </section>
      </div>
    </div>
  </span>
</template>
<style>
#overlay {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5);
}
#content {
  width: 75%;
  padding: 1em;
  background: #fff;
}
</style>
<script>
export default {
  el: "#app",
  data() {
    return {
      showContent: false,
    };
  },

  methods: {
    openModal: function () {
      this.showContent = true;
    },
    closeModal: function () {
      this.showContent = false;
    },
  },
};
</script>
