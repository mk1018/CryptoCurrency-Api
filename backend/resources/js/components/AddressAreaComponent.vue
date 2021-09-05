<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card address-area">

          <div class="card-header d-flex flex-row bd-highlight">
            <img name="cryptImage" v-bind:src="'images/'+address[0].get_block_chain_info.image" />
            <div class="align-self-center">{{address[0].get_block_chain_info.name + ' (' + address[0].get_block_chain_info.symbol + ')' }}</div>
          </div>

          <div v-for="(adr, key) in address" :key="key" class="card-body">

            <form method="post" v-bind:action="'/myAddress/'+adr.id">
              <input type="hidden" name="_method" value="PUT">
              <input type="hidden" name="_token" v-bind:value="csrf">
              <input type="hidden" name="blockchain_code" v-bind:value="adr.get_block_chain_info.code">
              <input class="address-text-area" name="address" type="text" v-bind:value="adr.address" />
              <div  class="col-12 clearfix row">
                <vue-qrcode class="qrcode" v-if="adr.address" :value="adr.address" :options="option" tag="img" />
                <div class="d-flex flex-column bd-highlight mb-3 float-right ">
                  <input class="float-right" v-if="adr.display"  type="checkbox" name="display" data-toggle="toggle" data-on="公開" data-off="非公開" data-onstyle="outline-primary" data-offstyle="outline-secondary" checked>
                  <input class="float-right" v-if="!adr.display" type="checkbox" name="display" data-toggle="toggle" data-on="公開" data-off="非公開" data-onstyle="outline-primary" data-offstyle="outline-secondary">
                  <button type="submit" class="btn btn-primary">更新する</button>
                </div>
              </div>
              <textarea name="note" v-bind:value="adr.note" placeholder="メモ ※秘密鍵やパスフレーズはメモらないで><"></textarea>
            </form>

            <form class="float-right align-self-center" method="post" v-bind:action="'/myAddress/'+address[0].id">
              <input type="hidden" name="_method" value="DELETE">
              <input type="hidden" name="_token" v-bind:value="csrf">
              <button type="submit" class="btn btn-danger">削除</button>
            </form>

          </div>

        </div>
      </div>
    </div>
  </div>
</template>

<script>
import VueQrcode from "@chenfengyuan/vue-qrcode";

export default {
  components: {
    VueQrcode
  },
  props: {
    address: {
      type: Array
    },
    csrf: {
      type: String,
      required: true,
    }
  },
  data() {
    return {
      option: {
        errorCorrectionLevel: "M",
        maskPattern: 0,
        margin: 2,
        scale: 1,
        width: 500,
        color: {
          dark: "#000000FF",
          light: "#FFFFFFFF"
        }
      }
    }
  }
}
</script>
