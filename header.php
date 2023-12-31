

<?php 

$lang ="en" ; 

if(isset($_GET["lang"])){
    $lang  = $_GET["lang"];
}

else  {
    $lang ="en";
}


?>








<!doctype html><html lang="<?php echo $lang ; ?>"><head><meta charset="utf-8"/><link rel="icon" href="./favicon.ico"/><meta name="viewport" content="width=device-width,initial-scale=1"/>
    <meta name="theme-color" content="#000000"/><meta name="description" content="Web site created using create-react-app"/>
    <link rel="apple-touch-icon" href="./logo192.png"/><link rel="manifest" href="./manifest.json"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous"/><title>React App</title><link href="./static/css/main.f5fedcfb.chunk.css" rel="stylesheet">
  <?php 


  include 'meta.php';
?>

    <style>
    body {
      font-family: Arial, sans-serif;
      margin: 20px;
    }

    #map {
      height: 300px;
      width: 100%;
      margin-bottom: 20px;
    }
  </style>



    <div id="map"></div>
  <button onclick="saveLocation()">Save Location</button>

  <script>
    let db;

    document.addEventListener('DOMContentLoaded', () => {
      const request = indexedDB.open('LocationDatabase', 1);

      request.onupgradeneeded = function(event) {
        const db = event.target.result;
        const store = db.createObjectStore('locations', { keyPath: 'id', autoIncrement: true });
        store.createIndex('latitude', 'latitude', { unique: false });
        store.createIndex('longitude', 'longitude', { unique: false });
      };

      request.onsuccess = function(event) {
        db = event.target.result;
      };

      request.onerror = function(event) {
        console.error('Error opening database:', event.target.error);
      };
    });

    function saveLocation() {
      const location = { latitude: 40.7128, longitude: -74.0060 }; // Example data

      const transaction = db.transaction(['locations'], 'readwrite');
      const store = transaction.objectStore('locations');

      const request = store.add(location);

      request.onsuccess = function(event) {
        console.log('Location added to database');
        confirmLocation(location);
      };

      request.onerror = function(event) {
        console.error('Error adding location to database:', event.target.error);
      };
    }

    function confirmLocation(location) {
      const confirmation = confirm(`Location: ${location.latitude}, ${location.longitude}\nDo you want to confirm?`);

      if (confirmation) {
        console.log('User confirmed the location.');
        // Do something with the confirmed location
      } else {
        console.log('User declined the location.');
        // Handle the case where the user declines the location
      }
    }
  </script>



</head>
    
    