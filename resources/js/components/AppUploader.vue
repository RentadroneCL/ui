<template>
  <div class="w-full flex flex-col justify-start">
    <Markers v-if="media.length > 0" :media="media"></Markers>
    <div class="flex items-center justify-between mt-2">
      <button id="modal-opener-btn" class="w-auto my-2 md:my-0 inline-flex items-center justify-center p-3 border border-transparent text-base font-semibold rounded-md text-white bg-blue-500 shadow-sm hover:bg-blue-400 focus:outline-none focus:bg-blue-400 transition ease-in-out duration-150">
        <i class="fas fa-upload fa-fw mr-2 text-blue-200"></i> {{ title }}
      </button>
    </div>
    <div id="uppy-dashboard-container" class="w-full flex items-center justify-center"></div>
    <ul  class="block w-full bg-white my-4 rounded-md shadow-md">
      <li v-for="file in media" :key="file.id">
        <Media :file="file"></Media>
      </li>
    </ul>
  </div>
</template>

<script>
import Uppy from '@uppy/core';
import Dashboard from '@uppy/dashboard';
import XHRUpload from '@uppy/xhr-upload';

export default {
  name: 'app-uploader',
  components: {
    Media: () => import('./Media'),
    Markers: () => import('./Markers')
  },
  props: {
    accept: {
      default: null,
      type: String
    },
    action: {
      required: true,
      type: String
    },
    endpoint: {
      required: true,
      type: String
    },
    name: {
      default: 'files[]',
      type: String
    },
    title: {
      default: 'Upload files',
      type: String
    },
    token: {
      required: true,
      type: String
    }
  },
  data() {
    return {
      media: []
    };
  },
  created() {
    this.fetchMedia();
  },
  mounted() {
    const uppy = new Uppy({
      autoProceed: false,
      allowedFileTypes: this.fileTypes,
      allowMultipleUploads: true
    })
    .use(Dashboard, {
      browserBackButtonClose: true,
      target: '#uppy-dashboard-container',
      trigger: '#modal-opener-btn'
    })
    .use(XHRUpload, {
      endpoint: this.action,
      withCredentials: true,
      headers: {
        'X-CSRF-TOKEN': this.token
      }
    });
  },
  computed: {
    fileTypes() {
      return this.accept ? this.accept.split(',') : null;
    }
  },
  methods: {
    async fetchMedia() {
      await axios.get(this.endpoint).then(response => {
        this.media = response.data.data;
      });
    }
  }
}
</script>

<style scoped>
@import "~@uppy/core/dist/style.css";
@import "~@uppy/dashboard/dist/style.css";
</style>
