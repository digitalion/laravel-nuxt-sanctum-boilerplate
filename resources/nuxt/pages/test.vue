<template>
  <div>
    <div
      class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom"
    >
      <h1 class="h2">Test</h1>
    </div>
    <div class="mt-2 d-flex flex-column w-25">
      <button class="btn btn-primary" @click="toastSuccess">
        Test Toast Success Message
      </button>
      <button class="btn btn-primary mt-2" @click="toastError">
        Test Toast Error Message
      </button>
    </div>
  </div>
</template>

<script>
export default {
  methods: {
    toastSuccess() {
      this.$toast.success("This is a success message!");
    },
    toastError() {
      this.$toast.error("This is a error message!");
    },
  },
};
</script>
