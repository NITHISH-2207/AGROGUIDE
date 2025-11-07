<?php
$page_title = "Suitable Crops - Smart Crop Advisory System";
include 'includes/header.php';

// Get soil type from URL
$soil_type = isset($_GET['soil']) ? htmlspecialchars($_GET['soil']) : 'Unknown';

// Crop data for each soil type (You can replace this with database query later)
$crops_data = [
    'Clay Soil' => [
        ['name' => 'Rice', 'image' => 'rice.jpg', 'season' => 'Kharif', 'duration' => '120-150 days'],
        ['name' => 'Wheat', 'image' => 'wheat.jpg', 'season' => 'Rabi', 'duration' => '110-130 days'],
        ['name' => 'Lettuce', 'image' => 'lettuce.jpg', 'season' => 'Winter', 'duration' => '65-80 days'],
        ['name' => 'Cabbage', 'image' => 'cabbage.jpg', 'season' => 'Winter', 'duration' => '90-120 days'],
        ['name' => 'Broccoli', 'image' => 'brocoli.jpg', 'season' => 'Winter', 'duration' => '70-100 days'],
        ['name' => 'Cauliflower', 'image' => 'cauliflower.jpg', 'season' => 'Winter', 'duration' => '75-100 days'],
    ],
    'Sandy Soil' => [
        ['name' => 'Carrots', 'image' => 'carrot.jpg', 'season' => 'Winter', 'duration' => '70-80 days'],
        ['name' => 'Potatoes', 'image' => 'potato.jpg', 'season' => 'Rabi', 'duration' => '90-120 days'],
        ['name' => 'Watermelon', 'image' => 'watermelon.jpg', 'season' => 'Summer', 'duration' => '80-90 days'],
        ['name' => 'Groundnut', 'image' => 'peanut.jpg', 'season' => 'Kharif', 'duration' => '100-120 days'],
        ['name' => 'Radish', 'image' => 'radish.jpg', 'season' => 'Winter', 'duration' => '25-30 days'],
        ['name' => 'Muskmelon', 'image' => 'muskmelon.jpg', 'season' => 'Summer', 'duration' => '70-90 days'],
    ],
    'Loamy Soil' => [
        ['name' => 'Tomato', 'image' => 'tomato.jpg', 'season' => 'All Season', 'duration' => '60-80 days'],
        ['name' => 'Onion', 'image' => 'onion.jpg', 'season' => 'Rabi', 'duration' => '110-150 days'],
        ['name' => 'Beans', 'image' => 'beans.jpg', 'season' => 'All Season', 'duration' => '50-60 days'],
        ['name' => 'Cucumber', 'image' => 'cucumber.jpg', 'season' => 'Summer', 'duration' => '50-70 days'],
        ['name' => 'Peas', 'image' => 'peas.jpg', 'season' => 'Winter', 'duration' => '60-70 days'],
        ['name' => 'Strawberry', 'image' => 'strawberry.jpg', 'season' => 'Winter', 'duration' => '60-90 days'],
    ],
    'Red Soil' => [
        ['name' => 'Cotton', 'image' => 'cotton.jpeg', 'season' => 'Kharif', 'duration' => '150-180 days'],
        ['name' => 'Pulses', 'image' => 'pulses.jpg', 'season' => 'Rabi', 'duration' => '90-120 days'],
        ['name' => 'Millets', 'image' => 'millet.jpg', 'season' => 'Kharif', 'duration' => '70-100 days'],
        ['name' => 'Groundnut', 'image' => 'peanut.jpg', 'season' => 'Kharif', 'duration' => '100-120 days'],
        ['name' => 'Tobacco', 'image' => 'tobacco.jpg', 'season' => 'Rabi', 'duration' => '120-150 days'],
        ['name' => 'Cashew', 'image' => 'cashew.jpg', 'season' => 'Perennial', 'duration' => '2-3 years'],
    ],
    'Black Soil' => [
        ['name' => 'Cotton', 'image' => 'cotton.jpeg', 'season' => 'Kharif', 'duration' => '150-180 days'],
        ['name' => 'Soybean', 'image' => 'soyabean.jpeg', 'season' => 'Kharif', 'duration' => '90-120 days'],
        ['name' => 'Sunflower', 'image' => 'sunflower.jpg', 'season' => 'Kharif', 'duration' => '80-110 days'],
        ['name' => 'Jowar', 'image' => 'jowar.jpg', 'season' => 'Kharif', 'duration' => '100-120 days'],
        ['name' => 'Wheat', 'image' => 'wheat.jpg', 'season' => 'Rabi', 'duration' => '110-130 days'],
        ['name' => 'Chickpea', 'image' => 'chickpea.jpg', 'season' => 'Rabi', 'duration' => '100-120 days'],
    ],
    'Alluvial Soil' => [
        ['name' => 'Rice', 'image' => 'rice.jpg', 'season' => 'Kharif', 'duration' => '120-150 days'],
        ['name' => 'Wheat', 'image' => 'wheat.jpg', 'season' => 'Rabi', 'duration' => '110-130 days'],
        ['name' => 'Sugarcane', 'image' => 'sugarcane.jpeg', 'season' => 'Annual', 'duration' => '10-12 months'],
        ['name' => 'Maize', 'image' => 'maize.jpg', 'season' => 'Kharif', 'duration' => '80-110 days'],
        ['name' => 'Jute', 'image' => 'jute.jpg', 'season' => 'Kharif', 'duration' => '120-150 days'],
        ['name' => 'Vegetables', 'image' => 'vegetables.jpg', 'season' => 'All Season', 'duration' => '60-90 days'],
    ],
];

$crops = isset($crops_data[$soil_type]) ? $crops_data[$soil_type] : [];
?>

<section class="page-header">
    <div class="container">
        <h1>Crops Suitable for <?php echo $soil_type; ?></h1>
        <p>Select a crop to view detailed cultivation procedures</p>
    </div>
</section>

<section class="content-section">
    <div class="container">
        <?php if (!empty($crops)): ?>
            <div class="crops-grid">
                <?php foreach ($crops as $crop): ?>
                    <div class="crop-card">
                        <div class="crop-image">
                            <img src="assets/images/crops/<?php echo $crop['image']; ?>" 
                                 alt="<?php echo $crop['name']; ?>" 
                                 onerror="this.src='https : //via.placeholder.com/300x200/56ab2f/ffffff?text=<?php echo urlencode($crop['name']); ?>'">
                            <div class="crop-overlay">
                                <span class="season-badge"><?php echo $crop['season']; ?></span>
                            </div>
                        </div>
                        <div class="crop-content">
                            <h3><?php echo $crop['name']; ?></h3>
                            <div class="crop-info">
                                <span class="info-item"> <?php echo $crop['duration']; ?></span>
                                <span class="info-item"> <?php echo $crop['season']; ?></span>
                            </div>
                            <a href="procedure.php?crop=<?php echo urlencode($crop['name']); ?>&soil=<?php echo urlencode($soil_type); ?>" 
                               class="btn btn-small btn-block">View Procedure →</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <div class="no-data">
                <div class="no-data-icon"></div>
                <h2>No crops found for this soil type</h2>
                <p>Please select a valid soil type from the homepage</p>
                <a href="soil.php" class="btn btn-primary">View All Soil Types</a>
            </div>
        <?php endif; ?>

        <div class="back-link">
            <a href="soil.php" class="btn btn-secondary">← Back to Soil Types</a>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
