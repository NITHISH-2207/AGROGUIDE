<?php
$page_title = "Cultivation Procedure - Smart Crop Advisory System";
include 'includes/header.php';

// Get crop name from URL
$crop_name = isset($_GET['crop']) ? htmlspecialchars($_GET['crop']) : 'Unknown Crop';
$soil_type = isset($_GET['soil']) ? htmlspecialchars($_GET['soil']) : '';
?>

<section class="procedure-header">
    <div class="container">
        <!-- <div class="breadcrumb">
            <a href="index.php">Home</a> 
            <a href="soil.php">Soil Types</a> 
            <?php if($soil_type): ?>
                <a href="soil_crops.php?soil=<?php echo urlencode($soil_type); ?>"><?php echo $soil_type; ?></a> / 
            <?php endif; ?>
            <span><?php echo $crop_name; ?></span>
        </div> -->
        <h1><?php echo $crop_name; ?> Cultivation Guide</h1>
        <p>Complete step-by-step procedure for successful cultivation</p>
    </div>
</section>

<section class="procedure-banner">
    <div class="container">
        <div class="banner-image">
            <img src="assets/images/crops/<?php echo strtolower(str_replace(' ', '-', $crop_name)); ?>.jpg" 
                 alt="<?php echo $crop_name; ?>" 
                 onerror="this.src='https : //via.placeholder.com/1200x400/56ab2f/ffffff?text=<?php echo urlencode($crop_name); ?>'">
        </div>
    </div>
</section>

<section class="procedure-content">
    <div class="container">
        <div class="procedure-sidebar">
            <div class="sidebar-card">
                <h3>Quick Info</h3>
                <ul class="quick-info-list">
                    <li><strong>Crop:</strong> <?php echo $crop_name; ?></li>
                    <li><strong>Soil Type:</strong> <?php echo $soil_type ? $soil_type : 'Multiple'; ?></li>
                    <li><strong>Season:</strong> Kharif/Rabi</li>
                    <li><strong>Duration:</strong> 90-120 days</li>
                    <li><strong>Yield:</strong> 25-30 quintals/acre</li>
                </ul>
            </div>

            <div class="sidebar-card">
                <h3>Need Help?</h3>
                <p>Chat with our AI assistant for personalized advice</p>
                <button class="btn btn-primary btn-block" onclick="toggleChatbot()">💬 Ask Assistant</button>
            </div>
        </div>

        <div class="procedure-main">
            <!-- Step 1: Land Preparation -->
            <div class="procedure-step">
                <div class="step-header">
                    <div class="step-icon">🚜</div>
                    <div class="step-title">
                        <span class="step-number">Step 1</span>
                        <h2>Land Preparation</h2>
                    </div>
                </div>
                <div class="step-content">
                    <p>Proper land preparation is crucial for successful <?php echo $crop_name; ?> cultivation. Follow these guidelines:</p>
                    <ul>
                        <li><strong>Primary Tillage:</strong> Plough the field 2-3 times to a depth of 20-25 cm to break the soil clods and ensure proper aeration.</li>
                        <li><strong>Secondary Tillage:</strong> Harrow the field 2-3 times followed by planking to level the field and create a fine tilth.</li>
                        <li><strong>Soil Testing:</strong> Conduct soil testing to determine pH, nutrient levels, and organic matter content.</li>
                        <li><strong>Drainage:</strong> Ensure proper drainage channels to prevent waterlogging during heavy rains.</li>
                        <li><strong>Weed Removal:</strong> Remove all weeds and crop residues from the previous season.</li>
                    </ul>
                    <div class="tip-box">
                        <strong>💡 Pro Tip:</strong> Add organic manure (FYM) at 5-7 tons per acre during land preparation for better soil health.
                    </div>
                </div>
            </div>

            <!-- Step 2: Seed Selection -->
            <div class="procedure-step">
                <div class="step-header">
                    <div class="step-icon">🌱</div>
                    <div class="step-title">
                        <span class="step-number">Step 2</span>
                        <h2>Seed Selection & Treatment</h2>
                    </div>
                </div>
                <div class="step-content">
                    <p>Choosing the right variety and treating seeds properly ensures healthy germination:</p>
                    <ul>
                        <li><strong>Variety Selection:</strong> Choose high-yielding, disease-resistant varieties suitable for your region and climate.</li>
                        <li><strong>Seed Rate:</strong> Use recommended seed rate (typically 10-15 kg per acre depending on variety).</li>
                        <li><strong>Seed Treatment:</strong> Treat seeds with fungicides like Carbendazim (2g/kg) or Thiram (2.5g/kg) to prevent seed-borne diseases.</li>
                        <li><strong>Bio-fertilizer Treatment:</strong> Apply Rhizobium and PSB cultures (200g each/acre seed) for better nitrogen fixation.</li>
                        <li><strong>Quality Check:</strong> Use only certified seeds with minimum 85% germination rate.</li>
                    </ul>
                    <div class="warning-box">
                        <strong>⚠️ Important:</strong> Never use old or damaged seeds as they result in poor germination and weak plants.
                    </div>
                </div>
            </div>

            <!-- Step 3: Sowing -->
            <div class="procedure-step">
                <div class="step-header">
                    <div class="step-icon">🌾</div>
                    <div class="step-title">
                        <span class="step-number">Step 3</span>
                        <h2>Sowing & Planting</h2>
                    </div>
                </div>
                <div class="step-content">
                    <p>Proper sowing technique and timing are critical for optimal crop establishment:</p>
                    <ul>
                        <li><strong>Sowing Time:</strong> Best time is during the optimal season window (specific months vary by region).</li>
                        <li><strong>Sowing Method:</strong> Use line sowing or dibbling method for uniform plant population.</li>
                        <li><strong>Spacing:</strong> Maintain proper row-to-row (45-60 cm) and plant-to-plant (15-20 cm) spacing.</li>
                        <li><strong>Sowing Depth:</strong> Sow seeds at 3-5 cm depth for optimal germination.</li>
                        <li><strong>Seed Rate:</strong> Adjust seed rate based on germination percentage and field conditions.</li>
                    </ul>
                    <div class="tip-box">
                        <strong>💡 Pro Tip:</strong> Sow during evening hours or on cloudy days to reduce heat stress on seeds.
                    </div>
                </div>
            </div>

            <!-- Step 4: Irrigation -->
            <div class="procedure-step">
                <div class="step-header">
                    <div class="step-icon">💧</div>
                    <div class="step-title">
                        <span class="step-number">Step 4</span>
                        <h2>Irrigation Management</h2>
                    </div>
                </div>
                <div class="step-content">
                    <p>Proper water management ensures healthy crop growth and maximum yield:</p>
                    <ul>
                        <li><strong>First Irrigation:</strong> Apply immediately after sowing if soil moisture is inadequate.</li>
                        <li><strong>Critical Stages:</strong> Ensure adequate moisture during flowering, pod formation, and grain filling stages.</li>
                        <li><strong>Frequency:</strong> Irrigate at 10-15 days interval depending on soil type and weather conditions.</li>
                        <li><strong>Method:</strong> Use drip irrigation or sprinkler system for water efficiency (saves 40-50% water).</li>
                        <li><strong>Drainage:</strong> Avoid waterlogging by maintaining proper drainage channels.</li>
                    </ul>
                    <div class="tip-box">
                        <strong>💡 Pro Tip:</strong> Use mulching to conserve soil moisture and reduce irrigation frequency by 30%.
                    </div>
                </div>
            </div>

            <!-- Step 5: Fertilizer -->
            <div class="procedure-step">
                <div class="step-header">
                    <div class="step-icon">🧪</div>
                    <div class="step-title">
                        <span class="step-number">Step 5</span>
                        <h2>Fertilizer Application</h2>
                    </div>
                </div>
                <div class="step-content">
                    <p>Balanced fertilization is key to achieving high yields and maintaining soil health:</p>
                    <ul>
                        <li><strong>Basal Dose:</strong> Apply recommended NPK (Nitrogen-Phosphorus-Potassium) at the time of sowing or planting.</li>
                        <li><strong>Nitrogen:</strong> Split nitrogen application - 50% at basal, 25% at 30 days, 25% at 60 days after sowing.</li>
                        <li><strong>Phosphorus & Potash:</strong> Apply full dose of P and K as basal dressing during land preparation.</li>
                        <li><strong>Micronutrients:</strong> Apply zinc sulfate (25 kg/acre) and boron (5 kg/acre) if deficient.</li>
                        <li><strong>Organic Manure:</strong> Supplement with vermicompost or FYM (5-7 tons/acre) for better soil structure.</li>
                    </ul>
                    <div class="warning-box">
                        <strong>⚠️ Important:</strong> Always base fertilizer application on soil test results to avoid over-application.
                    </div>
                </div>
            </div>

            <!-- Step 6: Pest Control -->
            <div class="procedure-step">
                <div class="step-header">
                    <div class="step-icon">🐛</div>
                    <div class="step-title">
                        <span class="step-number">Step 6</span>
                        <h2>Pest & Disease Management</h2>
                    </div>
                </div>
                <div class="step-content">
                    <p>Integrated pest management protects your crop from pests and diseases:</p>
                    <ul>
                        <li><strong>Monitoring:</strong> Regularly scout the field for early detection of pests and diseases (2-3 times per week).</li>
                        <li><strong>Cultural Control:</strong> Use crop rotation, resistant varieties, and proper spacing to minimize pest incidence.</li>
                        <li><strong>Biological Control:</strong> Encourage natural predators and use bio-pesticides like Neem oil, Bt spray.</li>
                        <li><strong>Chemical Control:</strong> Use recommended insecticides/fungicides only when pest population crosses ETL (Economic Threshold Level).</li>
                        <li><strong>Common Pests:</strong> Aphids, whiteflies, pod borers - treat with appropriate pesticides as per recommendation.</li>
                        <li><strong>Diseases:</strong> Watch for fungal diseases, bacterial infections, and viral diseases - use appropriate fungicides.</li>
                    </ul>
                    <div class="warning-box">
                        <strong>⚠️ Safety:</strong> Always wear protective equipment when spraying pesticides and follow label instructions.
                    </div>
                </div>
            </div>

            <!-- Step 7: Weed Management -->
            <div class="procedure-step">
                <div class="step-header">
                    <div class="step-icon">🌿</div>
                    <div class="step-title">
                        <span class="step-number">Step 7</span>
                        <h2>Weed Management</h2>
                    </div>
                </div>
                <div class="step-content">
                    <p>Effective weed control is essential for reducing crop competition and maximizing yield:</p>
                    <ul>
                        <li><strong>Critical Period:</strong> First 30-45 days after sowing is critical for weed control.</li>
                        <li><strong>Manual Weeding:</strong> Perform hand weeding at 20 and 40 days after sowing.</li>
                        <li><strong>Mechanical Weeding:</strong> Use wheel hoe or inter-row cultivation for efficient weed removal.</li>
                        <li><strong>Chemical Control:</strong> Apply pre-emergence herbicides (within 2-3 days of sowing) as recommended.</li>
                        <li><strong>Mulching:</strong> Use organic mulch or plastic mulch to suppress weed growth.</li>
                    </ul>
                    <div class="tip-box">
                        <strong>💡 Pro Tip:</strong> Timely weeding at vegetative stage can increase yield by 20-30%.
                    </div>
                </div>
            </div>

            <!-- Step 8: Harvesting -->
            <div class="procedure-step">
                <div class="step-header">
                    <div class="step-icon">🌾</div>
                    <div class="step-title">
                        <span class="step-number">Step 8</span>
                        <h2>Harvesting & Post-Harvest</h2>
                    </div>
                </div>
                <div class="step-content">
                    <p>Proper harvesting and post-harvest handling ensures maximum returns:</p>
                    <ul>
                        <li><strong>Maturity Signs:</strong> Harvest when 80-90% of pods/grains show maturity signs (color change, hardening).</li>
                        <li><strong>Harvesting Time:</strong> Harvest during morning or evening hours to avoid grain shattering.</li>
                        <li><strong>Method:</strong> Use sickle or mechanical harvester for efficient harvesting.</li>
                        <li><strong>Threshing:</strong> Thresh within 2-3 days of harvesting to prevent grain deterioration.</li>
                        <li><strong>Drying:</strong> Sun-dry the produce to reduce moisture content to 12-14% for safe storage.</li>
                        <li><strong>Storage:</strong> Store in clean, dry, pest-free godowns with proper ventilation.</li>
                        <li><strong>Grading:</strong> Sort and grade the produce for better market price.</li>
                    </ul>
                    <div class="tip-box">
                        <strong>💡 Pro Tip:</strong> Delayed harvesting can result in 10-15% yield loss due to shattering and pest damage.
                    </div>
                </div>
            </div>

            <!-- Expected Yield -->
            <div class="yield-section">
                <h2>📊 Expected Yield & Returns</h2>
                <div class="yield-grid">
                    <div class="yield-card">
                        <h3>Average Yield</h3>
                        <p class="yield-value">25-30</p>
                        <p class="yield-unit">Quintals per Acre</p>
                    </div>
                    <div class="yield-card">
                        <h3>Market Price</h3>
                        <p class="yield-value">₹2,500-3,500</p>
                        <p class="yield-unit">Per Quintal</p>
                    </div>
                    <div class="yield-card">
                        <h3>Cultivation Cost</h3>
                        <p class="yield-value">₹25,000-30,000</p>
                        <p class="yield-unit">Per Acre</p>
                    </div>
                    <div class="yield-card">
                        <h3>Expected Profit</h3>
                        <p class="yield-value">₹40,000-75,000</p>
                        <p class="yield-unit">Per Acre</p>
                    </div>
                </div>
                <p class="yield-note">* Values are approximate and may vary based on region, season, and market conditions</p>
            </div>

            <!-- Additional Resources -->
          
</section>

<?php include 'includes/footer.php'; ?>
