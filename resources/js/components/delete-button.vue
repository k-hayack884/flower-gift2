<template>
        <a href="#" v-on:click="deleteItem(index)" class="flex mx-auto  text-white bg-red-500 border-0 py-2 px-8 focus:outline-none hover:bg-red-600 rounded text-lg mx-4"> 削除</a>

</template>

<script>
    export default {

        mounted() {
          
        },
          props: {
    user_id: {
      type: String,
      required: true
    }
  },
        methods:{
            deleteItem:function(index){
                 if(confirm("本当に削除してもよろしいですか？")){
                     console.log(index)
                 }
                 ;
            }
        }
    }
</script>
