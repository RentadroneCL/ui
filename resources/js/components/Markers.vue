<template>
  <div class="w-full mb-4">
    <h3 class="w-full flex flex-row items-center font-medium text-lg text-blue-700 mb-4 p-2 border-b">
      <i class="fas fa-map-marked fa-fw text-blue-200 mr-1"></i> Markers
    </h3>
    <div id="map" class="w-full h-64 rounded-lg"></div>
  </div>
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
  data() {
    return {
      collect: JSON.parse(this.data)
    }
  },
  mounted() {
    const map = this.initializeMap({
      zoom: 16
    });

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    if (this.collect.length > 0) {
      map.setView(this.getGeospatialData()[0], 16);

      this.addMarkers(this.getGeospatialData(), map);
    }

    this.$eventBus.$on('upload-success', (event) => {
      const latlng = event.data.gps.split(',').map(item => Number(item));

      map.setView(latlng, 16);

      this.addNewMarker(latlng, map);
    });
  },
  methods: {
    initializeMap(args = {}) {
      return L.map(document.getElementById('map'), args);
    },
    getGeospatialData() {
      return this.collect.map(item => item.data.gps.split(',').map(item => Number(item)));
    },
    addMarkers(latlng = [], map = undefined) {
      return latlng.map(item => L.marker(item).addTo(map));
    },
    addNewMarker(latlng = [], map = undefined) {
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
