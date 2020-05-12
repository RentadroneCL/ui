<template>
  <div class="w-full overflow-hidden bg-white mx-1 my-2 rounded border">
    <div class="w-full flex flex-col lg:flex-row rounded-lg">
      <img class="w-64 h-64" :src="item.public_url" :alt="item.name">
      <div class="w-full">
        <map-component :data="JSON.stringify([item])"></map-component>
      </div>
    </div>
    <div class="w-full flex flex-col lg:flex-row justify-start">
      <ul class="w-full lg:w-1/3 tracking-wider text-sm text-gray-600 flex flex-col items-center justify-start p-4 border-t">
        <li class="w-full py-1">Title: <span class="text-gray-700">{{ item.name }}</span></li>
        <li class="w-full py-1">Type: <span class="text-gray-700">{{ item.mime_type }}</span></li>
        <li class="w-full py-1">Size: <span class="text-gray-700">{{ item.size }} KB</span></li>
        <li class="w-full py-1">Public URL: <a class="hover:underline text-blue-500" :href="item.public_url" target="_blank">Click Here</a></li>
        <li class="w-full py-1">Created At: <span class="text-gray-700">{{ item.created_at }}</span></li>
      </ul>
      <div class="w-full h-full lg:w-2/3 flex flex-col items-center justify-start p-4 border-t">
        <h3 class="w-full tracking-wider font-medium text-lg text-gray-700 mb-1">Raw data</h3>
        <pre class="flex w-full h-48 overflow-auto rounded">
          <code class="javascript">
            {{ item.raw_data }}
          </code>
        </pre>
      </div>
    </div>
  </div>
</template>

<script>
import MapComponent from './MapComponent'
import hljs from 'highlight.js/lib/core';
import javascript from 'highlight.js/lib/languages/javascript';

export default {
  mounted() {
    hljs.registerLanguage('javascript', javascript);
    hljs.initHighlightingOnLoad();
  },
  props: ['data'],
  data() {
    return {
      item: JSON.parse(this.data)
    }
  },
  components: {
    MapComponent
  }
}
</script>

<style scoped>
@import '~highlight.js/styles/darcula.css';
</style>
