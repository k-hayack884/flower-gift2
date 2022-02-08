<template>
<!-- template for the modal component -->

  <div id="app">
    <button v-on:click="openModal">Click</button>
  <div v-if="modalVisible" v-on:click="closeModal"  class="l-modal">
    <div class="p-modal">
      <h2 class="p-modal__title">Vueモーダル</h2> 
      <p> Hello World!</p> 

      <!-- モーダルを閉じるボタン -->
      <div v-on:click="closeModal" class="p-modal__btn--close">×</div>
   </div> 
  </div> 
 <div v-if="modalBgVisible" class="l-modal__bg"></div>
  </div>


</template>
<style>
#overlay{
  /*　要素を重ねた時の順番　*/
  z-index:1;

  /*　画面全体を覆う設定　*/
  position:fixed;
  top:0;
  left:0;
  width:100%;
  height:100%;
  background-color:rgba(0,0,0,0.5);

  /*　画面の中央に要素を表示させる設定　*/
  display: flex;
  align-items: center;
  justify-content: center;
  

}
#content{
  z-index:2;
  width:50%;
  padding: 1em;
  background:#fff;
}

</style>
<script>

export default ({
     el: '#app',
data: {
    modalVisible: false, // モーダル
    modalBgVisible: false //モーダル背景色（薄黒）
  },
  methods:{
    showModal: function(){
    this.modalVisible = true
    this.modalBgVisible = true
    },
    closeModal: function(){
      this.modalVisible = false
      this.modalBgVisible = false
    }
  }
})
</script>
