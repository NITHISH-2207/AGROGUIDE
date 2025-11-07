<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact Us | AgroGuide</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    html, body {
      height: 100%;
      margin: 0;
    }
    body {
      display: flex;
      flex-direction: column;
      background: linear-gradient(to right,#eaf8ea 0%, #f9fff9 100%);
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    main {
      flex: 1; /* pushes footer down */
      padding-bottom: 40px;
    }
    h1 {
      text-align: center;
      margin: 30px 0;
      font-weight: bold;
      color: #2e7d32;
    }
    .card {
      border-radius: 15px;
      box-shadow: 0 6px 15px rgba(0,0,0,0.15);
      transition: transform 0.3s;
      height: 100%;
    }
    .card:hover {
      transform: translateY(-6px);
    }
    .btn-custom {
      background: linear-gradient(90deg, #a8e063 0%, #56ab2f 100%);
      color: white;
      border: none;
    }
    .btn-custom:hover {
      background: linear-gradient(90deg, #56ab2f 0%, #a8e063 100%);
      color: white;
    }
    footer {
      background: #2e7d32;
      color: white;
      text-align: center;
      padding: 12px 20px;
      font-size: 0.9rem;
      width: 100vw;
      margin: 0;
      margin-top: 40px;
    }
  </style>
</head>
<body>

<main>
  <div class="container">
    <h1>Contact Us</h1>
    <p class="text-center mb-5">We’d love to hear from you! Reach out to our AgroGuide team for any queries, feedback, or support.</p>

    <div class="row g-4">
      <!-- Contact Form -->
      <div class="col-md-6 d-flex">
        <form class="p-4 bg-white rounded shadow-sm w-100 d-flex flex-column justify-content-between">
          <div>
            <h4 class="mb-3">Send us a Message</h4>
            <div class="mb-3">
              <label class="form-label">Your Name</label>
              <input type="text" class="form-control" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Your Email</label>
              <input type="email" class="form-control" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Message</label>
              <textarea class="form-control" rows="4" required></textarea>
            </div>
          </div>
          <button type="submit" class="btn btn-custom mt-3">Send</button>
        </form>
      </div>

      <!-- Team Info -->
      <div class="col-md-6 d-flex flex-column">
        <h4 class="mb-3">Meet Our Team</h4>
        <div class="row g-3 flex-grow-1">
          <div class="col-12">
            <div class="card p-3">
              <h5>NITHISH S</h5>
              <p>Project Lead & Developer</p>
              <small>Email: nithish@agroguide.com</small>
              <small>Phone: +91 90956 65489</small>
            </div>
          </div>
          <div class="col-12">
            <div class="card p-3">
              <h5>PRATHISHA M</h5>
              <p>Frontend & Database Specialist</p>
              <small>Email: prathish@agroguide.com</small>
              <small>Phone: +91 93654 84561</small>
            </div>
          </div>
          <div class="col-12">
            <div class="card p-3">
              <h5> RAJAMURUGAN V</h5>
              <p>Frontend & UI/UX Designer</p>
              <small>Email: rajamurugan@agroguide.com</small>
              <small>Phone: +91 98456 78451</small>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>

<footer>
  <p class="mb-0">
    © 2025 AgroGuide | Built with <span style="color:#ff4d6d;">❤</span> 
    by NITHISH, PRATHISHA & RAJAMURUGAN
  </p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
