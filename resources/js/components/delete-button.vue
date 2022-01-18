<template>
    <a href="#" v-on:click="deleteItem" class="flex mx-auto  text-white bg-red-500 border-0 py-2 px-8 focus:outline-none hover:bg-red-600 rounded text-lg mx-4"> 削除</a>
</template>

<script>
    export default {

        mounted() {
          
        },
        methods:{
            deleteItem:function(event){
                 if(confirm("おめでとうございます！時限爆弾が止まりました。")){
                     console.log('aheaeh')
                 }
                 ;
            }
        }
    }
</script>
