<template>
  <div class="wrapper">
    <Header />
    <nuxt />
    <Footer />
  </div>
</template>
<script>
import Header from '@/components/Header'
import Footer from '@/components/Footer'

export default {
  name: 'default',
  components: {
    Header,
    Footer,
  },
}
</script>
<style scoped>
.wrapper {
  min-height: 100vh;
  position: relative;
  padding-bottom: 200px;
  box-sizing: border-box;
}
</style>