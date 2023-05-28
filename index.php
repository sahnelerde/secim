<!DOCTYPE html>
<html>
<head>
  <title>Seçim</title>
  <link rel="icon" type="image/png" href="komunizm.png">
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
  <style>
    .gecis-butonu {
		  background-color: #fff; /* Butonun varsayılan arka plan rengi */
  color: #007bff; /* Butonun varsayılan metin rengi */
      position: absolute;
      top: 20px;
      right: 20px;
    }
	.gecis-butonu:hover {
  background-color: #007bff; /* Üzerine gelindiğinde arka plan rengi */
  color: #fff; /* Üzerine gelindiğinde metin rengi */
}

.gecis-butonu:active {
  background-color: #007bff; /* Tıklanma anındaki arka plan rengi */
  color: #fff; /* Tıklanma anındaki metin rengi */
}
  </style>
</head>
<body>
  <div class="container mt-5">
  <div class="d-flex align-items-center justify-content-center" style="min-height: 100vh;">
    <div class="row">
      <div class="col-md-12" id="solTaraf">
        <?php
		echo "Anka";
        // Sol tarafın PHP kodu buraya yazılacak
		// Hedef web sitesinin URL'si
$url = "https://www.gazeteduvar.com.tr/secim/28-mayis-2023-cumhurbaskanligi-2-tur-secim-sonuclari?provider=anka";

// Sayfa içeriğini al
$content = file_get_contents($url);

// DOMDocument oluştur
$dom = new DOMDocument();
@$dom->loadHTML($content);

// XPath nesnesi oluştur
$xpath = new DOMXPath($dom);

// Belirli bölümleri seçmek için XPath ifadelerini belirtin
$xpathExpressions = array(
    "//link[contains(@href, 'main2.css')]",
    "//div[contains(@class, 'selection__showcase--list')]",
	"//div[contains(@class, 'grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-y-2 text-left lg:text-center lg:divide-x divide-gray-300 py-2 border-b text-xs')]",
	"//div[contains(@class, 'selection__progress bg-chp !h-1')]",
	"//div[@id='selectionCities' and contains(@class, 'overflow-x-auto')]"
);

// XPath ifadelerini kullanarak belirli bölümleri seçin
$selectedElements = array();
foreach ($xpathExpressions as $expression) {
    $elements = $xpath->query($expression);
    foreach ($elements as $element) {
        $selectedElements[] = $element;
    }
}

// Seçilen bölümleri ekrana yazdır
foreach ($selectedElements as $element) {
    echo $dom->saveHTML($element);
}
     
        ?>
      </div>
      <div class="col-md-12" id="sagTaraf" style="display: none;">
        <?php
		echo "Anadolu Ajansı";
        // Sağ tarafın PHP kodu buraya yazılacak
		// Sağ tarafın PHP kodu buraya yazılacak
		// Hedef web sitesinin URL'si
$url = "https://www.gazeteduvar.com.tr/secim/28-mayis-2023-cumhurbaskanligi-2-tur-secim-sonuclari";

// Sayfa içeriğini al
$content = file_get_contents($url);

// DOMDocument oluştur
$dom = new DOMDocument();
@$dom->loadHTML($content);

// XPath nesnesi oluştur
$xpath = new DOMXPath($dom);

// Belirli bölümleri seçmek için XPath ifadelerini belirtin
$xpathExpressions = array(
    "//link[contains(@href, 'main2.css')]",
    "//div[contains(@class, 'selection__showcase--list')]",
	"//div[contains(@class, 'grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-y-2 text-left lg:text-center lg:divide-x divide-gray-300 py-2 border-b text-xs')]",
	"//div[contains(@class, 'selection__progress bg-chp !h-1')]",
	"//div[@id='selectionCities' and contains(@class, 'overflow-x-auto')]"
);

// XPath ifadelerini kullanarak belirli bölümleri seçin
$selectedElements = array();
foreach ($xpathExpressions as $expression) {
    $elements = $xpath->query($expression);
    foreach ($elements as $element) {
        $selectedElements[] = $element;
    }
}

// Seçilen bölümleri ekrana yazdır
foreach ($selectedElements as $element) {
    echo $dom->saveHTML($element);
}
        
        ?>
      </div>
    </div>
    <div class="row mt-3">
      <div class="col-md-12 text-end">
        <button type="button" class="btn btn-primary gecis-butonu" id="gecisYapBtn">
          Geçiş Yap <i class="fa fa-arrow-right"></i>
        </button>
        <button type="button" class="btn btn-primary gecis-butonu" id="geriDonBtn" style="display: none;">
          Geri Dön <i class="fa fa-arrow-left"></i>
        </button>
      </div>
    </div>
  </div>
</div>
  <script>
    document.getElementById("gecisYapBtn").addEventListener("click", function() {
      document.getElementById("solTaraf").style.display = "none";
      document.getElementById("sagTaraf").style.display = "block";
      document.getElementById("gecisYapBtn").style.display = "none";
      document.getElementById("geriDonBtn").style.display = "block";
    });

    document.getElementById("geriDonBtn").addEventListener("click", function() {
      document.getElementById("sagTaraf").style.display = "none";
      document.getElementById("solTaraf").style.display = "block";
      document.getElementById("geriDonBtn").style.display = "none";
      document.getElementById("gecisYapBtn").style.display = "block";
    });
  </script>
</body>
</html>