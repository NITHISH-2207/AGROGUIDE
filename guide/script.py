
# Create an interactive Smart Crop Advisory webpage with dynamic crop procedures

html_content = '''<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart Crop Advisory - Interactive Farming Guide</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* ========== Global Styles ========== */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f9f9f9;
        }

        /* Smooth scrolling */
        html {
            scroll-behavior: smooth;
        }

        /* ========== Header / Navigation ========== */
        header {
            background: linear-gradient(135deg, #2d5016 0%, #4a7c2c 100%);
            color: white;
            padding: 1rem 0;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
        }

        .logo {
            display: flex;
            align-items: center;
            font-size: 1.5rem;
            font-weight: bold;
        }

        .logo i {
            margin-right: 10px;
            font-size: 2rem;
            color: #ffd700;
        }

        .nav-menu {
            display: flex;
            list-style: none;
            gap: 2rem;
        }

        .nav-menu a {
            color: white;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s;
        }

        .nav-menu a:hover {
            color: #ffd700;
        }

        /* ========== Hero Section ========== */
        .hero {
            background: linear-gradient(rgba(45, 80, 22, 0.8), rgba(74, 124, 44, 0.8)), 
                        url('https://images.unsplash.com/photo-1625246333195-78d9c38ad449?w=1600') center/cover;
            color: white;
            text-align: center;
            padding: 6rem 2rem;
        }

        .hero h1 {
            font-size: 3rem;
            margin-bottom: 1rem;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
        }

        .hero p {
            font-size: 1.3rem;
            margin-bottom: 2rem;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.5);
        }

        .btn {
            display: inline-block;
            padding: 12px 30px;
            background: #ffd700;
            color: #2d5016;
            text-decoration: none;
            border-radius: 50px;
            font-weight: bold;
            transition: all 0.3s;
            border: none;
            cursor: pointer;
            font-size: 1rem;
        }

        .btn:hover {
            background: #ffed4e;
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(255, 215, 0, 0.4);
        }

        /* ========== Section Styles ========== */
        section {
            padding: 4rem 2rem;
        }

        .section-title {
            text-align: center;
            font-size: 2.5rem;
            color: #2d5016;
            margin-bottom: 3rem;
        }

        .section-title i {
            margin-right: 15px;
            color: #4a7c2c;
        }

        /* ========== Crop Advisory Section (Interactive Cards) ========== */
        .crop-cards-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 2rem;
            margin-bottom: 3rem;
        }

        .crop-card {
            background: white;
            border-radius: 15px;
            padding: 2rem;
            text-align: center;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            cursor: pointer;
            transition: all 0.3s;
            border: 3px solid transparent;
        }

        .crop-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
            border-color: #4a7c2c;
        }

        .crop-card.active {
            border-color: #ffd700;
            background: #f0f8f0;
        }

        .crop-icon {
            font-size: 4rem;
            margin-bottom: 1rem;
        }

        .crop-card h3 {
            color: #2d5016;
            font-size: 1.3rem;
            margin-bottom: 0.5rem;
        }

        .crop-card p {
            color: #666;
            font-size: 0.9rem;
        }

        /* Crop Procedure Display Area */
        .procedure-container {
            background: white;
            border-radius: 15px;
            padding: 2rem;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
            display: none; /* Hidden by default */
        }

        .procedure-container.show {
            display: block;
            animation: fadeIn 0.5s;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .procedure-header {
            display: flex;
            align-items: center;
            margin-bottom: 2rem;
            padding-bottom: 1rem;
            border-bottom: 3px solid #4a7c2c;
        }

        .procedure-header i {
            font-size: 3rem;
            color: #4a7c2c;
            margin-right: 1rem;
        }

        .procedure-header h3 {
            font-size: 2rem;
            color: #2d5016;
        }

        .procedure-steps {
            list-style: none;
            counter-reset: step-counter;
        }

        .procedure-step {
            position: relative;
            padding: 1.5rem;
            padding-left: 4rem;
            margin-bottom: 1.5rem;
            background: #f9f9f9;
            border-left: 4px solid #4a7c2c;
            border-radius: 10px;
            counter-increment: step-counter;
        }

        .procedure-step::before {
            content: counter(step-counter);
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            background: #4a7c2c;
            color: white;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 1.2rem;
        }

        .procedure-step h4 {
            color: #2d5016;
            margin-bottom: 0.5rem;
            font-size: 1.2rem;
        }

        .procedure-step p {
            color: #555;
            line-height: 1.8;
        }

        /* ========== Weather Section ========== */
        .weather-container {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            gap: 2rem;
            margin-top: 2rem;
        }

        .weather-card {
            background: linear-gradient(135deg, #87CEEB 0%, #4682B4 100%);
            color: white;
            padding: 2rem;
            border-radius: 15px;
            text-align: center;
            min-width: 250px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }

        .weather-card i {
            font-size: 4rem;
            margin-bottom: 1rem;
        }

        .weather-card h3 {
            font-size: 1.8rem;
            margin-bottom: 0.5rem;
        }

        .weather-card p {
            font-size: 1.2rem;
        }

        /* ========== Tips Section ========== */
        .tips-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 2rem;
            margin-top: 2rem;
        }

        .tip-card {
            background: linear-gradient(135deg, #ffd700 0%, #ffed4e 100%);
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            transition: transform 0.3s;
        }

        .tip-card:hover {
            transform: translateY(-5px);
        }

        .tip-card i {
            font-size: 2.5rem;
            color: #2d5016;
            margin-bottom: 1rem;
        }

        .tip-card h4 {
            color: #2d5016;
            margin-bottom: 1rem;
            font-size: 1.3rem;
        }

        .tip-card p {
            color: #333;
            line-height: 1.8;
        }

        /* ========== Form Section ========== */
        .form-section {
            background: white;
            padding: 3rem;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
            max-width: 600px;
            margin: 0 auto;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            color: #2d5016;
            font-weight: 600;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 12px;
            border: 2px solid #ddd;
            border-radius: 8px;
            font-size: 1rem;
            transition: border-color 0.3s;
        }

        .form-group input:focus,
        .form-group select:focus {
            outline: none;
            border-color: #4a7c2c;
        }

        /* ========== Footer ========== */
        footer {
            background: #2d5016;
            color: white;
            text-align: center;
            padding: 3rem 2rem;
        }

        .footer-content {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            gap: 2rem;
            margin-bottom: 2rem;
        }

        .footer-section h4 {
            margin-bottom: 1rem;
            color: #ffd700;
        }

        .footer-section p,
        .footer-section a {
            color: #ccc;
            text-decoration: none;
            display: block;
            margin-bottom: 0.5rem;
        }

        .footer-section a:hover {
            color: #ffd700;
        }

        .social-links {
            display: flex;
            gap: 1rem;
            justify-content: center;
        }

        .social-links a {
            font-size: 1.5rem;
            color: white;
            transition: color 0.3s;
        }

        .social-links a:hover {
            color: #ffd700;
        }

        /* ========== Responsive Design ========== */
        @media (max-width: 768px) {
            .nav-menu {
                flex-direction: column;
                gap: 1rem;
            }

            .hero h1 {
                font-size: 2rem;
            }

            .hero p {
                font-size: 1rem;
            }

            .section-title {
                font-size: 2rem;
            }

            .procedure-step {
                padding-left: 3rem;
            }
        }

        /* Loading animation */
        .loading {
            text-align: center;
            padding: 2rem;
            color: #4a7c2c;
        }

        .loading i {
            font-size: 3rem;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            100% { transform: rotate(360deg); }
        }
    </style>
</head>
<body>
    <!-- ========== Header / Navigation ========== -->
    <header>
        <nav class="container">
            <div class="logo">
                <i class="fas fa-leaf"></i>
                <span>Smart Crop Advisory</span>
            </div>
            <ul class="nav-menu">
                <li><a href="#home"><i class="fas fa-home"></i> Home</a></li>
                <li><a href="#advisory"><i class="fas fa-seedling"></i> Crop Advisory</a></li>
                <li><a href="#weather"><i class="fas fa-cloud-sun"></i> Weather</a></li>
                <li><a href="#tips"><i class="fas fa-lightbulb"></i> Tips</a></li>
                <li><a href="#contact"><i class="fas fa-envelope"></i> Contact</a></li>
            </ul>
        </nav>
    </header>

    <!-- ========== Hero Section ========== -->
    <section class="hero" id="home">
        <div class="container">
            <h1>Welcome to Smart Crop Advisory</h1>
            <p>Get real-time crop advice & soil insights for better yields</p>
            <a href="#advisory" class="btn">Explore Crops</a>
        </div>
    </section>

    <!-- ========== Interactive Crop Advisory Section ========== -->
    <section id="advisory">
        <div class="container">
            <h2 class="section-title"><i class="fas fa-seedling"></i>Choose Your Crop</h2>
            <p style="text-align: center; color: #666; margin-bottom: 2rem;">Click on any crop to see detailed cultivation procedures</p>
            
            <!-- Crop Selection Cards -->
            <div class="crop-cards-container">
                <div class="crop-card" onclick="loadCropProcedure('wheat')">
                    <div class="crop-icon">🌾</div>
                    <h3>Wheat</h3>
                    <p>Rabi crop</p>
                </div>

                <div class="crop-card" onclick="loadCropProcedure('rice')">
                    <div class="crop-icon">🌾</div>
                    <h3>Rice</h3>
                    <p>Kharif crop</p>
                </div>

                <div class="crop-card" onclick="loadCropProcedure('maize')">
                    <div class="crop-icon">🌽</div>
                    <h3>Maize</h3>
                    <p>All seasons</p>
                </div>

                <div class="crop-card" onclick="loadCropProcedure('tomato')">
                    <div class="crop-icon">🍅</div>
                    <h3>Tomato</h3>
                    <p>Vegetable crop</p>
                </div>

                <div class="crop-card" onclick="loadCropProcedure('cotton')">
                    <div class="crop-icon">☁️</div>
                    <h3>Cotton</h3>
                    <p>Cash crop</p>
                </div>

                <div class="crop-card" onclick="loadCropProcedure('potato')">
                    <div class="crop-icon">🥔</div>
                    <h3>Potato</h3>
                    <p>Tuber crop</p>
                </div>
            </div>

            <!-- Dynamic Procedure Display Area -->
            <div id="procedureDisplay" class="procedure-container">
                <!-- Content will be loaded dynamically -->
            </div>
        </div>
    </section>

    <!-- ========== Weather Section ========== -->
    <section id="weather" style="background: #f0f8f0;">
        <div class="container">
            <h2 class="section-title"><i class="fas fa-cloud-sun"></i>Weather Forecast</h2>
            <div class="weather-container">
                <div class="weather-card">
                    <i class="fas fa-sun"></i>
                    <h3>28°C</h3>
                    <p>Sunny & Clear</p>
                    <p>Humidity: 65%</p>
                </div>
                <div class="weather-card">
                    <i class="fas fa-cloud-rain"></i>
                    <h3>Rainfall</h3>
                    <p>Expected: 15mm</p>
                    <p>Next 48 hours</p>
                </div>
                <div class="weather-card">
                    <i class="fas fa-wind"></i>
                    <h3>Wind Speed</h3>
                    <p>12 km/h</p>
                    <p>East-Northeast</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ========== Tips Section ========== -->
    <section id="tips">
        <div class="container">
            <h2 class="section-title"><i class="fas fa-lightbulb"></i>Quick Farming Tips</h2>
            <div class="tips-grid">
                <div class="tip-card">
                    <i class="fas fa-tint"></i>
                    <h4>Irrigation Management</h4>
                    <p>Use drip irrigation to save 40% water. Water crops early morning or evening to reduce evaporation.</p>
                </div>
                <div class="tip-card">
                    <i class="fas fa-leaf"></i>
                    <h4>Soil Health</h4>
                    <p>Add organic compost regularly. Test soil pH every 6 months. Practice crop rotation for nutrient balance.</p>
                </div>
                <div class="tip-card">
                    <i class="fas fa-spider"></i>
                    <h4>Pest Management</h4>
                    <p>Use neem oil as natural pesticide. Install yellow sticky traps. Monitor crops weekly for early detection.</p>
                </div>
                <div class="tip-card">
                    <i class="fas fa-seedling"></i>
                    <h4>Crop Care</h4>
                    <p>Remove weeds regularly. Apply mulch to retain moisture. Use certified seeds for better yield.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ========== Farmer Registration Form ========== -->
    <section id="contact" style="background: #e8f5e9;">
        <div class="container">
            <h2 class="section-title"><i class="fas fa-user-plus"></i>Register for Advisory</h2>
            <div class="form-section">
                <form id="farmerForm" action="submit_farmer.php" method="POST">
                    <!-- Name -->
                    <div class="form-group">
                        <label for="name"><i class="fas fa-user"></i> Full Name *</label>
                        <input type="text" id="name" name="name" required placeholder="Enter your full name">
                    </div>

                    <!-- Phone -->
                    <div class="form-group">
                        <label for="phone"><i class="fas fa-phone"></i> Phone Number *</label>
                        <input type="tel" id="phone" name="phone" required placeholder="+91 9876543210" pattern="[0-9+]{10,15}">
                    </div>

                    <!-- Location -->
                    <div class="form-group">
                        <label for="location"><i class="fas fa-map-marker-alt"></i> Location *</label>
                        <select id="location" name="location" required>
                            <option value="">-- Select District --</option>
                            <option value="Ariyalur">Ariyalur</option>
                            <option value="Chennai">Chennai</option>
                            <option value="Coimbatore">Coimbatore</option>
                            <option value="Cuddalore">Cuddalore</option>
                            <option value="Dharmapuri">Dharmapuri</option>
                            <option value="Dindigul">Dindigul</option>
                            <option value="Erode">Erode</option>
                            <option value="Madurai">Madurai</option>
                            <option value="Salem">Salem</option>
                            <option value="Thanjavur">Thanjavur</option>
                            <option value="Tiruchirappalli">Tiruchirappalli</option>
                            <option value="Tirunelveli">Tirunelveli</option>
                            <option value="Vellore">Vellore</option>
                        </select>
                    </div>

                    <!-- Soil Type -->
                    <div class="form-group">
                        <label for="soil"><i class="fas fa-mountain"></i> Soil Type *</label>
                        <select id="soil" name="soil" required>
                            <option value="">-- Select Soil Type --</option>
                            <option value="Clay">Clay</option>
                            <option value="Sandy">Sandy</option>
                            <option value="Loamy">Loamy</option>
                            <option value="Peaty">Peaty</option>
                            <option value="Saline">Saline</option>
                            <option value="Red">Red Soil</option>
                            <option value="Black">Black Soil</option>
                            <option value="Alluvial">Alluvial</option>
                        </select>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn" style="width: 100%;">
                        <i class="fas fa-paper-plane"></i> Submit Registration
                    </button>
                </form>
            </div>
        </div>
    </section>

    <!-- ========== Footer ========== -->
    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <h4><i class="fas fa-phone"></i> Contact Us</h4>
                    <p>Email: support@smartcrop.in</p>
                    <p>Phone: +91 98765 43210</p>
                    <p>Address: Agricultural Research Center, India</p>
                </div>

                <div class="footer-section">
                    <h4><i class="fas fa-link"></i> Quick Links</h4>
                    <a href="#home">Home</a>
                    <a href="#advisory">Crop Advisory</a>
                    <a href="#weather">Weather</a>
                    <a href="#tips">Farming Tips</a>
                </div>

                <div class="footer-section">
                    <h4><i class="fas fa-share-alt"></i> Follow Us</h4>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-facebook"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
            </div>
            <p>&copy; 2025 Smart Crop Advisory System. All Rights Reserved.</p>
        </div>
    </footer>

    <!-- ========== JavaScript for Interactive Features ========== -->
    <script>
        // Sample crop procedure data (In production, fetch from API/database)
        const cropDatabase = {
            wheat: {
                name: 'Wheat',
                icon: '🌾',
                steps: [
                    {
                        title: 'Soil Preparation',
                        description: 'Plow the field 2-3 times. Add organic manure (10-15 tons/ha). Level the field properly for uniform irrigation.'
                    },
                    {
                        title: 'Seed Selection & Treatment',
                        description: 'Use certified seeds (100-125 kg/ha). Treat seeds with fungicide before sowing to prevent diseases.'
                    },
                    {
                        title: 'Sowing',
                        description: 'Sow in rows 20-22 cm apart. Optimal sowing time: October-November. Depth: 5-6 cm.'
                    },
                    {
                        title: 'Fertilizer Application',
                        description: 'Apply NPK: 120:60:40 kg/ha. Split nitrogen doses: 50% at sowing, 25% at first irrigation, 25% at tillering.'
                    },
                    {
                        title: 'Irrigation',
                        description: 'First irrigation 20-25 days after sowing. Total 5-6 irrigations needed. Critical stages: crown root, tillering, flowering, grain filling.'
                    },
                    {
                        title: 'Weed & Pest Control',
                        description: 'Remove weeds manually or use herbicides. Monitor for aphids, termites. Use IPM practices.'
                    },
                    {
                        title: 'Harvesting',
                        description: 'Harvest when grains turn golden yellow (120-150 days). Use combine harvester or manual cutting. Thresh and dry to 12% moisture.'
                    }
                ]
            },
            rice: {
                name: 'Rice',
                icon: '🌾',
                steps: [
                    {
                        title: 'Land Preparation',
                        description: 'Puddle the field with 5-10 cm standing water. Level field properly. Add farmyard manure (12-15 tons/ha).'
                    },
                    {
                        title: 'Nursery Preparation',
                        description: 'Prepare nursery beds (10% of main field). Soak seeds for 24 hours. Sow treated seeds. Seedlings ready in 25-30 days.'
                    },
                    {
                        title: 'Transplanting',
                        description: 'Transplant 25-30 day old seedlings. Spacing: 20x15 cm. 2-3 seedlings per hill. Maintain 5 cm water depth.'
                    },
                    {
                        title: 'Fertilizer Management',
                        description: 'Apply NPK: 120:60:40 kg/ha. Split nitrogen: 50% basal, 25% at tillering, 25% at panicle initiation.'
                    },
                    {
                        title: 'Water Management',
                        description: 'Maintain 5-7 cm water depth continuously. Drain 10 days before harvest. Total water requirement: 1200-1500 mm.'
                    },
                    {
                        title: 'Pest & Disease Control',
                        description: 'Monitor for stem borer, leaf folder, blast disease. Use integrated pest management. Apply neem oil spray.'
                    },
                    {
                        title: 'Harvesting & Post-Harvest',
                        description: 'Harvest when 80% grains turn golden (130-140 days). Cut, thresh, and dry to 14% moisture. Store properly.'
                    }
                ]
            },
            maize: {
                name: 'Maize',
                icon: '🌽',
                steps: [
                    {
                        title: 'Field Preparation',
                        description: 'Plow 2-3 times to fine tilth. Apply FYM 10 tons/ha. Make ridges and furrows for drainage.'
                    },
                    {
                        title: 'Seed Treatment & Sowing',
                        description: 'Use 20-25 kg seeds/ha. Treat with fungicide. Sow at 60x20 cm spacing. Depth: 4-5 cm.'
                    },
                    {
                        title: 'Fertilization',
                        description: 'Apply NPK: 150:75:40 kg/ha. 50% nitrogen at sowing, 25% at knee-high, 25% at tasseling.'
                    },
                    {
                        title: 'Irrigation Schedule',
                        description: 'First irrigation 20-25 days after sowing. Critical stages: knee-high, tasseling, silking, grain filling. Total 4-6 irrigations.'
                    },
                    {
                        title: 'Weed Management',
                        description: 'First weeding 20-25 days after sowing. Second at 40-45 days. Use pre-emergence herbicides if needed.'
                    },
                    {
                        title: 'Pest Control',
                        description: 'Monitor for stem borer, fall armyworm. Use pheromone traps. Apply bio-pesticides.'
                    },
                    {
                        title: 'Harvesting',
                        description: 'Harvest at physiological maturity (90-110 days). Cobs dry, husk brown. Dry kernels to 14% moisture.'
                    }
                ]
            },
            tomato: {
                name: 'Tomato',
                icon: '🍅',
                steps: [
                    {
                        title: 'Nursery Raising',
                        description: 'Sow seeds in nursery beds or pro-trays. Use sterile potting mix. Seedlings ready in 25-30 days.'
                    },
                    {
                        title: 'Land Preparation',
                        description: 'Deep plowing, add organic manure 20-25 tons/ha. Make raised beds (width 1m, height 15-20 cm).'
                    },
                    {
                        title: 'Transplanting',
                        description: 'Transplant 4-5 week old seedlings. Spacing: 60x45 cm. Water immediately after planting.'
                    },
                    {
                        title: 'Fertilizer Application',
                        description: 'Apply NPK: 100:80:60 kg/ha. Split nitrogen in 3 doses. Apply micronutrients as needed.'
                    },
                    {
                        title: 'Irrigation & Mulching',
                        description: 'Drip irrigation recommended. Water at 2-3 day intervals. Apply plastic mulch to conserve moisture.'
                    },
                    {
                        title: 'Staking & Pruning',
                        description: 'Provide stakes for support. Prune lower leaves. Remove side shoots for better fruiting.'
                    },
                    {
                        title: 'Disease & Pest Management',
                        description: 'Monitor for early blight, late blight, fruit borer. Use disease-free seeds. Apply fungicides/pesticides as needed.'
                    },
                    {
                        title: 'Harvesting',
                        description: 'Harvest when fruits turn red (70-90 days after transplanting). Pick every 2-3 days. Handle carefully.'
                    }
                ]
            },
            cotton: {
                name: 'Cotton',
                icon: '☁️',
                steps: [
                    {
                        title: 'Soil Preparation',
                        description: 'Deep plowing to 20-25 cm. Add FYM 10-12 tons/ha. Form ridges and furrows for drainage.'
                    },
                    {
                        title: 'Seed Treatment',
                        description: 'Treat seeds with fungicide and insecticide. Use Bt cotton seeds for pest resistance. Seed rate: 1.5-2 kg/ha.'
                    },
                    {
                        title: 'Sowing',
                        description: 'Sow in rows 60-90 cm apart. Plant-to-plant: 30-45 cm. Sow 2-3 seeds per hill. Depth: 3-5 cm.'
                    },
                    {
                        title: 'Fertilizer Management',
                        description: 'Apply NPK: 80:40:40 kg/ha. Split nitrogen: 50% basal, 25% at square formation, 25% at flowering.'
                    },
                    {
                        title: 'Irrigation',
                        description: 'First irrigation 25-30 days after sowing. Total 5-7 irrigations. Critical: flowering and boll development.'
                    },
                    {
                        title: 'Pest Management',
                        description: 'Monitor for bollworm, whitefly, aphids. Use IPM: pheromone traps, biological control. Avoid excessive pesticide use.'
                    },
                    {
                        title: 'Picking & Ginning',
                        description: 'First picking 120-140 days. Multiple pickings at 10-15 day intervals. Dry and send for ginning.'
                    }
                ]
            },
            potato: {
                name: 'Potato',
                icon: '🥔',
                steps: [
                    {
                        title: 'Land Preparation',
                        description: 'Deep plowing 20-25 cm. Add FYM 20-25 tons/ha. Make raised beds or ridges. Soil should be well-drained.'
                    },
                    {
                        title: 'Seed Tuber Selection',
                        description: 'Use certified seed tubers (2-2.5 tons/ha). Cut large tubers (50-60g pieces) with 2-3 eyes. Treat with fungicide.'
                    },
                    {
                        title: 'Planting',
                        description: 'Plant in furrows 60 cm apart. Tuber spacing: 20-25 cm. Depth: 5-7 cm. Cover with soil.'
                    },
                    {
                        title: 'Fertilization',
                        description: 'Apply NPK: 120:80:100 kg/ha. All phosphorus and potassium basal. Nitrogen in 2 splits (50% basal, 50% at earthing).'
                    },
                    {
                        title: 'Irrigation',
                        description: 'Light irrigation after planting. Regular irrigation every 7-10 days. Maintain soil moisture. Avoid water logging.'
                    },
                    {
                        title: 'Earthing Up',
                        description: 'First earthing 25-30 days after planting. Second earthing 45-50 days. Covers tubers and prevents greening.'
                    },
                    {
                        title: 'Disease Control',
                        description: 'Monitor for late blight, early blight. Apply protective fungicides. Use disease-free seeds.'
                    },
                    {
                        title: 'Harvesting',
                        description: 'Harvest when leaves turn yellow (90-120 days). Stop irrigation 10 days before. Cure tubers before storage.'
                    }
                ]
            }
        };

        /**
         * Load and display crop procedure dynamically
         * @param {string} cropName - Name of the crop to load
         */
        function loadCropProcedure(cropName) {
            const procedureDiv = document.getElementById('procedureDisplay');
            const cropData = cropDatabase[cropName];

            // Highlight selected crop card
            document.querySelectorAll('.crop-card').forEach(card => {
                card.classList.remove('active');
            });
            event.currentTarget.classList.add('active');

            // Show loading animation
            procedureDiv.innerHTML = '<div class="loading"><i class="fas fa-spinner"></i><p>Loading crop procedure...</p></div>';
            procedureDiv.classList.add('show');

            // Simulate API call delay (remove in production when using real API)
            setTimeout(() => {
                if (cropData) {
                    let stepsHTML = '';
                    cropData.steps.forEach(step => {
                        stepsHTML += `
                            <li class="procedure-step">
                                <h4>${step.title}</h4>
                                <p>${step.description}</p>
                            </li>
                        `;
                    });

                    procedureDiv.innerHTML = `
                        <div class="procedure-header">
                            <i class="fas fa-seedling"></i>
                            <h3>${cropData.name} Cultivation Procedure</h3>
                        </div>
                        <ol class="procedure-steps">
                            ${stepsHTML}
                        </ol>
                    `;
                } else {
                    procedureDiv.innerHTML = '<p style="text-align: center; color: #999;">No procedure data available for this crop.</p>';
                }
            }, 800);

            // Scroll to procedure display
            setTimeout(() => {
                procedureDiv.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }, 100);
        }

        /**
         * Form validation and submission
         */
        document.getElementById('farmerForm').addEventListener('submit', function(e) {
            // You can add custom validation here if needed
            const phone = document.getElementById('phone').value;
            if (!/^[0-9+]{10,15}$/.test(phone)) {
                e.preventDefault();
                alert('Please enter a valid phone number (10-15 digits)');
                return false;
            }
            
            // If using AJAX submission instead of regular form submission:
            /*
            e.preventDefault();
            const formData = new FormData(this);
            
            fetch('submit_farmer.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                alert('Registration successful!');
                this.reset();
            })
            .catch(error => {
                alert('Error submitting form. Please try again.');
            });
            */
        });

        // Smooth scroll for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({ behavior: 'smooth' });
                }
            });
        });
    </script>
</body>
</html>'''

# Save the HTML file
with open('smart_crop_interactive.html', 'w', encoding='utf-8') as f:
    f.write(html_content)

print("✅ Interactive Smart Crop Advisory webpage created successfully!")
print("\nFile: smart_crop_interactive.html")
print("\n📋 Features Implemented:")
print("✓ Responsive header with navigation")
print("✓ Hero section with welcome message")
print("✓ Interactive crop cards (Wheat, Rice, Maize, Tomato, Cotton, Potato)")
print("✓ Dynamic crop procedure display on click")
print("✓ Step-by-step numbered procedures with animations")
print("✓ Weather forecast section")
print("✓ Quick farming tips")
print("✓ Farmer registration form (Name, Phone, Location, Soil Type)")
print("✓ Professional footer")
print("✓ Soft earthy color scheme")
print("✓ Mobile-responsive design")
print("✓ JavaScript for interactivity")
print("\n💡 How It Works:")
print("1. Click any crop card to see its cultivation procedure")
print("2. Procedures load dynamically with smooth animations")
print("3. Each step is numbered and detailed")
print("4. Easy to integrate with backend API/database")
print("\n🔧 Backend Integration:")
print("- Replace cropDatabase object with API calls")
print("- Update form action to your PHP backend")
print("- Add AJAX for dynamic data fetching")
