<template>
  <header>
    <nav class="navbar navbar-light bg-light">
      <div class="container-fluid">
        <nuxt-link class="navbar-brand" to="/">
          <img
            src="@/assets/Logo.png"
            alt=""
            width="30"
            height="30"
            class="d-inline-block align-top"
          />
          RerykA
        </nuxt-link>
      </div>
    </nav>
  </header>
</template>
    
<script>
export default {
  name: 'Header',
  props: {
    title: {
      type: String,
      required: false,
      default: 'Header',
    },
  },
}
</script>
<style scoped>
header {
  height: 50px;
}
</style>