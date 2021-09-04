<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">新しいアドレスを追加する</div>

          <div class="card-body">

            <form action="/myAddress" name="add_address" method="POST">
              <input type="hidden" name="_token" v-bind:value="csrf">
              <select class="form-select"  name="blockchain_code" aria-label="Default select example">
                <option v-for="(chain, key) in blockchains" :key="key" v-bind:value="chain.code">{{chain.name}}</option>
              </select>
              <input class="address-text-area" name="address" type="text" />
              <!-- <textarea v-model="address.address" placeholder="add multiple lines"></textarea> -->
              <button type="submit" class="btn btn-dark">登録する</button>
            </form>

          </div>

        </div>
      </div>
    </div>
  </div>
</template>

<script>

export default {
  props: {
    blockchains: {
      type: Array
    },
    csrf: {
      type: String,
      required: true,
    }
  },
}
</script>
