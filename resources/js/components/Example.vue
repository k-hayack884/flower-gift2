<template>
 <div class="container">
        <div class="row justify-content-center mt-1">
            <div class="col-md-12">
                <div>
                    <button>
                        いいね解除
                    </button>
                    <button>
                        いいね
                    </button>
                    <p>いいね数：</p>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
         el: "#api",
         data() {
    return {
     nasu: []
    }
    },
    fetchTodos: function(){ //←axios.get で TODO リストを取得しています
      axios.get('/api/nasu').then((res)=>{
        this.nasu = res.data //← 取得した TODO リストを todos に格納
      })
    },
    created() { //← インスタンス生成時に fetchTodos()を実行したいので、created フックに登録します。
    this.fetchTodos()
  },
    }
</script>            