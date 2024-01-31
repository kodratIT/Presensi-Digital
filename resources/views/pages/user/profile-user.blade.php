<!DOCTYPE html>
<html lang="en">

<head>
   <title></title>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
   <div id="qrcode"></div>

   <script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>
   <script>
      const idSesionAbsent = 1;
      const data = <?php echo json_encode($data); ?>;
      let tabel = document.getElementById('tabel');

      // Fungsi untuk membuat QR code
      function generateQRCode(text) {
         const qrcode = new QRCode(document.getElementById('qrcode'), text);
      }

      // Contoh penggunaan
      generateQRCode(data.nim + "_" + data.id_nft);
   </script>
</body>

</html>