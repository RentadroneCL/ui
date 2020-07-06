<template>
  <div class="w-full h-64 rounded-lg"></div>
</template>

<script>
import L from 'leaflet';
import 'leaflet.markercluster';

export default {
  props: {
    data: {
      type: String,
      required: true
    }
  },
  mounted() {
    const map = this.initializeMap({
      center: this.getGeospatialData(),
      zoom: 18
    });

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    this.addMarker(this.getGeospatialData(), map);
  },
  methods: {
    initializeMap(args = {}) {
      return L.map(this.$el, args);
    },
    getGeospatialData() {
      return this.data.split(',').map(item => Number(item));
    },
    addMarker(latlng = [], map = undefined) {
      return L.marker(latlng).addTo(map);
    }
  }
}
</script>

<style scoped>
@import "~leaflet/dist/leaflet.css";
@import "~leaflet.markercluster/dist/MarkerCluster.css";
@import "~leaflet.markercluster/dist/MarkerCluster.Default.css";
</style>
