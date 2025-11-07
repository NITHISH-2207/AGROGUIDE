<?php
$page_title = "Home - Smart Crop Advisory System";
include 'includes/header.php';
?>

<!-- Hero Section -->
<section class="hero-section">
    <div class="hero-content">
        <h1 class="hero-title">Grow Smarter, Farm Better</h1>
        <p class="hero-subtitle">Get personalized crop recommendations based on your soil type</p>
        <div class="hero-buttons">
            <a href="soil.php" class="btn btn-primary">Explore Soil Types</a>
            <a href="features.php" class="btn btn-secondary">Learn More</a>
        </div>
    </div>
    
</section>

<!-- Soil Types Section -->
<section class="soil-section">
    <div class="container">
        <h2 class="section-title">Select Your Soil Type</h2>
        <p class="section-subtitle">Choose your soil type to get the best crop recommendations</p>
        
        <div class="soil-grid">
            <!-- Clay Soil -->
            <div class="soil-card">
                <div class="soil-image">
                    <img src="images/clay soil.jpg" alt="Clay Soil" onerror="this.src='https : //via.placeholder.com/300x200/8B4513/ffffff?text=Clay+Soil'">
                </div>
                <div class="soil-content">
                    <h3>Clay Soil</h3>
                    <p>Heavy, moisture-retentive soil ideal for rice and wheat cultivation</p>
                    <div class="soil-properties">
                        <span class="property">💧 High Water Retention</span>
                        <span class="property">🌾 Rich in Nutrients</span>
                    </div>
                    <a href="soil_crops.php?soil=Clay Soil" class="btn btn-small">View Suitable Crops</a>
                </div>
            </div>

            <!-- Sandy Soil -->
            <div class="soil-card">
                <div class="soil-image">
                    <img src="assets/images/soils/sandy.jpg" alt="Sandy Soil" onerror="this.src='https://via.placeholder.com/400x300/D2B48C/ffffff?text=Alluvial+Soil'">
                </div>
                <div class="soil-content">
                    <h3>Sandy Soil</h3>
                    <p>Light, well-drained soil perfect for root vegetables and melons</p>
                    <div class="soil-properties">
                        <span class="property">💨 Excellent Drainage</span>
                        <span class="property">🌡️ Warms Quickly</span>
                    </div>
                    <a href="soil_crops.php?soil=Sandy Soil" class="btn btn-small">View Suitable Crops</a>
                </div>
            </div>

            <!-- Loamy Soil -->
            <div class="soil-card">
                <div class="soil-image">
                    <img src="images/loamy.jpg" alt="Loamy Soil" onerror="this.src='https : //via.placeholder.com/300x200/8B7355/ffffff?text=Loamy+Soil'">
                </div>
                <div class="soil-content">
                    <h3>Loamy Soil</h3>
                    <p>Balanced soil with excellent drainage, ideal for most crops</p>
                    <div class="soil-properties">
                        <span class="property">⚖️ Perfect Balance</span>
                        <span class="property">🌟 Most Versatile</span>
                    </div>
                    <a href="soil_crops.php?soil=Loamy Soil" class="btn btn-small">View Suitable Crops</a>
                </div>
            </div>

            <!-- Red Soil -->
            <div class="soil-card">
                <div class="soil-image">
                    <img src="images/redsoil.jpg" alt="Red Soil" >
                </div>
                <div class="soil-content">
                    <h3>Red Soil</h3>
                    <p>Rich in iron, suitable for cotton, pulses, and millets</p>
                    <div class="soil-properties">
                        <span class="property">⚙️ Iron Rich</span>
                        <span class="property">🌾 Good for Pulses</span>
                    </div>
                    <a href="soil_crops.php?soil=Red Soil" class="btn btn-small">View Suitable Crops</a>
                </div>
            </div>

            <!-- Black Soil -->
            <div class="soil-card">
                <div class="soil-image">
                    <img src="images/black soil.jpg" alt="Black Soil" >
                </div>
                <div class="soil-content">
                    <h3>Black Soil</h3>
                    <p>Nutrient-rich regur soil, best for cotton and oilseeds</p>
                    <div class="soil-properties">
                        <span class="property">💪 High Fertility</span>
                        <span class="property">🌾 Cotton Ideal</span>
                    </div>
                    <a href="soil_crops.php?soil=Black Soil" class="btn btn-small">View Suitable Crops</a>
                </div>
            </div>

            <!-- Alluvial Soil -->
            <div class="soil-card">
                <div class="soil-image">
                    <img src="images/alluvial soil.jpg" alt="Alluvial Soil" >
                </div>
                <div class="soil-content">
                    <h3>Alluvial Soil</h3>
                    <p>Fertile river deposit soil, excellent for cereals and sugarcane</p>
                    <div class="soil-properties">
                        <span class="property">🌊 River Deposits</span>
                        <span class="property">🌾 Highly Fertile</span>
                    </div>
                    <a href="soil_crops.php?soil=Alluvial Soil" class="btn btn-small">View Suitable Crops</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Features Preview Section -->
<section class="features-preview">
    <div class="container">
        <h2 class="section-title">Why Choose Us</h2>
        <p class="section-subtitle">Comprehensive farming solutions at your fingertips</p>
        
        <div class="features-grid">
            <div class="feature-card">
                <div class="feature-icon">🌱</div>
                <h3>Soil Analysis</h3>
                <p>Comprehensive soil type identification and detailed recommendations for optimal crop selection</p>
            </div>

            <div class="feature-card">
                <div class="feature-icon">📊</div>
                <h3>Crop Planning</h3>
                <p>Step-by-step cultivation procedures with detailed guidelines for maximum yields</p>
            </div>

            <div class="feature-card">
                <div class="feature-icon">💬</div>
                <h3>AI Assistant</h3>
                <p>24/7 intelligent chatbot support for all your farming queries and expert advice</p>
            </div>

            <div class="feature-card">
                <div class="feature-icon">💧</div>
                <h3>Water Management Solutions</h3>
                <p>Efficient irrigation techniques and water conservation strategies to optimize water usage and reduce costs.</p>
            </div>
        </div>

        <div class="text-center">
            <a href="features.php" class="btn btn-primary">View All Features →</a>
        </div>
    </div>
</section>

<!-- Statistics Section -->
<section class="stats-section">
    <div class="container">
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-number">6+</div>
                <div class="stat-label">Soil Types</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">50+</div>
                <div class="stat-label">Crop Varieties</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">5+</div>
                <div class="stat-label">Happy Farmers</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">24/7</div>
                <div class="stat-label">Support</div>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
