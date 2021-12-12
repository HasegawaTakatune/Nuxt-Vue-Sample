<template>
  <div>
    <h1>Nuxt</h1>
    <button @click="send('GET')">Axios GET</button>
    <button @click="send('POST')">Axios POST</button>
    <button @click="send('PUT')">Axios PUT</button>
    <button @click="send('DELETE')">Axios DELETE</button>
    <div>{{ response }}</div>
    <div v-html="html"></div>
  </div>
</template>

<script>
export default {
  name: 'App',
  async asyncData({ $axios }) {
    if (process.server) {
      const response = await $axios.get('https://www.yahoo.co.jp')
      return {
        html: response.data,
      }
    }
  },
  data() {
    return {
      response: null,
      html: null,
    }
  },
  methods: {
    async send(method) {
      // CookieからXSRF Token取得
      let csrftoken = null
      let cookies = document.cookie.split(';')
      for (const cookie of cookies) {
        const keyvalue = cookie.split('=')
        if (keyvalue[0].trim() == 'XSRF-TOKEN') {
          csrftoken = keyvalue[1]
          break
        }
      }
      // XSRF Token
      const headers = {
        'X-XSRF-TOKEN': csrftoken,
      }
      // 各メソッド別送信
      if (method == 'GET') {
        const response = await this.$axios.get('/api/get')
        this.response = response.data
      } else if (method == 'POST') {
        const response = await this.$axios.post(
          '/api/add/',
          {},
          { headers: headers }
        )
        this.response = response.data
      } else if (method == 'PUT') {
        const response = await this.$axios.put(
          '/api/edit/',
          {},
          { headers: headers }
        )
        this.response = response.data
      } else if (method == 'DELETE') {
        const response = await this.$axios.delete('/api/remove/', {
          headers: headers,
        })
        this.response = response.data
      }
    },
  },
}
</script>