
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
<!DOCTYPE html>
<html>

  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1,maximum-scale=1,user-scalable=no" />
    <title>Esri Leaflet Tutorials: Display a map</title>

    <!-- Load Leaflet from CDN -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js" crossorigin=""></script>

    <!-- Load Esri Leaflet from CDN -->
    <script src="https://unpkg.com/esri-leaflet@3.0.10/dist/esri-leaflet.js"></script>
    <script src="https://unpkg.com/esri-leaflet-vector@4.0.1/dist/esri-leaflet-vector.js"></script>

    <style>
      body {
        margin: 0;
        padding: 0;
      }
      #map {
        position: absolute;
        top: 0;
        bottom: 0;
        right: 0;
        left: 0;
        font-family: Arial, Helvetica, sans-serif;
        font-size: 14px;
        color: #323232;
      }
    </style>
  </head>

  <body>
    <div id="map"></div>

    <script>

      const map = L.map("map", {
        minZoom: 2
      })

      map.setView([34.02, -118.805], 13);

      const apiKey = "AAPK537408d57d5646a18fbed0b31b6cb6d1tEgDG0doG4zbREvbe6U3PadnsrqpIE8QP9qNOR9xwVCXIcc0LmGTn7MMpuigc56S";

      const basemapLayers = {

        Streets: L.esri.Vector.vectorBasemapLayer("ArcGIS:Streets", { apiKey: apiKey }).addTo(map),

        Navigation: L.esri.Vector.vectorBasemapLayer("ArcGIS:Navigation", { apiKey: apiKey }),
        Topographic: L.esri.Vector.vectorBasemapLayer("ArcGIS:Topographic", { apiKey: apiKey }),
        "Light Gray": L.esri.Vector.vectorBasemapLayer("ArcGIS:LightGray", { apiKey: apiKey }),
        "Dark gray": L.esri.Vector.vectorBasemapLayer("ArcGIS:DarkGray", { apiKey: apiKey }),
        "Streets Relief": L.esri.Vector.vectorBasemapLayer("ArcGIS:StreetsRelief", { apiKey: apiKey }),
        Imagery: L.esri.Vector.vectorBasemapLayer("ArcGIS:Imagery", { apiKey: apiKey }),
        ChartedTerritory: L.esri.Vector.vectorBasemapLayer("ArcGIS:ChartedTerritory", { apiKey: apiKey }),
        ColoredPencil: L.esri.Vector.vectorBasemapLayer("ArcGIS:ColoredPencil", { apiKey: apiKey }),
        Nova: L.esri.Vector.vectorBasemapLayer("ArcGIS:Nova", { apiKey: apiKey }),
        Midcentury: L.esri.Vector.vectorBasemapLayer("ArcGIS:Midcentury", { apiKey: apiKey }),
        OSM: L.esri.Vector.vectorBasemapLayer("OSM:Standard", { apiKey: apiKey }),
        "OSM:Streets": L.esri.Vector.vectorBasemapLayer("OSM:Streets", { apiKey: apiKey })
        };

        L.control.layers(basemapLayers, null, { collapsed: false }).addTo(map);

    </script>

  </body>

</html>