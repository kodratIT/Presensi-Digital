<!DOCTYPE html>
<html lang="en">

<head>
   <title>Absent user</title>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <style>
      .scan {
         width: 400px;
      }

      .container {
         display: flex;
      }

      .main {
         flex: 1;
         /* Membuat div ini mengambil sisa ruang secara otomatis */
         margin-right: 10px;
         /* Jarak antara div */
      }

      #reader__scan_region {
         transform: scaleX(-1);
         /* Pencerminan horizontal */
      }

      #scanButton {
         background-color: #3498db;
         /* Warna biru */
         color: #fff;
         /* Warna teks putih */
      }
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
         </table>
      </div>
      <div class="scan">
         <input type="text" name="nft" id="nftInput" value="" class="none">
         <hr>
         <div id="reader" width="600px"></div>
      </div>
   </div>

   <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>

   <script>
      const idSesionAbsent = 101;
      let tabel = document.getElementById('tabel');

      function inputAbsent(input, code) {
         let newRow = document.createElement('tr');

         // Membuat elemen <td> pertama dengan teks 'scan'
         let td1 = document.createElement('td');
         td1.appendChild(document.createTextNode(input));

         // Membuat elemen <td> kedua dengan teks '123'
         let td2 = document.createElement('td');
         td2.appendChild(document.createTextNode(code));

         newRow.appendChild(td1);
         newRow.appendChild(td2);

         // Menambahkan elemen <tr> ke dalam elemen <tbody> tabel
         tabel.querySelector('tbody').appendChild(newRow);
      }
   </script>

   <script>
      function onScanSuccess(decodedText, decodedResult) {
         inputAbsent("scan qr", decodedText);
      }
      function onScanFailure(error) {
      }

      let html5QrcodeScanner = new Html5QrcodeScanner(
         "reader",
         { fps: 10, qrbox: { width: 250, height: 250 } },
         false
      );
      html5QrcodeScanner.render(onScanSuccess, onScanFailure);
   </script>

   <script>
      // Dapatkan elemen input
      const nftInput = document.getElementById('nftInput');
      let previousInputValue = '';
      nftInput.addEventListener('input', function () {
         // Mendapatkan nilai input saat ini
         const currentInputValue = nftInput.value;
         setTimeout(function () {
            if (currentInputValue === nftInput.value && currentInputValue !== previousInputValue) {
               inputAbsent('nft', currentInputValue);
               nftInput.value = '';
            }
         }, 100);
      });
   </script>
</body>

</html>