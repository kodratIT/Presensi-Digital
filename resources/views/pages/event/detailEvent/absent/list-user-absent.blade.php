<!DOCTYPE html>
<html lang="en">

<head>
   <title>Absent user</title>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <style>
   .container {
      display: flex;
   }

   .main {
      flex: 1;
      /* Membuat div ini mengambil sisa ruang secara otomatis */
      margin-right: 10px;
      /* Jarak antara div */
   }
   </style>
   <style>
   .scan {
      width: 400px;
   }

   #reader__scan_region {
      transform: scaleX(-1);
   }

   #input-rfid {
      opacity: 0;
   }

   .
   </style>
</head>

<body>
   <h2>Tabel absent</h2>
   <p>code absensi : 101</p>


   <div class="container">
      <div class="main">
         <table id="tabel">
            <tr>
               <th>input</th>
               <th>data</th>
            </tr>
            <tbody id="tabel-body"></tbody>
         </table>
      </div>
      <div class="scan">
         <input type="text" name="nft" id="input-rfid" value="" autofocus>
         <hr>
         <div id="reader" width="600px"></div>
      </div>
   </div>

   <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>

   <script>
   const idSesionAbsent = 1;
   const tabelBody = document.getElementById('tabel-body');
   let dataabsent = <?php echo json_encode($dataAbsent) ?>;
   dataabsent = dataabsent.absent;
   loadAbsentData();

   function inputAbsent(input, code) {
      // Data yang akan dikirim ke API
      fetch('/api/absent/input', {
            method: 'POST',
            headers: {
               'Content-Type': 'application/json',
               // Tambahkan header lain yang diperlukan, seperti token otorisasi jika diperlukan
            },
            body: JSON.stringify({
               tipe: input,
               kode: code,
               sesion: idSesionAbsent
            })
         })
         .then(response => response.json())
         .then(data => {
            if (data.success) {
               addToTable(input, code);
               console.log('Data berhasil diterima:', data.message);
               console.log('user : ', data.userData);
               console.log('absent : ', data.absentData);
               dataabsent = data.absentData;
               loadAbsentData()
            } else {
               console.error('Gagal mengirim data:', data.message);
               // alert(data.message)
            }
         })
         .catch(error => console.error('Error:', error));
   }

   function addToTable(data) {
      let newRow = document.createElement('tr');
      let td1 = document.createElement('td');
      td1.appendChild(document.createTextNode(data.tipe));
      let td2 = document.createElement('td');
      td2.appendChild(document.createTextNode(data.full_name));
      newRow.appendChild(td1);
      newRow.appendChild(td2);
      tabelBody.appendChild(newRow); // Menggunakan tabelBody sebagai target
   }

   function loadAbsentData() {
      tabelBody.innerHTML = "";
      dataabsent.forEach(userAbsent => {
         addToTable(userAbsent);
      });
   }
   </script>



   <script>
   function onScanSuccess(decodedText, decodedResult) {
      inputAbsent("qr", decodedText);
   }

   function onScanFailure(error) {}

   let html5QrcodeScanner = new Html5QrcodeScanner(
      "reader", {
         fps: 10,
         qrbox: {
            width: 250,
            height: 250
         }
      },
      false
   );
   html5QrcodeScanner.render(onScanSuccess, onScanFailure);
   </script>

   <script>
   const rfidInput = document.getElementById('input-rfid');
   let lastRfidValue = "";
   // Auto focus ke input RFID setiap 100 milidetik
   setInterval(function() {
      rfidInput.focus();
   }, 100);

   rfidInput.addEventListener('change', function() {
      if (rfidInput.value !== lastRfidValue) {
         inputAbsent("nft", rfidInput.value);
         lastRfidValue = "";
      }
      rfidInput.value = "";
   });
   </script>


</body>

</html>