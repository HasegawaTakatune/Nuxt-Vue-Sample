<template>
  <footer class="p-4 w-100 bg-dark text-light d-flex justify-content-between">
    <div class="d-grid">
      <h5>グループ</h5>
      <nuxt-link to="/">グループ概要</nuxt-link>
      <nuxt-link to="/">軌跡</nuxt-link>
      <nuxt-link to="/">メンバー</nuxt-link>
    </div>
    <div>
      <h5>コンテンツ</h5>
      <div class="d-flex">
        <ul>
          <div>ゲーム</div>
          <li>
            <nuxt-link to="/">Game1</nuxt-link>
          </li>
          <li>
            <nuxt-link to="/">Game2</nuxt-link>
          </li>
        </ul>
        <ul>
          VR
          <li>
            <nuxt-link to="/">VR1</nuxt-link>
          </li>
          <li>
            <nuxt-link to="/">VR2</nuxt-link>
          </li>
          <li>
            <nuxt-link to="/">VR3</nuxt-link>
          </li>
        </ul>
        <ul>
          アプリケーション
          <li>
            <nuxt-link to="/">App1</nuxt-link>
          </li>
          <li>
            <nuxt-link to="/">App2</nuxt-link>
          </li>
          <li>
            <nuxt-link to="/">App3</nuxt-link>
          </li>
        </ul>
      </div>
    </div>
    <div>
      <h5>Status</h5>
      <p>Name: RerykA</p>
      <p>Role: programmer</p>
      <p>Mail: test@gmail.com</p>
      <p>Tel : 000-0000-0000</p>
    </div>
  </footer>
</template>
<script>
export default {
  name: 'Footer',
  props: {
    title: {
      type: String,
      required: false,
      default: 'Footer',
    },
  },
}
</script>
<style scoped>
footer {
  width: 100%;
  height: 200px;

  position: absolute;
  bottom: 0;
}

p {
  margin: 0 !important;
}

ul {
  padding-left: 0;
}

li {
  margin-left: 1.5rem;
}

.d-grid {
  display: grid;
}
</style>