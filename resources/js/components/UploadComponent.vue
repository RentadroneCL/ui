<template>
  <button class="w-48 flex items-center justify-center bg-blue-500 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded">
    <i class="fas fa-file-upload fa-fw text-blue-200 mr-1"></i> Upload Files
  </button>
</template>

<script>
import Uppy from '@uppy/core';
import Dashboard from '@uppy/dashboard';
import XHRUpload from '@uppy/xhr-upload';

export default {
  props: ['endpoint', 'csrf', 'target'],
  mounted() {
    new Uppy({
      autoProceed: false,
      allowMultipleUploads: true,
      restrictions: {
        maxFileSize: 5000000,
        allowedFileTypes: ['.jpg', '.jpeg']
      },
      debug: true
    })
    .use(Dashboard, {
      target: this.target,
      trigger: this.$el
    })
    .use(XHRUpload, {
      endpoint: this.endpoint,
      headers: {
        'X-CSRF-TOKEN': this.csrf
      }
    });
  }
}
</script>

<style scoped>
@import "~@uppy/core/dist/style.css";
@import "~@uppy/dashboard/dist/style.css";
</style>
