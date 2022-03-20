<template>
  <div id="review">
    <span class="text-red-500">{{ error }}</span>
    <div class="flex justify-center md:justify-start">
      ユーザー評価:
      <button class="good-icon" @click="goodReview">
        <svg
          version="1.1"
          id="_x32_"
          xmlns="http://www.w3.org/2000/svg"
          xmlns:xlink="http://www.w3.org/1999/xlink"
          x="0px"
          y="0px"
          width="512px"
          height="512px"
          viewBox="0 0 512 512"
          style="width: 24px; height: 24px; opacity: 1"
          xml:space="preserve"
        >
          <g>
            <path
              class="st0"
              d="M256.016,0C114.625,0,0,114.625,0,256s114.625,256,256.016,256C397.375,512,512,397.375,512,256
                          S397.375,0,256.016,0z M256.016,450.031c-107,0-194.047-87.063-194.047-194.031c0-37.766,11.031-72.953,29.781-102.781h328.5
                          C439,183.047,450,218.234,450,256C450,362.969,362.969,450.031,256.016,450.031z"
              style="fill: rgb(255, 170, 243)"
            ></path>
            <path
              class="st0"
              d="M221.266,261.375c-5.328-11.313-13.172-21.031-22.984-28.031c-9.781-6.984-21.672-11.188-34.344-11.188
                          c-12.656,0-24.547,4.203-34.344,11.188c-9.813,7-17.656,16.719-22.984,28.063l23.656,11.125c3.578-7.594,8.688-13.75,14.5-17.875
                          c5.859-4.156,12.266-6.344,19.172-6.344c6.922,0,13.328,2.188,19.156,6.344c5.813,4.125,10.938,10.281,14.531,17.875
                          L221.266,261.375z"
              style="fill: rgb(255, 170, 243)"
            ></path>
            <path
              class="st0"
              d="M405.375,261.375c-5.344-11.313-13.188-21.031-23-28.031c-9.781-6.984-21.656-11.188-34.313-11.188
                          s-24.563,4.203-34.344,11.188c-9.813,7-17.656,16.719-23,28.063l23.656,11.125c3.563-7.594,8.688-13.75,14.5-17.875
                          c5.844-4.156,12.266-6.344,19.188-6.344c6.906,0,13.313,2.188,19.141,6.344c5.828,4.125,10.953,10.281,14.531,17.875
                          L405.375,261.375z"
              style="fill: rgb(255, 170, 243)"
            ></path>
            <path
              class="st0"
              d="M167.781,344.844c17.234,30.844,50.281,51.813,88.203,51.813c37.953,0,71.016-20.969,88.234-51.828
                          l-26.609-14.875c-12.109,21.609-35.109,36.203-61.625,36.203c-26.484,0-49.469-14.594-61.594-36.219L167.781,344.844z"
              style="fill: rgb(255, 170, 243)"
            ></path>
          </g>
        </svg>
      </button>
      <p>{{ goodCount }}</p>
      <button class="normal-icon" @click="normalReview">
        <svg
          version="1.1"
          id="_x32_"
          xmlns="http://www.w3.org/2000/svg"
          xmlns:xlink="http://www.w3.org/1999/xlink"
          x="0px"
          y="0px"
          width="512px"
          height="512px"
          viewBox="0 0 512 512"
          style="width: 24px; height: 24px; opacity: 1"
          xml:space="preserve"
        >
          <g>
            <path
              class="st0"
              d="M256.016,0C114.625,0,0,114.625,0,256s114.625,256,256.016,256C397.375,512,512,397.375,512,256
                          S397.375,0,256.016,0z M256.016,450.031c-106.984,0-194.047-87.063-194.047-194.031c0-37.766,11.031-72.953,29.797-102.781H420.25
                          C439,183.047,450,218.234,450,256C450,362.969,362.969,450.031,256.016,450.031z"
              style="fill: rgb(184, 221, 24)"
            ></path>
            <path
              class="st0"
              d="M164.094,214.547c-19,0-34.406,15.422-34.406,34.406c0,19.047,15.406,34.453,34.406,34.453
                          c19.031,0,34.438-15.406,34.438-34.453C198.531,229.969,183.125,214.547,164.094,214.547z"
              style="fill: rgb(184, 221, 24)"
            ></path>
            <path
              class="st0"
              d="M350.313,214.547c-19.031,0-34.469,15.422-34.469,34.406c0,19.047,15.438,34.453,34.469,34.453
                          c19,0,34.406-15.406,34.406-34.453C384.719,229.969,369.313,214.547,350.313,214.547z"
              style="fill: rgb(184, 221, 24)"
            ></path>
            <rect
              x="188.875"
              y="342.594"
              class="st0"
              width="139.875"
              height="32.313"
              style="fill: rgb(184, 221, 24)"
            ></rect>
          </g>
        </svg>
      </button>
      {{ normalCount }}
      <button class="bad-icon" @click="badReview">
        <svg
          version="1.1"
          id="_x32_"
          xmlns="http://www.w3.org/2000/svg"
          xmlns:xlink="http://www.w3.org/1999/xlink"
          x="0px"
          y="0px"
          width="512px"
          height="512px"
          viewBox="0 0 512 512"
          style="width: 24px; height: 24px; opacity: 1"
          xml:space="preserve"
        >
          <g>
            <rect
              x="186.063"
              y="342.594"
              class="st0"
              width="139.875"
              height="32.313"
              style="fill: rgb(162, 142, 247)"
            ></rect>
            <path
              class="st0"
              d="M256.016,0C114.625,0,0,114.625,0,256s114.625,256,256.016,256C397.375,512,512,397.375,512,256
                            S397.375,0,256.016,0z M256.016,450.031c-107,0-194.047-87.063-194.047-194.031c0-37.766,11.031-72.953,29.781-102.781h328.5
                            C439,183.047,450,218.234,450,256C450,362.969,362.969,450.031,256.016,450.031z"
              style="fill: rgb(162, 142, 247)"
            ></path>
            <path
              class="st0"
              d="M290.719,240.813c5.344,11.313,13.188,21.031,23,28.031c9.781,7,21.656,11.203,34.313,11.188
                            c12.688,0.016,24.563-4.188,34.344-11.188c9.813-7,17.672-16.719,23-28.031l-23.656-11.141c-3.563,7.609-8.688,13.734-14.5,17.875
                            c-5.844,4.141-12.25,6.328-19.188,6.344c-6.906-0.016-13.313-2.203-19.156-6.344c-5.813-4.141-10.922-10.297-14.5-17.891
                            L290.719,240.813z"
              style="fill: rgb(162, 142, 247)"
            ></path>
            <path
              class="st0"
              d="M106.625,240.813c5.344,11.313,13.172,21.031,22.984,28.031c9.781,7,21.672,11.203,34.328,11.188
                            c12.656,0.016,24.547-4.188,34.328-11.188c9.828-7,17.672-16.719,23.016-28.031l-23.656-11.141
                            c-3.578,7.578-8.703,13.734-14.5,17.875c-5.859,4.141-12.281,6.328-19.188,6.344c-6.906-0.016-13.313-2.203-19.156-6.344
                            c-5.813-4.141-10.938-10.297-14.531-17.891L106.625,240.813z"
              style="fill: rgb(162, 142, 247)"
            ></path>
          </g>
        </svg>
      </button>
      {{ badCount }}
    </div>
  </div>
  <p v-html="text" v-show="load" id="load"></p>
</template>
<style>
#load img {
	position: fixed;
	top: 45%;
	left: 45%;
}
</style>


<script>
export default {
  el: "#review",
  data() {
    return {
      goodCount: this.good,
      normalCount: this.normal,
      badCount: this.bad,
      error: "",
      text:'<img src="/images/loading.gif">',
      load:false
    };
  },
  props: ["good", "normal", "bad", "userid"], //直接変更してはいけない　先に定義名を変えてデータに渡す
  methods: {
    goodReview() {
      axios
        .get("/sanctum/csrf-cookie", {
          withCredentials: true,
        })
        .then((response) => {
          (this.load=true)
          axios
            .post(`/api/reviews/good`, {
              userid: this.userid,
              withCredentials: true,
            })
            .then((response) => {
              this.goodCount = response.data.good;
              this.normalCount = response.data.normal;
              this.badCount = response.data.bad;
              this.load=false;
            })
            .catch(
              (response) => (this.error = "そのユーザーは既に評価しています",this.load=false)
            );
        });
    },
    normalReview() {
      axios
        .get("/sanctum/csrf-cookie", {
          withCredentials: true,
        })
        .then((response) => {
          (this.load=true)
          axios
            .post(`/api/reviews/normal`, {
              userid: this.userid,
              withCredentials: true,
            })
            .then((response) => {
              this.goodCount = response.data.good;
              this.normalCount = response.data.normal;
              this.badCount = response.data.bad;
              this.load=false;
            })
            .catch(
              (response) => (this.error = "そのユーザーは既に評価しています",this.load=false)
            );
        });
    },
    badReview() {
      axios
        .get("/sanctum/csrf-cookie", {
          withCredentials: true,
        })
        .then((response) => {
          (this.load=true)
          axios
            .post(`/api/reviews/bad`, {
              userid: this.userid,
              withCredentials: true,
            })
            .then((response) => {
              this.goodCount = response.data.good;
              this.normalCount = response.data.normal;
              this.badCount = response.data.bad;
              this.load=true;
            })
            .catch(
              (response) => (this.error = "そのユーザーは既に評価しています",
              this.load=false)
            );
        });
    },
  },
};
</script>