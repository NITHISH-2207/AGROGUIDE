<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"> 
    <title>🌱Farmer's Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        body {
            background: linear-gradient(to right,#eaf8ea 0%, #f9fff9 100%);
            font-family: Nunito;
        }

        h1 {
            text-align: center;
            background-color: hsl(87, 83%, 58%) 0%;
            padding: 10px;
            font-family: Nunito;     
        }

        form {
            font-family: Nunito; 
            width: 100%;
            max-width: 500px;
            padding: 30px;
            background-color: rgba(255,255,255,0.95);
            border-radius: 20px;
            box-shadow: 10px 0px 35px #56ab2f;
            margin: 30px auto;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border-radius: 10px;
            border: 1px solid #000;
            box-sizing: border-box;
        }

        legend {
            text-align: center;
            font-size: 35px;
            font-family: Nunito;      
        }

        input[type="submit"],
        input[type="reset"] {
            padding: 10px 20px;
            margin-top: 20px;
            border: none;
            border-radius: 8px;
            background-color: #1abc9c;
            color: white;
            cursor: pointer;
            margin-right: 10px;
        }

        .btn-custom {
            background: linear-gradient(90deg, #a8e063 0%, #56ab2f 100%);
            color: white;
            border: none;
            border-radius: 8px;
            padding: 10px 20px;
            margin-top: 20px;
            margin-right: 10px;
            transition: background 0.3s;
        }
        .btn-custom:hover {
            background: linear-gradient(90deg, #56ab2f 0%, #a8e063 100%);
        }
        input[type="text"] {
            border-radius: 10px;
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #388e3c;
        }
        small {
            color: #888;
        }
        
    </style>
</head>

<body>
    <h1>Agroguide</h1>

    <div class="container">
        <form action="connect.php" method="POST" autocomplete="on">
            <legend>Farmer's Details🧑‍🌾</legend><br>

            <div class="mb-3">
            <label for="fname" class="form-label">Name</label>
            <input type="text" id="fname" name="fname" class="form-control" placeholder="Enter your full name" required>
          </div>

          <!-- State -->
          <div class="mb-3">
            <label for="state" class="form-label">State</label>
            <select id="state" name="state" class="form-select" required>
              <option value="">-- Select State --</option>
              <option value="Tamil Nadu">Tamil Nadu</option>
              <option value="Kerala">Kerala</option>
              <option value="Karnataka">Karnataka</option>
              <option value="Andhra Pradesh">Andhra Pradesh</option>
              <option value="Telangana">Telangana</option>
              <option value="Maharashtra">Maharashtra</option>
              <option value="Punjab">Punjab</option>
              <option value="Uttar Pradesh">Uttar Pradesh</option>
              <option value="Bihar">Bihar</option>
              <option value="Other">Other</option>
            </select>
          </div>

          <!-- District -->
          <div class="mb-3">
            <label for="district" class="form-label">District</label>
            <input type="text" id="district" name="district" class="form-control" placeholder="Enter your district" required>
          </div>

          <!-- Phone -->
          <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="text" id="phone" name="phone" class="form-control" placeholder="Enter mobile number" required>
            <small class="tooltip-text">We may send advisories to this number.</small>
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" id="password" name="password" class="form-control" placeholder="Enter your password" required>
          </div>



          <!-- Soil Type -->
          <div class="mb-3">
            <label class="form-label">Soil Type</label>
            <select name="soil" class="form-select" required>
              <option value="">-- Select Soil --</option>
              <option value="Black Soil">Black Soil</option>
              <option value="Red Soil">Red Soil</option>
              <option value="Sandy Soil">Sandy Soil</option>
              <option value="Loamy Soil">Loamy Soil</option>
              <option value="Clay Soil">Clay Soil</option>
              <option value="Peaty Soil">Peaty Soil</option>
              <option value="Saline Soil">Saline Soil</option>
              <option value="Laterite Soil">Laterite Soil</option>
              <option value="Alluvial Soil">Alluvial Soil</option>
              <option value="Other">Other</option>
            </select>
          </div>

          <!-- Land Area -->
          <div class="mb-3">
            <label class="form-label">Land Area (in acres)</label>
            <input type="number" name="land" class="form-control" placeholder="Enter your land area" required>
          </div>

          <!-- Pesticides -->
          <div class="mb-3">
            <label class="form-label">Pesticides Used</label>
            <select name="pesticides" class="form-select" required>
              <option value="">-- Select Pesticide --</option>
              <option value="Urea">Urea</option>
              <option value="DAP">DAP</option>
              <option value="Neem Oil">Neem Oil</option>
              <option value="Zinc Sulphate">Zinc Sulphate</option>
              <option value="Potash">Potash</option>
              <option value="Glyphosate">Glyphosate</option>
              <option value="Fungicides">Fungicides</option>
              <option value="Herbicides">Herbicides</option>
              <option value="Organic Compost">Organic Compost</option>
              <option value="Other">Other</option>
            </select>
          </div>

            
            <input type="reset" class="btn btn-custom">
            <input type="submit" class="btn btn-custom">
            <a href="index.php" class="btn btn-custom">Back</a>
        </form>
    </div>
</body>
</html>