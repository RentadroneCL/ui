<template>
  <div class="w-full h-64 rounded-lg"></div>
</template>

<script>
import L from 'leaflet';
import 'leaflet.markercluster';

export default {
  mounted() {
    const map = this.initializeMap({
      center: this.getGeospatialData()[0],
      zoom: 16
    });

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    this.addMarker(this.getGeospatialData(), map);
  },
  props: ['data'],
  data() {
    return {
      collect: JSON.parse(this.data)
    }
  },
  methods: {
    initializeMap(args = {}) {
      return L.map(this.$el, args);
    },
    getGeospatialData() {
      return this.collect.map(item => item.data.gps.split(',').map(item => Number(item)));
    },
    addMarker(latlng = [], map = undefined) {
      return latlng.map(item => L.marker(item).addTo(map));
    }
  }
}
</script>

<style scoped>
@import "~leaflet/dist/leaflet.css";
@import "~leaflet.markercluster/dist/MarkerCluster.css";
@import "~leaflet.markercluster/dist/MarkerCluster.Default.css";
</style>
