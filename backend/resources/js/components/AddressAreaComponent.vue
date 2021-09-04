<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">{{bcinfo.name + ' (' + bcinfo.symbol + ')' }}</div>

          <div class="card-body">
            <input class="address-text-area" type="text" v-bind:value="address.address" />
            <!-- <textarea v-model="address.address" placeholder="add multiple lines"></textarea> -->
          </div>
          <vue-qrcode class="qrcode" v-if="address.address" :value="address.address" :options="option" tag="img" />
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
      type: Object
    },
    bcinfo: {
      type: Object
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
        margin: 5,
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
