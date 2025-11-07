<?php include 'includes/header.php'; ?>

<style>
* { margin: 0; padding: 0; box-sizing: border-box; font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif; } body { min-height: 100vh; background: #ffffff; } .mandi-container { background: #ffffff; border-radius: 25px; padding: 40px; width: 100%; max-width: 900px; margin: 40px auto; color: #2d5016; text-align: center; box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08); } h1 { margin-bottom: 10px; font-size: 2.5rem; font-weight: 700; background: linear-gradient(to right, #56ab2f, #a8e063); -webkit-background-clip: text; -webkit-text-fill-color: transparent; } .subtitle { font-size: 1.1rem; margin-bottom: 30px; color: #555; font-weight: 500; } .input-row { display: flex; gap: 15px; margin-bottom: 20px; flex-wrap: wrap; } .input-group { flex: 1; min-width: 200px; } select, input[type="text"] { width: 100%; padding: 14px 20px; border: 2px solid #dde8d5; border-radius: 12px; outline: none; font-size: 1.05rem; transition: border 0.3s, box-shadow 0.3s; background: white; } select:focus, input[type="text"]:focus { border-color: #56ab2f; box-shadow: 0 0 0 3px rgba(86, 171, 47, 0.1); } .btn-primary { width: 100%; padding: 16px 30px; border: none; background: linear-gradient(90deg, #a8e063 0%, #56ab2f 100%); color: white; font-weight: 600; border-radius: 12px; cursor: pointer; transition: 0.3s; font-size: 1.15rem; margin-top: 10px; } .btn-primary:hover { background: linear-gradient(90deg, #56ab2f 0%, #a8e063 100%); transform: translateY(-2px); box-shadow: 0 8px 20px rgba(86, 171, 47, 0.3); } .divider { height: 3px; border-radius: 5px; margin: 30px 0; background: linear-gradient(to right, #56ab2f, #a8e063); } .results-section { display: none; animation: fadeIn 0.6s ease; } @keyframes fadeIn { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } } .loading { text-align: center; padding: 30px; color: #56ab2f; font-size: 1.2rem; font-weight: 600; } .loading::after { content: '...'; animation: dots 1.5s steps(4, end) infinite; } @keyframes dots { 0%, 20% { content: '.'; } 40% { content: '..'; } 60%, 100% { content: '...'; } } .price-card { background: linear-gradient(135deg, #f0f8e8 0%, #e8f5e0 100%); border-radius: 15px; padding: 25px; margin-bottom: 15px; border: 2px solid #a8e063; text-align: left; box-shadow: 0 4px 15px rgba(86, 171, 47, 0.1); } .price-card h3 { color: #2d5016; margin-bottom: 15px; font-size: 1.4rem; } .price-info { text-align: left; margin-top: 15px; } .price-item { background: white; padding: 15px 20px; border-radius: 10px; border-left: 4px solid #66bb6a; margin-bottom: 12px; display: flex; justify-content: space-between; align-items: center; } .price-item .label { font-size: 1.05rem; color: #666; font-weight: 500; } .price-item .value { font-size: 1.3rem; color: #2d5016; font-weight: 700; } .market-name { background: rgba(86, 171, 47, 0.1); padding: 10px 15px; border-radius: 8px; margin-bottom: 15px; font-weight: 600; color: #2d5016; } .error-card { background: #fff3cd; border: 2px solid #ffc107; border-radius: 15px; padding: 25px; text-align: center; } .error-card h3 { color: #856404; margin-bottom: 10px; } .error-card p { color: #856404; } @media (max-width: 768px) { .mandi-container { padding: 25px; } h1 { font-size: 2rem; } .input-row { flex-direction: column; } .btn-primary { min-width: 100%; } }
.loading {
  text-align: center;
  padding: 30px;
  font-size: 1.2rem;
  font-weight: 600;
  color: #56ab2f;
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 10px;
}

.loading .spinner {
  width: 40px;
  height: 40px;
  border: 5px solid #a8e063;
  border-top: 5px solid #56ab2f;
  border-radius: 50%;
  animation: spin 1s linear infinite;
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

</style>

<div class="mandi-container">
  <h1>Mandi Price Info</h1>
  <p class="subtitle">Get real-time market prices for agricultural commodities</p>

  <form method="POST" action="">
    <div class="input-row">
      <div class="input-group">
        <select name="commodity" id="commodity" required>
          <option value="">Select Crop</option>
          <option value="Wheat">Wheat</option>
          <option value="Rice">Rice</option>
          <option value="Maize">Maize</option>
          <option value="Cotton">Cotton</option>
          <option value="Potato">Potato</option>
          <option value="Tomato">Tomato</option>
          <option value="Onion">Onion</option>
          <option value="Sugarcane">Sugarcane</option>
          <option value="Soyabean">Soyabean</option>
          <option value="Groundnut">Groundnut</option>
          <option value="Mustard">Mustard</option>
          <option value="Green Chili">Green Chili</option>
        </select>
      </div>

      <div class="input-group">
        <select name="state" id="state" required>
          <option value="">Select State</option>
          <option value="Andhra Pradesh">Andhra Pradesh</option>
          <option value="Bihar">Bihar</option>
          <option value="Gujarat">Gujarat</option>
          <option value="Haryana">Haryana</option>
          <option value="Karnataka">Karnataka</option>
          <option value="Kerala">Kerala</option>
          <option value="Madhya Pradesh">Madhya Pradesh</option>
          <option value="Maharashtra">Maharashtra</option>
          <option value="Punjab">Punjab</option>
          <option value="Rajasthan">Rajasthan</option>
          <option value="Tamil Nadu">Tamil Nadu</option>
          <option value="Telangana">Telangana</option>
          <option value="Uttar Pradesh">Uttar Pradesh</option>
          <option value="West Bengal">West Bengal</option>
        </select>
      </div>

      <button type="submit" class="btn-primary" style="flex: 0 0 auto; min-width: 150px;">
        Get Price
      </button>
    </div>
  </form>

  <div class="divider"></div>

  <div id="results" class="results-section">
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $commodity = $_POST['commodity'] ?? '';
        $state = $_POST['state'] ?? '';

        if ($commodity) {
           echo '<div class="loading">
        <div class="spinner"></div>
        <div>Fetching market prices...</div>
      </div>';
            echo '<script>document.getElementById("results").style.display = "block";</script>';

            $apiKey = '579b464db66ec23bdd000001cdd3946e44ce4aad7209ff7b23ac571b';
            $apiUrl = 'https://api.data.gov.in/resource/9ef84268-d588-465a-a308-a864a43d0070';

            function fetchMandiData($url) {
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_TIMEOUT, 30);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                $response = curl_exec($ch);
                $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                curl_close($ch);
                if ($response && $httpCode == 200) {
                    return json_decode($response, true)['records'] ?? [];
                }
                return [];
            }

            // First try: filter by both state and commodity
            $params = http_build_query([
                'api-key' => $apiKey,
                'format' => 'json',
                'limit' => 10,
                'filters[state]' => $state,
                'filters[commodity]' => $commodity
            ]);
            $records = fetchMandiData($apiUrl . '?' . $params);

            // If no data, try fetching any state for that commodity
            if (empty($records)) {
                $params = http_build_query([
                    'api-key' => $apiKey,
                    'format' => 'json',
                    'limit' => 10,
                    'filters[commodity]' => $commodity
                ]);
                $records = fetchMandiData($apiUrl . '?' . $params);
                $fallbackMessage = "Data for selected state not found. Showing other available markets for <strong>$commodity</strong>.";
            }

            if (!empty($records)) {
                echo '<script>document.getElementById("results").innerHTML = "";</script>';
                if (!empty($fallbackMessage)) {
                    echo '<script>
                        document.getElementById("results").innerHTML += `<div class="error-card"><p>' . $fallbackMessage . '</p></div>`;
                    </script>';
                }

                foreach ($records as $record) {
                    $minPrice = $record['min_price'] ?? 'N/A';
                    $maxPrice = $record['max_price'] ?? 'N/A';
                    $modalPrice = $record['modal_price'] ?? 'N/A';
                    $marketName = $record['market'] ?? 'Unknown Market';
                    $arrivalDate = $record['arrival_date'] ?? date('d/m/Y');

                    echo '<script>
                        document.getElementById("results").innerHTML += `
                        <div class="price-card">
                            <h3>Market Price for ' . htmlspecialchars($commodity) . '</h3>
                            <div class="market-name">' . htmlspecialchars($marketName) . ' | ' . htmlspecialchars($arrivalDate) . '</div>
                            <div class="price-info">
                                <div class="price-item"><span class="label">Minimum Price</span><span class="value">' . ($minPrice !== "N/A" ? "Rs. $minPrice/quintal" : "N/A") . '</span></div>
                                <div class="price-item"><span class="label">Maximum Price</span><span class="value">' . ($maxPrice !== "N/A" ? "Rs. $maxPrice/quintal" : "N/A") . '</span></div>
                                <div class="price-item"><span class="label">Modal Price</span><span class="value">' . ($modalPrice !== "N/A" ? "Rs. $modalPrice/quintal" : "N/A") . '</span></div>
                            </div>
                        </div>`;
                    </script>';
                }

            } else {
                echo '<script>
                    document.getElementById("results").innerHTML = `
                        <div class="error-card">
                            <h3>No Data Found</h3>
                            <p>No market price data available for <strong>' . htmlspecialchars($commodity) . '</strong>.</p>
                            <p style="margin-top: 10px; font-size: 0.95rem; color: #666;">Try selecting a different crop or state.</p>
                        </div>`;
                </script>';
            }
        }
    }
    ?>
  </div>
</div>

    
