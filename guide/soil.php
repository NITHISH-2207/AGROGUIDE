<?php
$page_title = "Soil Types - Smart Crop Advisory System";
include 'includes/header.php';
?>

<section class="page-header">
    <div class="container">
        <h1>Soil Types</h1>
        <p>Discover different soil types and their characteristics</p>
    </div>
</section>

<section class="content-section">
    <div class="container">
        <div class="soil-list">
            <!-- Clay Soil -->
            <div class="soil-detail-card">
                <div class="soil-detail-image">
                    <img src="assets/images/soils/clay soil.jpg" alt="Clay Soil" onerror="this.src='https : //via.placeholder.com/400x300/8B4513/ffffff?text=Clay+Soil'">
                </div>
                <div class="soil-detail-content">
                    <h2>🟤 Clay Soil</h2>
                    <p class="soil-description">Clay soil is heavy and composed of very fine particles. It has excellent water and nutrient retention capabilities, making it ideal for moisture-loving crops.</p>
                    
                    <div class="soil-characteristics">
                        <h3>Characteristics:</h3>
                        <ul>
                            <li>✓ High water retention capacity</li>
                            <li>✓ Rich in nutrients</li>
                            <li>✓ Slow drainage</li>
                            <li>✓ Dense and heavy texture</li>
                            <li>✓ Sticky when wet</li>
                        </ul>
                    </div>

                    <div class="soil-suitable-crops">
                        <h3>Best For:</h3>
                        <div class="crop-tags">
                            <span class="tag">Rice</span>
                            <span class="tag">Wheat</span>
                            <span class="tag">Lettuce</span>
                            <span class="tag">Cabbage</span>
                        </div>
                    </div>

                    <a href="soil_crops.php?soil=Clay Soil" class="btn btn-primary">View All Suitable Crops</a>
                </div>
            </div>

            <!-- Sandy Soil -->
            <div class="soil-detail-card">
                <div class="soil-detail-image">
                    <img src="assets/images/soils/sandy.jpg" alt="Sandy Soil" onerror="this.src='https : //via.placeholder.com/400x300/F4A460/ffffff?text=Sandy+Soil'">
                </div>
                <div class="soil-detail-content">
                    <h2>🟡 Sandy Soil</h2>
                    <p class="soil-description">Sandy soil has large particles and provides excellent drainage. It warms up quickly in spring and is ideal for early crop cultivation.</p>
                    
                    <div class="soil-characteristics">
                        <h3>Characteristics:</h3>
                        <ul>
                            <li>✓ Excellent drainage</li>
                            <li>✓ Warms quickly in spring</li>
                            <li>✓ Low nutrient retention</li>
                            <li>✓ Light and easy to work</li>
                            <li>✓ Gritty texture</li>
                        </ul>
                    </div>

                    <div class="soil-suitable-crops">
                        <h3>Best For:</h3>
                        <div class="crop-tags">
                            <span class="tag">Carrots</span>
                            <span class="tag">Potatoes</span>
                            <span class="tag">Melons</span>
                            <span class="tag">Groundnuts</span>
                        </div>
                    </div>

                    <a href="soil_crops.php?soil=Sandy Soil" class="btn btn-primary">View All Suitable Crops</a>
                </div>
            </div>

            <!-- Loamy Soil -->
            <div class="soil-detail-card">
                <div class="soil-detail-image">
                    <img src="assets/images/soils/loamy.jpg" alt="Loamy Soil" onerror="this.src='https://via.placeholder.com/400x300/8B7355/ffffff?text=Loamy+Soil'">
                </div>
                <div class="soil-detail-content">
                    <h2>🟫 Loamy Soil</h2>
                    <p class="soil-description">Loamy soil is the perfect combination of sand, silt, and clay. It's considered the ideal soil type for most agricultural crops.</p>
                    
                    <div class="soil-characteristics">
                        <h3>Characteristics:</h3>
                        <ul>
                            <li>✓ Perfect balance of drainage and retention</li>
                            <li>✓ High fertility</li>
                            <li>✓ Easy to work with</li>
                            <li>✓ Good aeration</li>
                            <li>✓ Ideal pH balance</li>
                        </ul>
                    </div>

                    <div class="soil-suitable-crops">
                        <h3>Best For:</h3>
                        <div class="crop-tags">
                            <span class="tag">Tomatoes</span>
                            <span class="tag">Vegetables</span>
                            <span class="tag">Fruits</span>
                            <span class="tag">Most Crops</span>
                        </div>
                    </div>

                    <a href="soil_crops.php?soil=Loamy Soil" class="btn btn-primary">View All Suitable Crops</a>
                </div>
            </div>

            <!-- Red Soil -->
            <div class="soil-detail-card">
                <div class="soil-detail-image">
                    <img src="assets/images/soils/redsoil.jpg" alt="Red Soil" onerror="this.src='https://via.placeholder.com/400x300/CD5C5C/ffffff?text=Red+Soil'">
                </div>
                <div class="soil-detail-content">
                    <h2> Red Soil</h2>
                    <p class="soil-description">Red soil gets its color from iron oxide content. It's widely found in India and suitable for a variety of crops with proper fertilization.</p>
                    
                    <div class="soil-characteristics">
                        <h3>Characteristics:</h3>
                        <ul>
                            <li>✓ Rich in iron oxide</li>
                            <li>✓ Porous and friable</li>
                            <li>✓ Low nitrogen content</li>
                            <li>✓ Good drainage</li>
                            <li>✓ Needs fertilization</li>
                        </ul>
                    </div>

                    <div class="soil-suitable-crops">
                        <h3>Best For:</h3>
                        <div class="crop-tags">
                            <span class="tag">Cotton</span>
                            <span class="tag">Pulses</span>
                            <span class="tag">Millets</span>
                            <span class="tag">Groundnuts</span>
                        </div>
                    </div>

                    <a href="soil_crops.php?soil=Red Soil" class="btn btn-primary">View All Suitable Crops</a>
                </div>
            </div>

            <!-- Black Soil -->
            <div class="soil-detail-card">
                <div class="soil-detail-image">
                    <img src="assets/images/soils/black soil.jpg" alt="Black Soil" onerror="this.src='https://via.placeholder.com/400x300/2F4F4F/ffffff?text=Black+Soil'">
                </div>
                <div class="soil-detail-content">
                    <h2> Black Soil (Regur Soil)</h2>
                    <p class="soil-description">Black soil, also known as regur soil, is rich in nutrients and highly suitable for cotton cultivation. It has excellent moisture retention.</p>
                    
                    <div class="soil-characteristics">
                        <h3>Characteristics:</h3>
                        <ul>
                            <li>✓ High fertility</li>
                            <li>✓ Rich in calcium and magnesium</li>
                            <li>✓ Excellent moisture retention</li>
                            <li>✓ Cracks when dry</li>
                            <li>✓ Self-ploughing property</li>
                        </ul>
                    </div>

                    <div class="soil-suitable-crops">
                        <h3>Best For:</h3>
                        <div class="crop-tags">
                            <span class="tag">Cotton</span>
                            <span class="tag">Soybean</span>
                            <span class="tag">Sunflower</span>
                            <span class="tag">Jowar</span>
                        </div>
                    </div>

                    <a href="soil_crops.php?soil=Black Soil" class="btn btn-primary">View All Suitable Crops</a>
                </div>
            </div>

            <!-- Alluvial Soil -->
            <div class="soil-detail-card">
                <div class="soil-detail-image">
                    <img src="assets/images/soils/alluvial soil.jpg" alt="Alluvial Soil" onerror="this.src='https ://via.placeholder.com/400x300/D2B48C/ffffff?text=Alluvial+Soil'">
                </div>
                <div class="soil-detail-content">
                    <h2> Alluvial Soil</h2>
                    <p class="soil-description">Alluvial soil is formed by river deposits and is highly fertile. It covers a large part of northern India and is ideal for cereal crops.</p>
                    
                    <div class="soil-characteristics">
                        <h3>Characteristics:</h3>
                        <ul>
                            <li>✓ Highly fertile</li>
                            <li>✓ Rich in potash and lime</li>
                            <li>✓ River deposited</li>
                            <li>✓ Good water retention</li>
                            <li>✓ Renewable fertility</li>
                        </ul>
                    </div>

                    <div class="soil-suitable-crops">
                        <h3>Best For:</h3>
                        <div class="crop-tags">
                            <span class="tag">Rice</span>
                            <span class="tag">Wheat</span>
                            <span class="tag">Sugarcane</span>
                            <span class="tag">Vegetables</span>
                        </div>
                    </div>

                    <a href="soil_crops.php?soil=Alluvial Soil" class="btn btn-primary">View All Suitable Crops</a>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>





