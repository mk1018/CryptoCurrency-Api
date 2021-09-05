<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">

        <input
          class="col-10"
          type="text"
          v-bind:value="share_code_url"
          readonly
        />
        <button class="col-1" @click="copyToClipboard(share_code_url)" >C</button>

        <input
          v-if="user.screen_name"
          class="col-10"
          type="text"
          v-bind:value="share_name_url"
          @click="copyToClipboard(share_name_url)"
          readonly
        />
        <button v-if="user.screen_name" class="col-1" @click="copyToClipboard(share_name_url)" >C</button>

      </div>
    </div>
  </div>
</template>

<script>
  export default {
    props: {
      user: {
        type: Object
      }
    },
    data() {
      return {
        share_code_url: process.env.MIX_APP_URL + '/publicAddress/' + this.user.user_code,
        share_name_url: process.env.MIX_APP_URL + '/publicAddress/' + this.user.screen_name
      }
    },
    methods: {
      copyToClipboard(text) {
        navigator.clipboard.writeText(text)
        .then(() => {
          console.log("copied!")
        })
        .catch(e => {
          console.error(e)
        })
      }
    }
  }
</script>
