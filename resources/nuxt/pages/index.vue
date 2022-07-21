<template>
  <div>
    <div
      class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom"
    >
      <h1>Dashboard</h1>
    </div>
    <div class="block mt-4 fst-italic">
      Bentornato <span class="fw-bold">{{ $auth.user.name }}</span>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {};
  },
};
</script>
