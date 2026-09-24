<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Planet Wanders Tours & Safaris | Admin & Operations Portal</title>

  <!-- Bootstrap 5.3 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <!-- Chart.js -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.3/dist/chart.umd.min.js"></script>
  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Playfair+Display:ital,wght@0,600;0,700;1,400&display=swap" rel="stylesheet">

  <style>
    :root {
      --pw-savannah: #1b281d;
      --pw-savannah-dark: #121c13;
      --pw-gold: #d89b34;
      --pw-gold-hover: #b87e1a;
      --pw-gold-soft: #fcf4e4;
      --pw-sand: #f8f6f0;
      --pw-olive: #29402c;
      --pw-border: #e6dfd5;
      --pw-sidebar-width: 270px;
    }

    * {
      box-sizing: border-box;
    }

    body {
      font-family: 'Plus Jakarta Sans', sans-serif;
      background-color: var(--pw-sand);
      color: #2b302c;
      overflow-x: hidden;
    }

    .font-serif {
      font-family: 'Playfair Display', serif;
    }

    /* Sidebar Navigation */
    #sidebar-wrapper {
      width: var(--pw-sidebar-width);
      min-height: 100vh;
      background: linear-gradient(180deg, var(--pw-savannah) 0%, var(--pw-savannah-dark) 100%);
      color: #ffffff;
      position: fixed;
      top: 0;
      left: 0;
      z-index: 1040;
      transition: all 0.3s ease-in-out;
      border-right: 1px solid rgba(216, 155, 52, 0.15);
      display: flex;
      flex-direction: column;
    }

    #sidebar-wrapper.collapsed {
      margin-left: calc(-1 * var(--pw-sidebar-width));
    }

    .sidebar-brand {
      padding: 1.4rem 1.4rem;
      border-bottom: 1px solid rgba(255, 255, 255, 0.08);
      display: flex;
      align-items: center;
      gap: 12px;
      text-decoration: none;
    }

    .sidebar-brand .brand-badge {
      width: 42px;
      height: 42px;
      border-radius: 10px;
      background: var(--pw-gold);
      color: #121c13;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 1.3rem;
      font-weight: bold;
    }

    .sidebar-menu {
      padding: 1rem 0;
      flex-grow: 1;
      overflow-y: auto;
    }

    .sidebar-heading {
      padding: 0.6rem 1.5rem 0.3rem;
      font-size: 0.72rem;
      text-transform: uppercase;
      letter-spacing: 1.2px;
      color: rgba(255, 255, 255, 0.45);
      font-weight: 700;
    }

    .sidebar-nav-item {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 0.8rem 1.4rem;
      color: rgba(255, 255, 255, 0.78);
      text-decoration: none;
      font-size: 0.92rem;
      font-weight: 500;
      transition: all 0.2s ease;
      border-left: 4px solid transparent;
      cursor: pointer;
    }

    .sidebar-nav-item i {
      font-size: 1.15rem;
      width: 26px;
    }

    .sidebar-nav-item:hover {
      background-color: rgba(216, 155, 52, 0.12);
      color: #ffffff;
      border-left-color: var(--pw-gold);
    }

    .sidebar-nav-item.active {
      background: rgba(216, 155, 52, 0.18);
      color: var(--pw-gold);
      border-left-color: var(--pw-gold);
      font-weight: 600;
    }

    /* Main Content Wrapper */
    #page-content-wrapper {
      margin-left: var(--pw-sidebar-width);
      transition: all 0.3s ease-in-out;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
    }

    #page-content-wrapper.expanded {
      margin-left: 0;
    }

    /* Header Nav */
    .admin-navbar {
      background-color: #ffffff;
      border-bottom: 1px solid var(--pw-border);
      padding: 0.85rem 1.75rem;
      position: sticky;
      top: 0;
      z-index: 1030;
      box-shadow: 0 2px 10px rgba(0,0,0,0.02);
    }

    /* Cards */
    .card-stat {
      border: 1px solid var(--pw-border);
      background-color: #ffffff;
      border-radius: 16px;
      padding: 1.35rem 1.25rem;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.02);
      transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .card-stat:hover {
      transform: translateY(-3px);
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
    }

    .stat-icon-holder {
      width: 50px;
      height: 50px;
      border-radius: 14px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 1.4rem;
    }

    .dashboard-card {
      border: 1px solid var(--pw-border);
      background: #ffffff;
      border-radius: 16px;
      box-shadow: 0 4px 18px rgba(0, 0, 0, 0.02);
      margin-bottom: 1.6rem;
    }

    .dashboard-card-header {
      padding: 1.25rem 1.4rem;
      border-bottom: 1px solid var(--pw-border);
      background-color: transparent;
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    /* Buttons & Badges */
    .btn-gold {
      background-color: var(--pw-gold);
      color: #121c13;
      font-weight: 600;
      border: none;
      transition: all 0.25s ease;
    }

    .btn-gold:hover {
      background-color: var(--pw-gold-hover);
      color: #ffffff;
      box-shadow: 0 4px 12px rgba(216, 155, 52, 0.35);
    }

    .btn-savannah {
      background-color: var(--pw-savannah);
      color: #ffffff;
      font-weight: 600;
      border: none;
    }

    .btn-savannah:hover {
      background-color: var(--pw-olive);
      color: #ffffff;
    }

    .badge-paid {
      background-color: #d1fae5;
      color: #065f46;
      border: 1px solid #a7f3d0;
    }

    .badge-partial {
      background-color: #fef3c7;
      color: #92400e;
      border: 1px solid #fde68a;
    }

    .badge-pending {
      background-color: #fee2e2;
      color: #991b1b;
      border: 1px solid #fecaca;
    }

    .badge-confirmed {
      background-color: #e0e7ff;
      color: #3730a3;
      border: 1px solid #c7d2fe;
    }

    .badge-in-progress {
      background-color: #fef08a;
      color: #854d0e;
      border: 1px solid #facc15;
    }

    .badge-completed {
      background-color: #ecfdf5;
      color: #047857;
      border: 1px solid #a7f3d0;
    }

    .badge-cancelled {
      background-color: #f3f4f6;
      color: #4b5563;
      border: 1px solid #e5e7eb;
    }

    /* Table styling */
    .table > :not(caption) > * > * {
      padding: 0.95rem 0.9rem;
      vertical-align: middle;
      border-bottom-color: #f0ebe2;
    }

    .table thead th {
      background-color: #fbf9f5;
      font-size: 0.76rem;
      text-transform: uppercase;
      letter-spacing: 0.8px;
      color: #636b64;
      font-weight: 700;
      border-top: none;
    }

    /* Quick status indicators */
    .indicator-dot {
      width: 9px;
      height: 9px;
      border-radius: 50%;
      display: inline-block;
      margin-right: 6px;
    }

    /* Print styling for safari vouchers */
    @media print {
      body * {
        visibility: hidden;
      }
      #printableVoucherArea, #printableVoucherArea * {
        visibility: visible;
      }
      #printableVoucherArea {
        position: absolute;
        left: 0;
        top: 0;
        width: 100%;
        margin: 0;
        padding: 20px;
        background: white;
      }
      .no-print {
        display: none !important;
      }
    }

    @media (max-width: 992px) {
      #sidebar-wrapper {
        margin-left: calc(-1 * var(--pw-sidebar-width));
      }
      #sidebar-wrapper.show-mobile {
        margin-left: 0;
      }
      #page-content-wrapper {
        margin-left: 0;
      }
      .sidebar-backdrop {
        position: fixed;
        top: 0;
        left: 0;
        width: 100vw;
        height: 100vh;
        background: rgba(0, 0, 0, 0.55);
        z-index: 1035;
      }
    }
  </style>
</head>
<body>

  <div id="sidebarBackdrop" class="sidebar-backdrop d-none" onclick="toggleSidebar()"></div>

  <!-- Sidebar -->
  <aside id="sidebar-wrapper">
    <a href="#" class="sidebar-brand">
      <div class="brand-badge"><i class="bi bi-compass"></i></div>
      <div class="text-truncate">
        <h6 class="mb-0 text-white font-serif fw-bold">PLANET WANDERS</h6>
        <small class="text-white-50" style="font-size: 0.72rem; letter-spacing: 1px;">NAROK & NAIROBI OPS</small>
      </div>
    </a>

    <!-- Office Switcher Badge -->
    <div class="px-3 pt-3">
      <div class="bg-black bg-opacity-35 p-2 rounded-3 border border-secondary border-opacity-25 d-flex align-items-center justify-content-between">
        <div class="d-flex align-items-center gap-2">
          <i class="bi bi-geo-alt-fill text-warning"></i>
          <div>
            <div class="text-white-50" style="font-size: 0.68rem; line-height: 1;">ACTIVE STATION</div>
            <strong id="currentOfficeLabel" class="text-white" style="font-size: 0.8rem;">Narok Mara Gateway</strong>
          </div>
        </div>
        <button class="btn btn-outline-light btn-sm py-0 px-1" style="font-size: 0.72rem;" onclick="toggleOfficeStation()" title="Switch Narok / Nairobi">
          Switch
        </button>
      </div>
    </div>

    <!-- Navigation Menu Items -->
    <div class="sidebar-menu">
      <div class="sidebar-heading">Core Operations</div>
      <a class="sidebar-nav-item active" onclick="switchSection('dashboard', this)">
        <span><i class="bi bi-grid-1x2-fill me-2"></i> Dashboard Overview</span>
      </a>
      <a class="sidebar-nav-item" onclick="switchSection('bookings', this)">
        <span><i class="bi bi-journal-bookmark-fill me-2"></i> Safari Bookings</span>
        <span class="badge bg-warning text-dark rounded-pill" id="badgeBookingsCount">8</span>
      </a>
      <a class="sidebar-nav-item" onclick="switchSection('fleet', this)">
        <span><i class="bi bi-truck-front-fill me-2"></i> 4x4 Fleet & Guides</span>
        <span class="badge bg-success rounded-pill">7 Live</span>
      </a>
      <a class="sidebar-nav-item" onclick="switchSection('quotes', this)">
        <span><i class="bi bi-calculator-fill me-2"></i> Safari Quote Builder</span>
      </a>
      <a class="sidebar-nav-item" onclick="switchSection('inquiries', this)">
        <span><i class="bi bi-chat-left-dots-fill me-2"></i> Inquiries & Leads</span>
        <span class="badge bg-danger rounded-pill" id="badgeInquiryCount">4</span>
      </a>

      <div class="sidebar-heading mt-3">Reports & System</div>
      <a class="sidebar-nav-item" onclick="switchSection('financials', this)">
        <span><i class="bi bi-currency-dollar me-2"></i> Revenue & M-Pesa</span>
      </a>
      <a class="sidebar-nav-item" onclick="exportBookingsToCSV()">
        <span><i class="bi bi-file-earmark-spreadsheet me-2"></i> Export Data (CSV)</span>
      </a>
      <a class="sidebar-nav-item" data-bs-toggle="modal" data-bs-target="#adminProfileModal">
        <span><i class="bi bi-person-badge-fill me-2"></i> Station Settings</span>
      </a>
    </div>

    <!-- Sidebar Bottom Status Footer -->
    <div class="p-3 border-top border-secondary border-opacity-25 bg-black bg-opacity-20">
      <div class="d-flex align-items-center gap-2">
        <div class="position-relative">
          <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=80&q=80" class="rounded-circle" width="36" height="36" alt="Duty Manager">
          <span class="position-absolute bottom-0 end-0 bg-success p-1 border border-dark rounded-circle"></span>
        </div>
        <div class="overflow-hidden">
          <div class="text-white text-truncate fw-semibold" style="font-size: 0.84rem;">ole Sankok (Lead Ops)</div>
          <div class="text-white-50" style="font-size: 0.72rem;">Senior Warden / Dispatch</div>
        </div>
      </div>
    </div>
  </aside>

  <div id="page-content-wrapper">
    <!-- Top Header -->
    <header class="admin-navbar d-flex align-items-center justify-content-between">
      <div class="d-flex align-items-center gap-3">
        <button class="btn btn-light border-0 px-2 py-1" onclick="toggleSidebar()" title="Toggle Sidebar">
          <i class="bi bi-list fs-5"></i>
        </button>
        <div class="d-none d-md-flex flex-column">
          <span class="fw-bold text-dark" id="pageTitleText">Dashboard Overview</span>
          <small class="text-muted" style="font-size: 0.74rem;">Planet Wanders Operations Console</small>
        </div>
      </div>

      <!-- Live Clock & Quick Controls -->
      <div class="d-flex align-items-center gap-2 gap-md-3">
        <!-- Nairobi EAT Live Clock -->
        <div class="d-none d-sm-flex align-items-center gap-2 bg-light px-3 py-1 rounded-pill border">
          <i class="bi bi-clock-fill text-warning"></i>
          <span id="liveNairobiClock" class="fw-semibold text-secondary" style="font-size: 0.82rem;">EAT --:--:--</span>
        </div>

        <!-- Currency Switcher Toggle -->
        <div class="btn-group btn-group-sm" role="group">
          <button type="button" class="btn btn-outline-secondary active" id="btnCurrUSD" onclick="setCurrency('USD')">USD ($)</button>
          <button type="button" class="btn btn-outline-secondary" id="btnCurrKES" onclick="setCurrency('KES')">KES (Sh)</button>
        </div>

        <!-- Quick Action Dropdown -->
        <div class="dropdown">
          <button class="btn btn-gold btn-sm d-flex align-items-center gap-1 dropdown-toggle" data-bs-toggle="dropdown">
            <i class="bi bi-plus-circle-fill"></i> <span class="d-none d-md-inline">Quick Action</span>
          </button>
          <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0">
            <li><a class="dropdown-item" href="#" onclick="openNewBookingModal()"><i class="bi bi-calendar-plus text-success me-2"></i>New Safari Booking</a></li>
            <li><a class="dropdown-item" href="#" onclick="switchSection('quotes')"><i class="bi bi-calculator text-warning me-2"></i>Create Custom Quote</a></li>
            <li><a class="dropdown-item" href="#" onclick="switchSection('fleet')"><i class="bi bi-truck text-primary me-2"></i>Assign 4x4 Land Cruiser</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#" onclick="showToast('Dispatch Notification dispatched to Narok Radio Base!', 'info')"><i class="bi bi-broadcast text-danger me-2"></i>Broadcast Ranger Alert</a></li>
          </ul>
        </div>

        <!-- Notification Bell Dropdown -->
        <div class="dropdown">
          <button class="btn btn-light position-relative border rounded-circle p-2" data-bs-toggle="dropdown">
            <i class="bi bi-bell-fill text-secondary"></i>
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size: 0.6rem;">3</span>
          </button>
          <div class="dropdown-menu dropdown-menu-end shadow border-0 p-2" style="width: 310px;">
            <div class="d-flex justify-content-between align-items-center px-2 py-1 border-bottom">
              <span class="fw-bold small">Operational Alerts</span>
              <a href="#" class="text-warning small text-decoration-none" onclick="showToast('All notifications marked as read', 'success')">Mark all read</a>
            </div>
            <div class="list-group list-group-flush small mt-1">
              <a href="#" class="list-group-item list-group-item-action border-0 px-2 py-2">
                <div class="fw-semibold text-danger"><i class="bi bi-exclamation-triangle-fill me-1"></i> Mara River Crossing Busy</div>
                <div class="text-muted" style="font-size: 0.75rem;">Heavy vehicle congregation at Main Mara Crossing Point 4.</div>
              </a>
              <a href="#" class="list-group-item list-group-item-action border-0 px-2 py-2">
                <div class="fw-semibold text-success"><i class="bi bi-credit-card-fill me-1"></i> M-Pesa Payment Received</div>
                <div class="text-muted" style="font-size: 0.75rem;">KES 145,000 received for Booking PWT-2026-089.</div>
              </a>
              <a href="#" class="list-group-item list-group-item-action border-0 px-2 py-2">
                <div class="fw-semibold text-primary"><i class="bi bi-wrench-adjustable me-1"></i> Cruiser KDA 450P Service</div>
                <div class="text-muted" style="font-size: 0.75rem;">Scheduled shock-absorber inspect in Narok garage completed.</div>
              </a>
            </div>
          </div>
        </div>

      </div>
    </header>

    <main class="container-fluid p-3 p-md-4 flex-grow-1">

      <!-- SECTION 1: DASHBOARD OVERVIEW -->
      <section id="section-dashboard">
        <!-- Top Stats Row -->
        <div class="row g-3 mb-4">
          <!-- Stat 1: Total Bookings -->
          <div class="col-sm-6 col-xl-3">
            <div class="card-stat">
              <div class="d-flex align-items-center justify-content-between">
                <div>
                  <span class="text-muted small text-uppercase fw-bold">Active Safari Trips</span>
                  <h3 class="fw-bold text-dark mt-1 mb-0" id="statActiveTrips">8</h3>
                  <small class="text-success fw-semibold"><i class="bi bi-arrow-up-right"></i> +2 starting tomorrow</small>
                </div>
                <div class="stat-icon-holder bg-success bg-opacity-10 text-success">
                  <i class="bi bi-compass"></i>
                </div>
              </div>
            </div>
          </div>

          <!-- Stat 2: Revenue -->
          <div class="col-sm-6 col-xl-3">
            <div class="card-stat">
              <div class="d-flex align-items-center justify-content-between">
                <div>
                  <span class="text-muted small text-uppercase fw-bold">September Revenue</span>
                  <h3 class="fw-bold text-dark mt-1 mb-0" id="statRevenueDisplay">$38,650</h3>
                  <small class="text-success fw-semibold"><i class="bi bi-cash-stack"></i> 78% collected</small>
                </div>
                <div class="stat-icon-holder bg-warning bg-opacity-15 text-warning">
                  <i class="bi bi-coin"></i>
                </div>
              </div>
            </div>
          </div>

          <!-- Stat 3: 4x4 Fleet Live -->
          <div class="col-sm-6 col-xl-3">
            <div class="card-stat">
              <div class="d-flex align-items-center justify-content-between">
                <div>
                  <span class="text-muted small text-uppercase fw-bold">4×4 Cruisers Dispatched</span>
                  <h3 class="fw-bold text-dark mt-1 mb-0">6 / 8</h3>
                  <small class="text-primary fw-semibold"><i class="bi bi-geo-alt"></i> 5 Mara, 1 Amboseli</small>
                </div>
                <div class="stat-icon-holder bg-primary bg-opacity-10 text-primary">
                  <i class="bi bi-truck-front"></i>
                </div>
              </div>
            </div>
          </div>

          <!-- Stat 4: Pending Inquiries -->
          <div class="col-sm-6 col-xl-3">
            <div class="card-stat">
              <div class="d-flex align-items-center justify-content-between">
                <div>
                  <span class="text-muted small text-uppercase fw-bold">New Safari Leads</span>
                  <h3 class="fw-bold text-dark mt-1 mb-0" id="statPendingInquiries">5</h3>
                  <small class="text-danger fw-semibold"><i class="bi bi-whatsapp"></i> 3 via WhatsApp</small>
                </div>
                <div class="stat-icon-holder bg-danger bg-opacity-10 text-danger">
                  <i class="bi bi-chat-heart"></i>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Charts Row -->
        <div class="row g-3 mb-4">
          <!-- Revenue & Bookings Trend -->
          <div class="col-lg-8">
            <div class="dashboard-card h-100 mb-0">
              <div class="dashboard-card-header">
                <div>
                  <h6 class="fw-bold mb-0 text-dark">Safari Booking & Revenue Performance</h6>
                  <small class="text-muted">Quarterly track across High Migration & Green Seasons</small>
                </div>
                <span class="badge bg-light text-dark border">FY 2026/2027</span>
              </div>
              <div class="p-3">
                <canvas id="revenueTrendChart" style="max-height: 280px;"></canvas>
              </div>
            </div>
          </div>

          <!-- Popular Circuits Doughnut -->
          <div class="col-lg-4">
            <div class="dashboard-card h-100 mb-0">
              <div class="dashboard-card-header">
                <div>
                  <h6 class="fw-bold mb-0 text-dark">Destinations Breakdown</h6>
                  <small class="text-muted">Share of booked passenger days</small>
                </div>
              </div>
              <div class="p-3 d-flex flex-column align-items-center">
                <div style="width: 220px; height: 220px;">
                  <canvas id="destinationsPieChart"></canvas>
                </div>
                <div class="w-100 mt-3 pt-2 border-top">
                  <div class="d-flex justify-content-between small text-muted mb-1">
                    <span><i class="bi bi-circle-fill text-success me-1"></i> Maasai Mara</span>
                    <strong>52%</strong>
                  </div>
                  <div class="d-flex justify-content-between small text-muted mb-1">
                    <span><i class="bi bi-circle-fill text-warning me-1"></i> Amboseli & Naivasha</span>
                    <strong>24%</strong>
                  </div>
                  <div class="d-flex justify-content-between small text-muted mb-1">
                    <span><i class="bi bi-circle-fill text-danger me-1"></i> Serengeti (TZ)</span>
                    <strong>14%</strong>
                  </div>
                  <div class="d-flex justify-content-between small text-muted">
                    <span><i class="bi bi-circle-fill text-info me-1"></i> Diani / Watamu Beach</span>
                    <strong>10%</strong>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Recent Safari Departures Quick Table -->
        <div class="dashboard-card">
          <div class="dashboard-card-header">
            <div>
              <h6 class="fw-bold mb-0 text-dark">Imminent Safari Departures (Next 48 Hours)</h6>
              <small class="text-muted">Real-time status of driver briefings and Mara Gate clearance</small>
            </div>
            <button class="btn btn-outline-secondary btn-sm" onclick="switchSection('bookings')">View All Bookings <i class="bi bi-arrow-right ms-1"></i></button>
          </div>
          <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
              <thead>
                <tr>
                  <th>Booking Ref</th>
                  <th>Traveler</th>
                  <th>Safari Package</th>
                  <th>Dates</th>
                  <th>Assigned Vehicle</th>
                  <th>Guide</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody id="quickDeparturesTableBody">
                <!-- Populated dynamically via JS -->
              </tbody>
            </table>
          </div>
        </div>
      </section>

      <!-- SECTION 2: SAFARI BOOKINGS MANAGEMENT -->
      <section id="section-bookings" class="d-none">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
          <div>
            <h4 class="fw-bold text-dark font-serif mb-1">Safari Bookings Master List</h4>
            <p class="text-muted small mb-0">Manage guest rosters, dispatch vouchers, track payments and itineraries.</p>
          </div>
          <div class="d-flex gap-2">
            <button class="btn btn-outline-secondary btn-sm" onclick="exportBookingsToCSV()">
              <i class="bi bi-cloud-arrow-down me-1"></i> Export CSV
            </button>
            <button class="btn btn-gold btn-sm" onclick="openNewBookingModal()">
              <i class="bi bi-plus-lg me-1"></i> New Safari Booking
            </button>
          </div>
        </div>

        <!-- Filter Toolbar -->
        <div class="dashboard-card p-3 mb-3">
          <div class="row g-2 align-items-center">
            <div class="col-md-4">
              <div class="input-group input-group-sm">
                <span class="input-group-text bg-white border-end-0"><i class="bi bi-search text-muted"></i></span>
                <input type="text" class="form-control border-start-0" id="bookingSearchInput" placeholder="Search traveler name, reference, country..." onkeyup="filterBookingsTable()">
              </div>
            </div>
            <div class="col-sm-6 col-md-3">
              <select class="form-select form-select-sm" id="bookingStatusFilter" onchange="filterBookingsTable()">
                <option value="ALL">All Booking Statuses</option>
                <option value="Confirmed">Confirmed</option>
                <option value="In Progress">In Progress</option>
                <option value="Completed">Completed</option>
                <option value="Cancelled">Cancelled</option>
              </select>
            </div>
            <div class="col-sm-6 col-md-3">
              <select class="form-select form-select-sm" id="bookingPaymentFilter" onchange="filterBookingsTable()">
                <option value="ALL">All Payment Statuses</option>
                <option value="Paid">Fully Paid</option>
                <option value="Partial">Partial Deposit</option>
                <option value="Pending">Payment Pending</option>
              </select>
            </div>
            <div class="col-md-2 text-end">
              <button class="btn btn-light btn-sm border w-100" onclick="resetBookingFilters()">
                <i class="bi bi-arrow-clockwise me-1"></i> Reset
              </button>
            </div>
          </div>
        </div>

        <!-- Master Table -->
        <div class="dashboard-card">
          <div class="table-responsive">
            <table class="table table-hover align-middle mb-0" id="masterBookingsTable">
              <thead>
                <tr>
                  <th>Reference</th>
                  <th>Lead Traveler</th>
                  <th>Itinerary / Route</th>
                  <th>Dates & Pax</th>
                  <th>4x4 Vehicle</th>
                  <th>Driver Guide</th>
                  <th>Amount</th>
                  <th>Payment</th>
                  <th>Status</th>
                  <th class="text-end">Actions</th>
                </tr>
              </thead>
              <tbody id="masterBookingsTableBody">
                <!-- Rendered dynamically -->
              </tbody>
            </table>
          </div>
        </div>
      </section>

      <!-- SECTION 3: FLEET & GUIDES DISPATCH BOARD -->
      <section id="section-fleet" class="d-none">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
          <div>
            <h4 class="fw-bold text-dark font-serif mb-1">4×4 Fleet & Guide Dispatch Board</h4>
            <p class="text-muted small mb-0">Real-time status of Planet Wanders customized Land Cruisers and KPSGA certified safari guides.</p>
          </div>
          <button class="btn btn-gold btn-sm" onclick="showToast('Maintenance schedule synced with Narok mechanical depot!', 'success')">
            <i class="bi bi-wrench-adjustable me-1"></i> Sync Vehicle Depot
          </button>
        </div>

        <!-- Vehicles Grid -->
        <h6 class="fw-bold text-dark mb-3"><i class="bi bi-truck-front text-warning me-2"></i> Custom Safari Vehicle Fleet</h6>
        <div class="row g-3 mb-4" id="fleetCardsContainer">
          <!-- Populated by JS -->
        </div>

        <!-- Guides Roster Table -->
        <div class="dashboard-card">
          <div class="dashboard-card-header">
            <div>
              <h6 class="fw-bold mb-0 text-dark"><i class="bi bi-person-badge-fill text-success me-2"></i> Professional Guides Roster (Narok & Nairobi Hubs)</h6>
              <small class="text-muted">KPSGA (Kenya Professional Safari Guides Association) licensed naturalists</small>
            </div>
            <button class="btn btn-outline-secondary btn-sm" onclick="showNewGuideModal()"><i class="bi bi-plus-circle me-1"></i> Register Guide</button>
          </div>
          <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
              <thead>
                <tr>
                  <th>Guide Name & Photo</th>
                  <th>KPSGA Certification</th>
                  <th>Languages Spoken</th>
                  <th>Specialty Track</th>
                  <th>Base Station</th>
                  <th>Current Status</th>
                  <th class="text-end">Action</th>
                </tr>
              </thead>
              <tbody id="guidesTableBody">
                <!-- Rendered by JS -->
              </tbody>
            </table>
          </div>
        </div>
      </section>

      <!-- SECTION 4: SAFARI QUOTE BUILDER -->
      <section id="section-quotes" class="d-none">
        <div class="row g-4">
          <div class="col-lg-7">
            <div class="dashboard-card">
              <div class="dashboard-card-header bg-light">
                <h5 class="fw-bold mb-0 text-dark"><i class="bi bi-calculator text-warning me-2"></i> Custom Safari Cost Estimator</h5>
                <span class="badge bg-dark">Narok Office Pricing Engine</span>
              </div>
              <div class="p-4">
                <div class="row g-3">
                  <!-- Destination Circuit -->
                  <div class="col-md-6">
                    <label class="form-label small fw-bold">Primary Safari Circuit</label>
                    <select class="form-select form-select-sm" id="builderDest" onchange="runQuoteEngine()">
                      <option value="mara-classic" data-parkfee="100">3D/2N Masai Mara Classic</option>
                      <option value="mara-migration" data-parkfee="120" selected>4D/3N Masai Mara Migration Exclusive</option>
                      <option value="amboseli-naivasha" data-parkfee="90">4D/3N Amboseli & Lake Naivasha</option>
                      <option value="serengeti-ngorongoro" data-parkfee="150">5D/4N Serengeti & Ngorongoro (TZ)</option>
                      <option value="bush-beach" data-parkfee="110">7D/6N Masai Mara & Diani Beach Combo</option>
                    </select>
                  </div>

                  <!-- Vehicle Choice -->
                  <div class="col-md-6">
                    <label class="form-label small fw-bold">Safari Vehicle Selection</label>
                    <select class="form-select form-select-sm" id="builderVehicle" onchange="runQuoteEngine()">
                      <option value="cruiser" data-perday="220" selected>Custom 4x4 Land Cruiser (Pop-up Roof)</option>
                      <option value="minivan" data-perday="130">Safari Tour Minivan (Pop-up Roof)</option>
                    </select>
                  </div>

                  <!-- Days & Pax -->
                  <div class="col-sm-4">
                    <label class="form-label small fw-bold">Duration (Days)</label>
                    <input type="number" class="form-control form-control-sm" id="builderDays" value="4" min="1" max="21" onchange="runQuoteEngine()">
                  </div>
                  <div class="col-sm-4">
                    <label class="form-label small fw-bold">Adult Travelers</label>
                    <input type="number" class="form-control form-control-sm" id="builderAdults" value="2" min="1" max="14" onchange="runQuoteEngine()">
                  </div>
                  <div class="col-sm-4">
                    <label class="form-label small fw-bold">Children (Under 12)</label>
                    <input type="number" class="form-control form-control-sm" id="builderKids" value="0" min="0" max="6" onchange="runQuoteEngine()">
                  </div>

                  <!-- Accommodation Category -->
                  <div class="col-md-6">
                    <label class="form-label small fw-bold">Camp / Lodge Tier</label>
                    <select class="form-select form-select-sm" id="builderTier" onchange="runQuoteEngine()">
                      <option value="budget" data-rate="85">Adventure Budget Camp ($85/person/night)</option>
                      <option value="midrange" data-rate="185" selected>Mid-Range Tented Safari Lodge ($185/p/n)</option>
                      <option value="luxury" data-rate="360">Luxury 5-Star Mara Bush Camp ($360/p/n)</option>
                    </select>
                  </div>

                  <!-- Pickup Hub -->
                  <div class="col-md-6">
                    <label class="form-label small fw-bold">Departure / Pickup Point</label>
                    <select class="form-select form-select-sm" id="builderPickup">
                      <option value="Narok Town Office (Highway Hub)">Narok Town Office (Direct Mara Gate)</option>
                      <option value="Nairobi JKIA / Wilson Airport" selected>Nairobi JKIA / Wilson Airport</option>
                      <option value="Nairobi City Hotel Pickup">Nairobi City Hotel Pickup</option>
                    </select>
                  </div>

                  <!-- Optional Add-ons -->
                  <div class="col-12 mt-3 pt-2 border-top">
                    <label class="form-label small fw-bold d-block text-secondary">Optional Safari Add-Ons:</label>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="checkbox" id="addBalloon" onchange="runQuoteEngine()">
                      <label class="form-check-label small" for="addBalloon">Hot Air Balloon Flight (+$450/pax)</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="checkbox" id="addVillage" onchange="runQuoteEngine()" checked>
                      <label class="form-check-label small" for="addVillage">Maasai Cultural Village Visit (+$30/pax)</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="checkbox" id="addBushDinner" onchange="runQuoteEngine()">
                      <label class="form-check-label small" for="addBushDinner">Private Sunset Bush Sundowner (+$60/pax)</label>
                    </div>
                  </div>

                  <div class="col-12">
                    <label class="form-label small fw-bold">Client / Inquirer Name</label>
                    <input type="text" class="form-control form-control-sm" id="builderClientName" placeholder="e.g. Dr. Arthur & Family">
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Quote Output Card -->
          <div class="col-lg-5">
            <div class="dashboard-card bg-white h-100 d-flex flex-column">
              <div class="dashboard-card-header bg-dark text-white">
                <h6 class="fw-bold mb-0 text-warning"><i class="bi bi-file-earmark-text me-2"></i> Generated Quote Summary</h6>
                <span class="badge bg-warning text-dark">Live Estimate</span>
              </div>
              <div class="p-4 flex-grow-1">
                <div class="text-center p-3 mb-3 bg-light rounded-3 border">
                  <div class="text-muted small text-uppercase">Total Estimated Cost</div>
                  <h2 class="display-6 fw-bold text-dark mb-0" id="quoteTotalDisplay">$2,450</h2>
                  <div class="text-secondary small" id="quotePerPaxDisplay">Approx. $1,225 per adult</div>
                </div>

                <div class="small">
                  <div class="d-flex justify-content-between py-1 border-bottom">
                    <span class="text-muted">4x4 Vehicle & Fuel:</span>
                    <strong id="quoteVehicleCost">$880</strong>
                  </div>
                  <div class="d-flex justify-content-between py-1 border-bottom">
                    <span class="text-muted">Park Fees & Conservation:</span>
                    <strong id="quoteParkCost">$960</strong>
                  </div>
                  <div class="d-flex justify-content-between py-1 border-bottom">
                    <span class="text-muted">Lodge / Meals (Full Board):</span>
                    <strong id="quoteLodgeCost">$1,110</strong>
                  </div>
                  <div class="d-flex justify-content-between py-1 border-bottom">
                    <span class="text-muted">Included Add-ons:</span>
                    <strong id="quoteAddonsCost">$60</strong>
                  </div>
                </div>

                <!-- Formatted WhatsApp Message Preview Box -->
                <div class="mt-3">
                  <label class="small fw-bold text-muted">Formatted WhatsApp / Email Proposal</label>
                  <textarea class="form-control form-control-sm bg-light text-monospace" id="quoteTextPreview" rows="6" readonly></textarea>
                </div>
              </div>

              <div class="p-3 bg-light border-top d-flex gap-2">
                <button class="btn btn-outline-secondary btn-sm flex-grow-1" onclick="copyQuoteToClipboard()">
                  <i class="bi bi-clipboard me-1"></i> Copy Proposal
                </button>
                <button class="btn btn-success btn-sm flex-grow-1 text-white" onclick="sendQuoteViaWhatsApp()">
                  <i class="bi bi-whatsapp me-1"></i> Send to WhatsApp
                </button>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- SECTION 5: INQUIRIES & LEADS -->
      <section id="section-inquiries" class="d-none">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
          <div>
            <h4 class="fw-bold text-dark font-serif mb-1">Safari Leads & Calculator Submissions</h4>
            <p class="text-muted small mb-0">Incoming travelers from website calculator, WhatsApp queries, and Narok drop-ins.</p>
          </div>
          <button class="btn btn-gold btn-sm" onclick="openNewInquiryModal()">
            <i class="bi bi-plus-lg me-1"></i> Record New Lead
          </button>
        </div>

        <div class="dashboard-card">
          <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
              <thead>
                <tr>
                  <th>Lead ID</th>
                  <th>Prospect Name</th>
                  <th>Contact Channel</th>
                  <th>Desired Safari</th>
                  <th>Dates & Pax</th>
                  <th>Source</th>
                  <th>Status</th>
                  <th class="text-end">Action</th>
                </tr>
              </thead>
              <tbody id="inquiriesTableBody">
                <!-- Rendered by JS -->
              </tbody>
            </table>
          </div>
        </div>
      </section>

      <!-- SECTION 6: FINANCIALS & REVENUE -->
      <section id="section-financials" class="d-none">
        <div class="row g-3 mb-4">
          <div class="col-md-4">
            <div class="card-stat">
              <span class="text-muted small text-uppercase fw-bold">M-Pesa Till & Paybill Inflow</span>
              <h3 class="fw-bold text-success mt-1 mb-0" id="finMpesaTotal">KES 2,480,000</h3>
              <small class="text-muted">Direct Mobile collections this month</small>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card-stat">
              <span class="text-muted small text-uppercase fw-bold">Bank Wire & Visa / Card</span>
              <h3 class="fw-bold text-primary mt-1 mb-0" id="finWireTotal">$21,450</h3>
              <small class="text-muted">Overseas SWIFT transfers verified</small>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card-stat">
              <span class="text-muted small text-uppercase fw-bold">Pending Outstanding Balances</span>
              <h3 class="fw-bold text-danger mt-1 mb-0" id="finPendingTotal">$6,200</h3>
              <small class="text-muted">Payable on Narok or Nairobi arrival</small>
            </div>
          </div>
        </div>

        <div class="dashboard-card">
          <div class="dashboard-card-header">
            <h6 class="fw-bold mb-0 text-dark"><i class="bi bi-receipt text-warning me-2"></i> Recent Payment Transactions</h6>
            <button class="btn btn-outline-secondary btn-sm" onclick="showToast('Payment statement exported', 'info')"><i class="bi bi-file-earmark-pdf me-1"></i> Statement</button>
          </div>
          <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
              <thead>
                <tr>
                  <th>Trans ID</th>
                  <th>Booking Ref</th>
                  <th>Payer</th>
                  <th>Channel</th>
                  <th>Amount</th>
                  <th>Receipt / Reference</th>
                  <th>Timestamp</th>
                  <th>Audit Status</th>
                </tr>
              </thead>
              <tbody id="financialsTableBody">
                <!-- Populated dynamically -->
              </tbody>
            </table>
          </div>
        </div>
      </section>

    </main>
  </div>


  <!-- MODAL: ADD / EDIT BOOKING -->
  <div class="modal fade" id="bookingFormModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content rounded-4 border-0 shadow">
        <div class="modal-header bg-dark text-white rounded-top-4">
          <h5 class="modal-title font-serif" id="bookingModalTitle"><i class="bi bi-journal-plus text-warning me-2"></i> Create Safari Booking</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
        </div>
        <form id="bookingModalForm" onsubmit="handleSaveBooking(event)">
          <div class="modal-body p-4">
            <input type="hidden" id="modalBookingId">
            <div class="row g-3">
              <div class="col-md-6">
                <label class="form-label small fw-bold">Lead Traveler Name *</label>
                <input type="text" class="form-control" id="modalLeadName" required placeholder="e.g. Charlotte & Oliver Bennett">
              </div>
              <div class="col-md-6">
                <label class="form-label small fw-bold">Country of Origin *</label>
                <input type="text" class="form-control" id="modalCountry" required placeholder="e.g. United Kingdom">
              </div>

              <div class="col-md-6">
                <label class="form-label small fw-bold">Safari Package / Route *</label>
                <select class="form-select" id="modalPackage" required>
                  <option value="3-Day Masai Mara Wildebeest Safari">3-Day Masai Mara Wildebeest Safari</option>
                  <option value="4-Day Amboseli Giant Tuskers & Naivasha">4-Day Amboseli Giant Tuskers & Naivasha</option>
                  <option value="5-Day Endless Serengeti & Ngorongoro">5-Day Endless Serengeti & Ngorongoro (TZ)</option>
                  <option value="7-Day Bush to Beach (Mara + Diani)">7-Day Bush to Beach (Mara + Diani)</option>
                  <option value="6-Day Romantic Mara Honeymoon Special">6-Day Romantic Mara Honeymoon Special</option>
                  <option value="Custom Kenya Wildlife Expedition">Custom Kenya Wildlife Expedition</option>
                </select>
              </div>

              <div class="col-md-3">
                <label class="form-label small fw-bold">Start Date *</label>
                <input type="date" class="form-control" id="modalStartDate" required>
              </div>
              <div class="col-md-3">
                <label class="form-label small fw-bold">End Date *</label>
                <input type="date" class="form-control" id="modalEndDate" required>
              </div>

              <div class="col-sm-4">
                <label class="form-label small fw-bold">Adults *</label>
                <input type="number" class="form-control" id="modalAdults" value="2" min="1" max="20" required>
              </div>
              <div class="col-sm-4">
                <label class="form-label small fw-bold">Kids</label>
                <input type="number" class="form-control" id="modalKids" value="0" min="0" max="10">
              </div>
              <div class="col-sm-4">
                <label class="form-label small fw-bold">Total Price ($ USD) *</label>
                <input type="number" class="form-control" id="modalPrice" required placeholder="e.g. 1350">
              </div>

              <div class="col-md-6">
                <label class="form-label small fw-bold">Assigned 4x4 Cruiser</label>
                <select class="form-select" id="modalVehicle">
                  <option value="4x4 Land Cruiser KDA 450P (Extended)">4x4 Land Cruiser KDA 450P (Extended)</option>
                  <option value="4x4 Land Cruiser KDD 892M (Custom High-Lift)">4x4 Land Cruiser KDD 892M (Custom High-Lift)</option>
                  <option value="4x4 Land Cruiser KDB 114Q (Photography Roof)">4x4 Land Cruiser KDB 114Q (Photography Roof)</option>
                  <option value="4x4 Land Cruiser KDG 776T (Heavy Duty)">4x4 Land Cruiser KDG 776T (Heavy Duty)</option>
                  <option value="Safari Minivan KCA 319S (Budget)">Safari Minivan KCA 319S (Budget)</option>
                  <option value="Pending Allocation">Pending Allocation</option>
                </select>
              </div>

              <div class="col-md-6">
                <label class="form-label small fw-bold">Driver / Naturalist Guide</label>
                <select class="form-select" id="modalGuide">
                  <option value="David ole Ntutu (Silver KPSGA)">David ole Ntutu (Silver KPSGA)</option>
                  <option value="Peter ole Kiptoo (Bronze KPSGA)">Peter ole Kiptoo (Bronze KPSGA)</option>
                  <option value="Moses Sankale (Gold KPSGA)">Moses Sankale (Gold KPSGA)</option>
                  <option value="Josephat Lemayian (Silver KPSGA)">Josephat Lemayian (Silver KPSGA)</option>
                  <option value="Alice Naserian (Bird Specialist)">Alice Naserian (Bird Specialist)</option>
                  <option value="Unassigned">Unassigned</option>
                </select>
              </div>

              <div class="col-md-6">
                <label class="form-label small fw-bold">Payment Status *</label>
                <select class="form-select" id="modalPaymentStatus" required>
                  <option value="Paid">Fully Paid (100%)</option>
                  <option value="Partial">Partial Deposit (50%)</option>
                  <option value="Pending">Payment Pending</option>
                </select>
              </div>

              <div class="col-md-6">
                <label class="form-label small fw-bold">Trip Status *</label>
                <select class="form-select" id="modalTripStatus" required>
                  <option value="Confirmed">Confirmed</option>
                  <option value="In Progress">In Progress (On Safari)</option>
                  <option value="Completed">Completed</option>
                  <option value="Cancelled">Cancelled</option>
                </select>
              </div>

              <div class="col-12">
                <label class="form-label small fw-bold">Special Requests / Dietary / Gate Entry Pass Notes</label>
                <textarea class="form-control" id="modalNotes" rows="2" placeholder="Vegetarian, birthday cake in camp, wheelchair assistance at airport..."></textarea>
              </div>
            </div>
          </div>
          <div class="modal-footer bg-light rounded-bottom-4">
            <button type="button" class="btn btn-secondary btn-sm rounded-pill px-3" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-gold btn-sm rounded-pill px-4">Save Booking Record</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- MODAL: PRINTABLE SAFARI VOUCHER & DOSSIER -->
  <div class="modal fade" id="voucherModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content rounded-4 border-0 shadow">
        <div class="modal-header bg-dark text-white rounded-top-4 no-print">
          <h5 class="modal-title font-serif"><i class="bi bi-file-earmark-check text-warning me-2"></i> Official Safari Voucher & Gate Pass</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body p-4 p-md-5" id="printableVoucherArea">
          <!-- Populated by JS -->
        </div>
        <div class="modal-footer bg-light rounded-bottom-4 no-print">
          <button type="button" class="btn btn-secondary btn-sm rounded-pill px-3" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-dark btn-sm rounded-pill px-4" onclick="window.print()">
            <i class="bi bi-printer me-1"></i> Print Safari Voucher
          </button>
        </div>
      </div>
    </div>
  </div>

  <!-- MODAL: NEW INQUIRY -->
  <div class="modal fade" id="inquiryFormModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content rounded-4 border-0 shadow">
        <div class="modal-header bg-dark text-white rounded-top-4">
          <h5 class="modal-title font-serif"><i class="bi bi-chat-plus text-warning me-2"></i> Log New Safari Lead</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
        </div>
        <form id="inquiryModalForm" onsubmit="handleSaveInquiry(event)">
          <div class="modal-body p-4">
            <div class="mb-3">
              <label class="form-label small fw-bold">Prospect Name *</label>
              <input type="text" class="form-control" id="inqName" required placeholder="e.g. Maria Gonzalez">
            </div>
            <div class="row g-2 mb-3">
              <div class="col-md-6">
                <label class="form-label small fw-bold">Phone / WhatsApp *</label>
                <input type="text" class="form-control" id="inqPhone" required placeholder="+34 612 345 678">
              </div>
              <div class="col-md-6">
                <label class="form-label small fw-bold">Source Channel</label>
                <select class="form-select" id="inqSource">
                  <option value="WhatsApp Direct">WhatsApp Direct</option>
                  <option value="Website Calculator">Website Calculator</option>
                  <option value="Narok Office Walk-in">Narok Office Walk-in</option>
                  <option value="Nairobi Desk">Nairobi Desk</option>
                </select>
              </div>
            </div>
            <div class="mb-3">
              <label class="form-label small fw-bold">Destination Interest</label>
              <input type="text" class="form-control" id="inqDest" placeholder="e.g. 3-Day Mara wildebeest crossing" required>
            </div>
            <div class="mb-3">
              <label class="form-label small fw-bold">Travel Month / Group Size</label>
              <input type="text" class="form-control" id="inqDatesPax" placeholder="e.g. October 2026, 2 Adults">
            </div>
          </div>
          <div class="modal-footer bg-light rounded-bottom-4">
            <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-gold btn-sm">Save Lead</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- MODAL: ADMIN / STATION PROFILE SETTINGS -->
  <div class="modal fade" id="adminProfileModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content rounded-4 border-0 shadow">
        <div class="modal-header bg-dark text-white rounded-top-4">
          <h5 class="modal-title font-serif"><i class="bi bi-gear-fill text-warning me-2"></i> Operations Station Settings</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body p-4">
          <div class="text-center mb-3">
            <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=140&q=80" class="rounded-circle border border-warning p-1" width="70" height="70" alt="Avatar">
            <h6 class="fw-bold mt-2 mb-0">ole Sankok (Lead Operations)</h6>
            <small class="text-muted">Planet Wanders Tours & Safaris Ltd.</small>
          </div>
          <div class="mb-3">
            <label class="form-label small fw-bold">Current Active Station</label>
            <select class="form-select form-select-sm" id="stationSettingSelect" onchange="changeStationFromSelect(this.value)">
              <option value="Narok Mara Gateway">Narok Town HQ (Mara Gate Gateway)</option>
              <option value="Nairobi Hub (JKIA Transfers)">Nairobi Hub (JKIA & Wilson Airport)</option>
            </select>
          </div>
          <div class="mb-3">
            <label class="form-label small fw-bold">M-Pesa Business Till Number</label>
            <input type="text" class="form-control form-control-sm" value="542890 (Planet Wanders Narok)" readonly>
          </div>
          <div class="mb-3">
            <label class="form-label small fw-bold">VHF High Frequency Radio Channel</label>
            <input type="text" class="form-control form-control-sm" value="Ch 14 - Mara Triangle & Sekenani Relay" readonly>
          </div>
        </div>
        <div class="modal-footer bg-light rounded-bottom-4">
          <button type="button" class="btn btn-gold btn-sm rounded-pill px-4" data-bs-dismiss="modal">Close Settings</button>
        </div>
      </div>
    </div>
  </div>

  <!-- TOAST CONTAINER FOR NOTIFICATIONS -->
  <div class="toast-container position-fixed bottom-0 end-0 p-3" style="z-index: 1090;">
    <div id="actionToast" class="toast align-items-center text-white border-0 rounded-3 shadow" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="d-flex">
        <div class="toast-body d-flex align-items-center gap-2" id="toastMessage">
          <!-- Text inserted via JS -->
        </div>
        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
      </div>
    </div>
  </div>

  <!-- Bootstrap 5.3 JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  <script>
    /* =========================================================================
       PLANET WANDERS TOURS - STATE MANAGEMENT & MOCK DATA
       ========================================================================= */
    let currentCurrency = 'USD';
    const exchangeRateUSDToKES = 132.5; // Realistic KES rate

    // Master Safari Bookings
    let bookingsData = [
      {
        id: "PWT-2026-089",
        leadName: "Eleanor & Liam Brooks",
        country: "United Kingdom",
        package: "3-Day Masai Mara Wildebeest Safari",
        startDate: "2026-09-25",
        endDate: "2026-09-27",
        adults: 2,
        kids: 0,
        vehicle: "4x4 Land Cruiser KDA 450P (Extended)",
        guide: "David ole Ntutu (Silver KPSGA)",
        priceUSD: 950,
        paymentStatus: "Paid",
        tripStatus: "In Progress",
        notes: "Anniversary surprise bush breakfast included. Vegetarian diet."
      },
      {
        id: "PWT-2026-090",
        leadName: "Klaus & Greta Schneider",
        country: "Germany",
        package: "5-Day Endless Serengeti & Ngorongoro",
        startDate: "2026-09-28",
        endDate: "2026-10-02",
        adults: 2,
        kids: 0,
        vehicle: "4x4 Land Cruiser KDD 892M (Custom High-Lift)",
        guide: "Moses Sankale (Gold KPSGA)",
        priceUSD: 1960,
        paymentStatus: "Paid",
        tripStatus: "Confirmed",
        notes: "Heavy photography gear. Requires side beanbags."
      },
      {
        id: "PWT-2026-091",
        leadName: "The O'Connor Family",
        country: "Ireland",
        package: "4-Day Amboseli Giant Tuskers & Naivasha",
        startDate: "2026-09-26",
        endDate: "2026-09-29",
        adults: 2,
        kids: 2,
        vehicle: "4x4 Land Cruiser KDB 114Q (Photography Roof)",
        guide: "Peter ole Kiptoo (Bronze KPSGA)",
        priceUSD: 1680,
        paymentStatus: "Partial",
        tripStatus: "Confirmed",
        notes: "Balance payable upon arrival in Nairobi."
      },
      {
        id: "PWT-2026-092",
        leadName: "Dr. Kenji & Yoko Tanaka",
        country: "Japan",
        package: "7-Day Bush to Beach (Mara + Diani)",
        startDate: "2026-10-05",
        endDate: "2026-10-11",
        adults: 2,
        kids: 0,
        vehicle: "4x4 Land Cruiser KDG 776T (Heavy Duty)",
        guide: "Josephat Lemayian (Silver KPSGA)",
        priceUSD: 2300,
        paymentStatus: "Paid",
        tripStatus: "Confirmed",
        notes: "Domestic flight to Ukunda airstrip confirmed."
      },
      {
        id: "PWT-2026-093",
        leadName: "Antoine Dubois & Colleague",
        country: "France",
        package: "3-Day Masai Mara Wildebeest Safari",
        startDate: "2026-09-24",
        endDate: "2026-09-26",
        adults: 2,
        kids: 0,
        vehicle: "Safari Minivan KCA 319S (Budget)",
        guide: "Alice Naserian (Bird Specialist)",
        priceUSD: 780,
        paymentStatus: "Paid",
        tripStatus: "In Progress",
        notes: "French-speaking guide requested. Arrived via Narok."
      },
      {
        id: "PWT-2026-094",
        leadName: "Mateo & Camila Rossi",
        country: "Italy",
        package: "6-Day Romantic Mara Honeymoon Special",
        startDate: "2026-10-12",
        endDate: "2026-10-17",
        adults: 2,
        kids: 0,
        vehicle: "4x4 Land Cruiser KDA 450P (Extended)",
        guide: "Moses Sankale (Gold KPSGA)",
        priceUSD: 2840,
        paymentStatus: "Partial",
        tripStatus: "Confirmed",
        notes: "Hot air balloon safari voucher issued."
      },
      {
        id: "PWT-2026-095",
        leadName: "Brett & Jessica Miller",
        country: "United States",
        package: "3-Day Masai Mara Wildebeest Safari",
        startDate: "2026-09-18",
        endDate: "2026-09-20",
        adults: 3,
        kids: 0,
        vehicle: "4x4 Land Cruiser KDB 114Q (Photography Roof)",
        guide: "David ole Ntutu (Silver KPSGA)",
        priceUSD: 1350,
        paymentStatus: "Paid",
        tripStatus: "Completed",
        notes: "Left 5-star review on TripAdvisor."
      },
      {
        id: "PWT-2026-096",
        leadName: "Raj & Priya Sharma",
        country: "India",
        package: "4-Day Amboseli Giant Tuskers & Naivasha",
        startDate: "2026-10-02",
        endDate: "2026-10-05",
        adults: 4,
        kids: 1,
        vehicle: "4x4 Land Cruiser KDD 892M (Custom High-Lift)",
        guide: "Peter ole Kiptoo (Bronze KPSGA)",
        priceUSD: 2450,
        paymentStatus: "Pending",
        tripStatus: "Confirmed",
        notes: "Strict pure vegetarian food required in Mara camp."
      }
    ];

    // Vehicles Fleet Data
    let fleetData = [
      { plate: "KDA 450P", model: "Toyota Land Cruiser HZJ78", seats: "7 Pax Extended", popRoof: "Full Dual-Hatch", status: "On Safari", guide: "David ole Ntutu", fuel: "90%", location: "Maasai Mara (Talek)" },
      { plate: "KDD 892M", model: "Toyota Land Cruiser HZJ79", seats: "6 Pax Custom", popRoof: "High-Lift Acrylic", status: "Available", guide: "Standby Narok", fuel: "100%", location: "Narok Town Garage" },
      { plate: "KDB 114Q", model: "Toyota Land Cruiser HZJ76", seats: "7 Pax Extended", popRoof: "360° Photo Hatch", status: "On Safari", guide: "Peter ole Kiptoo", fuel: "75%", location: "Amboseli (Kibo)" },
      { plate: "KDG 776T", model: "Toyota Land Cruiser Heavy", seats: "8 Pax Long Wheel", popRoof: "Full Dual-Hatch", status: "Maintenance", guide: "Depot Check", fuel: "50%", location: "Nairobi Workshop" },
      { plate: "KCA 319S", model: "Toyota HiAce 4WD Safari", seats: "7 Pax Standard", popRoof: "Single Hatch", status: "On Safari", guide: "Alice Naserian", fuel: "80%", location: "Maasai Mara (Sekenani)" },
      { plate: "KCW 502B", model: "Toyota Land Cruiser V8", seats: "5 Pax VIP Luxury", popRoof: "Panoramic Glass", status: "Available", guide: "Standby Nairobi", fuel: "95%", location: "Nairobi Hub" }
    ];

    // Guides Data
    let guidesData = [
      { name: "David ole Ntutu", cert: "Silver Level KPSGA", langs: "English, Swahili, Maa", specialty: "Big Cat Tracking & Mara Habitat", station: "Narok Mara Gate", status: "On Safari", avatar: "https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=100&q=80" },
      { name: "Moses Sankale", cert: "Gold Level KPSGA", langs: "English, French, Maa", specialty: "Serengeti Migration & Predator Behavior", station: "Narok Mara Gate", status: "Available in Narok", avatar: "https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=100&q=80" },
      { name: "Peter ole Kiptoo", cert: "Bronze Level KPSGA", langs: "English, Swahili", specialty: "Amboseli Elephants & Rift Valley Birds", station: "Nairobi Hub", status: "On Safari", avatar: "https://images.unsplash.com/photo-1492562080023-ab3db95bfbce?auto=format&fit=crop&w=100&q=80" },
      { name: "Alice Naserian", cert: "Silver Level KPSGA", langs: "English, Spanish, Maa", specialty: "Ornithology (Birds) & Botany", station: "Narok Mara Gate", status: "On Safari", avatar: "https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=100&q=80" },
      { name: "Josephat Lemayian", cert: "Silver Level KPSGA", langs: "English, German, Swahili", specialty: "Cultural Ecology & Photo Safaris", station: "Nairobi Hub", status: "Available in Narok", avatar: "https://images.unsplash.com/photo-1522075469751-3a6694fb2f61?auto=format&fit=crop&w=100&q=80" }
    ];

    // Inquiries Data
    let inquiriesData = [
      { id: "INQ-401", name: "Hans Zimmer Group", contact: "+49 171 889201", dest: "4-Day Maasai Mara Photographic Safari", datesPax: "Mid Nov 2026 • 4 Adults", source: "WhatsApp Direct", status: "New" },
      { id: "INQ-402", name: "Rachel Adams", contact: "rachel.adams@nyu.edu", dest: "Educational Ecology & Rhino Sanctuary", datesPax: "Dec 2026 • 8 Students", source: "Website Calculator", status: "Quoted" },
      { id: "INQ-403", name: "Sergio Hernandez", contact: "+34 650 918233", dest: "6-Day Honeymoon Bush & Watamu Coral", datesPax: "Jan 2027 • 2 Pax", source: "WhatsApp Direct", status: "New" },
      { id: "INQ-404", name: "Kenyan Corporates (Equity Bank)", contact: "+254 722 109844", dest: "Narok Weekend Team Retreat", datesPax: "Next Weekend • 14 Staff", source: "Narok Office Walk-in", status: "Negotiating" }
    ];

    // Financial Transactions
    let transactionsData = [
      { id: "TXN-8801", ref: "PWT-2026-089", name: "Eleanor Brooks", channel: "M-Pesa Till", amount: "KES 125,875", proof: "QG98HY72KP", time: "Today 09:15 AM", audit: "Verified" },
      { id: "TXN-8802", ref: "PWT-2026-090", name: "Klaus Schneider", channel: "Bank Wire (SWIFT)", amount: "$1,960", proof: "DEUTBK8920", time: "Yesterday", audit: "Verified" },
      { id: "TXN-8803", ref: "PWT-2026-091", name: "Liam O'Connor", channel: "Credit Card (Stripe)", amount: "$840", proof: "ch_3Pq9...", time: "2 Days ago", audit: "Verified" },
      { id: "TXN-8804", ref: "PWT-2026-092", name: "Dr. Kenji Tanaka", channel: "Bank Wire", amount: "$2,300", proof: "MUFGBK1182", time: "23 Sep 2026", audit: "Verified" }
    ];

    /* =========================================================================
       INITIALIZATION
       ========================================================================= */
    document.addEventListener('DOMContentLoaded', () => {
      initLiveClock();
      renderDashboardDepartures();
      renderBookingsTable();
      renderFleetCards();
      renderGuidesTable();
      renderInquiriesTable();
      renderFinancialsTable();
      initCharts();
      runQuoteEngine();
      updateBadgeCounts();
    });

    // Nairobi EAT Clock
    function initLiveClock() {
      function update() {
        const now = new Date();
        // Force East Africa Time (UTC+3)
        const eatOptions = {
          timeZone: "Africa/Nairobi",
          hour12: false,
          hour: "2-digit",
          minute: "2-digit",
          second: "2-digit"
        };
        const timeString = new Intl.DateTimeFormat([], eatOptions).format(now);
        document.getElementById('liveNairobiClock').textContent = `EAT ${timeString}`;
      }
      update();
      setInterval(update, 1000);
    }

    // Currency Switcher
    function setCurrency(curr) {
      currentCurrency = curr;
      document.getElementById('btnCurrUSD').classList.toggle('active', curr === 'USD');
      document.getElementById('btnCurrKES').classList.toggle('active', curr === 'KES');

      // Update Revenue stat
      const usdRev = 38650;
      if (curr === 'KES') {
        const kesVal = (usdRev * exchangeRateUSDToKES).toLocaleString();
        document.getElementById('statRevenueDisplay').textContent = `KES ${kesVal}`;
      } else {
        document.getElementById('statRevenueDisplay').textContent = `$${usdRev.toLocaleString()}`;
      }

      renderBookingsTable();
      runQuoteEngine();
      showToast(`Switched active display currency to ${curr}`, 'info');
    }

    function formatMoney(amountUSD) {
      if (currentCurrency === 'KES') {
        const kes = Math.round(amountUSD * exchangeRateUSDToKES);
        return `KES ${kes.toLocaleString()}`;
      }
      return `$${amountUSD.toLocaleString()}`;
    }

    // Navigation Switcher
    function switchSection(sectionId, clickedElem) {
      // Hide all sections
      const sections = ['dashboard', 'bookings', 'fleet', 'quotes', 'inquiries', 'financials'];
      sections.forEach(s => {
        const el = document.getElementById(`section-${s}`);
        if (el) el.classList.add('d-none');
      });

      // Show targeted section
      const target = document.getElementById(`section-${sectionId}`);
      if (target) target.classList.remove('d-none');

      // Sidebar active link update
      document.querySelectorAll('.sidebar-nav-item').forEach(item => item.classList.remove('active'));
      if (clickedElem) {
        clickedElem.classList.add('active');
      }

      // Page Title Header update
      const titles = {
        dashboard: "Dashboard Overview",
        bookings: "Safari Bookings Management",
        fleet: "4x4 Fleet & Guide Dispatch Board",
        quotes: "Custom Safari Quote Builder",
        inquiries: "Leads & Prospects Pipeline",
        financials: "Financials & Revenue Tracking"
      };
      document.getElementById('pageTitleText').textContent = titles[sectionId] || "Portal";

      // On mobile, close sidebar after clicking
      if (window.innerWidth < 992) {
        toggleSidebar(false);
      }
    }

    // Sidebar Toggle
    function toggleSidebar(forceState) {
      const sidebar = document.getElementById('sidebar-wrapper');
      const backdrop = document.getElementById('sidebarBackdrop');
      const content = document.getElementById('page-content-wrapper');

      if (window.innerWidth < 992) {
        const isOpen = sidebar.classList.contains('show-mobile');
        const nextState = forceState !== undefined ? forceState : !isOpen;
        if (nextState) {
          sidebar.classList.add('show-mobile');
          backdrop.classList.remove('d-none');
        } else {
          sidebar.classList.remove('show-mobile');
          backdrop.classList.add('d-none');
        }
      } else {
        sidebar.classList.toggle('collapsed');
        content.classList.toggle('expanded');
      }
    }

    // Office Switcher
    function toggleOfficeStation() {
      const current = document.getElementById('currentOfficeLabel').textContent;
      const next = current.includes('Narok') ? 'Nairobi Hub (JKIA)' : 'Narok Mara Gateway';
      document.getElementById('currentOfficeLabel').textContent = next;
      showToast(`Switched active operational station to: ${next}`, 'success');
    }

    function changeStationFromSelect(val) {
      document.getElementById('currentOfficeLabel').textContent = val;
      showToast(`Base station updated: ${val}`, 'success');
    }

    /* =========================================================================
       CHART.JS IMPLEMENTATION
       ========================================================================= */
    function initCharts() {
      // 1. Revenue & Bookings Line Chart
      const ctxRev = document.getElementById('revenueTrendChart').getContext('2d');
      new Chart(ctxRev, {
        type: 'line',
        data: {
          labels: ['May', 'Jun', 'Jul (Peak)', 'Aug (Peak)', 'Sep (Current)', 'Oct (Migr)', 'Nov (Green)'],
          datasets: [
            {
              label: 'Revenue ($ USD in Thousands)',
              data: [18, 26, 48, 56, 38.6, 42, 22],
              borderColor: '#d89b34',
              backgroundColor: 'rgba(216, 155, 52, 0.12)',
              borderWidth: 3,
              fill: true,
              tension: 0.35,
              pointBackgroundColor: '#1b281d',
              pointRadius: 5
            },
            {
              label: 'Booked Safaris Count',
              data: [8, 12, 24, 28, 19, 21, 11],
              borderColor: '#29402c',
              borderWidth: 2,
              borderDash: [5, 5],
              fill: false,
              tension: 0.3,
              pointRadius: 3
            }
          ]
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          plugins: {
            legend: { position: 'top', labels: { boxWidth: 14, font: { family: 'Plus Jakarta Sans' } } }
          },
          scales: {
            y: { grid: { color: '#f2ece4' } },
            x: { grid: { display: false } }
          }
        }
      });

      // 2. Destinations Doughnut Chart
      const ctxPie = document.getElementById('destinationsPieChart').getContext('2d');
      new Chart(ctxPie, {
        type: 'doughnut',
        data: {
          labels: ['Maasai Mara', 'Amboseli/Rift', 'Serengeti (TZ)', 'Coast Beach'],
          datasets: [{
            data: [52, 24, 14, 10],
            backgroundColor: ['#29402c', '#d89b34', '#dc2626', '#0284c7'],
            borderWidth: 2,
            borderColor: '#ffffff'
          }]
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          plugins: {
            legend: { display: false }
          },
          cutout: '72%'
        }
      });
    }

    /* =========================================================================
       BOOKINGS CRUD & TABLES
       ========================================================================= */
    function renderBookingsTable(filteredData) {
      const list = filteredData || bookingsData;
      const tbody = document.getElementById('masterBookingsTableBody');
      tbody.innerHTML = '';

      if (list.length === 0) {
        tbody.innerHTML = `<tr><td colspan="10" class="text-center py-4 text-muted">No safaris matching the current filter criteria.</td></tr>`;
        return;
      }

      list.forEach(b => {
        const payBadge = getPaymentBadge(b.paymentStatus);
        const tripBadge = getTripBadge(b.tripStatus);

        const tr = document.createElement('tr');
        tr.innerHTML = `
          <td><strong class="text-dark">${b.id}</strong></td>
          <td>
            <div class="fw-semibold text-dark">${b.leadName}</div>
            <small class="text-muted"><i class="bi bi-geo-alt me-1"></i>${b.country}</small>
          </td>
          <td>
            <div class="small fw-semibold text-truncate" style="max-width: 220px;" title="${b.package}">${b.package}</div>
          </td>
          <td>
            <div class="small">${formatShortDate(b.startDate)} - ${formatShortDate(b.endDate)}</div>
            <small class="text-muted">${b.adults} Adults${b.kids > 0 ? `, ${b.kids} Kids` : ''}</small>
          </td>
          <td><span class="badge bg-light text-dark border"><i class="bi bi-truck-front text-warning me-1"></i>${b.vehicle.split(' ')[2] || b.vehicle}</span></td>
          <td><div class="small text-truncate" style="max-width: 140px;">${b.guide.split(' ')[0]} ${b.guide.split(' ')[1] || ''}</div></td>
          <td><strong class="text-dark">${formatMoney(b.priceUSD)}</strong></td>
          <td>${payBadge}</td>
          <td>${tripBadge}</td>
          <td class="text-end">
            <div class="btn-group btn-group-sm">
              <button class="btn btn-light border" title="View Safari Dossier & Voucher" onclick="openVoucherModal('${b.id}')"><i class="bi bi-file-earmark-text text-primary"></i></button>
              <button class="btn btn-light border" title="Edit Booking" onclick="openEditBookingModal('${b.id}')"><i class="bi bi-pencil-square text-dark"></i></button>
              <button class="btn btn-light border text-danger" title="Delete Booking" onclick="deleteBooking('${b.id}')"><i class="bi bi-trash"></i></button>
            </div>
          </td>
        `;
        tbody.appendChild(tr);
      });

      updateBadgeCounts();
    }

    function renderDashboardDepartures() {
      const tbody = document.getElementById('quickDeparturesTableBody');
      tbody.innerHTML = '';
      const upcoming = bookingsData.slice(0, 4);

      upcoming.forEach(b => {
        const tr = document.createElement('tr');
        tr.innerHTML = `
          <td><strong>${b.id}</strong></td>
          <td>${b.leadName} <small class="text-muted d-block">${b.country}</small></td>
          <td><div class="small fw-medium">${b.package}</div></td>
          <td><small>${b.startDate}</small></td>
          <td><span class="badge bg-light text-dark border">${b.vehicle.split(' ')[2] || 'Cruiser'}</span></td>
          <td>${b.guide.split('(')[0]}</td>
          <td>${getTripBadge(b.tripStatus)}</td>
          <td>
            <button class="btn btn-outline-secondary btn-sm py-0 px-2" onclick="openVoucherModal('${b.id}')">Voucher</button>
          </td>
        `;
        tbody.appendChild(tr);
      });
    }

    function getPaymentBadge(status) {
      if (status === 'Paid') return `<span class="badge badge-paid"><i class="bi bi-check2-circle me-1"></i>Paid</span>`;
      if (status === 'Partial') return `<span class="badge badge-partial"><i class="bi bi-pie-chart me-1"></i>Deposit</span>`;
      return `<span class="badge badge-pending"><i class="bi bi-hourglass me-1"></i>Pending</span>`;
    }

    function getTripBadge(status) {
      if (status === 'Confirmed') return `<span class="badge badge-confirmed">Confirmed</span>`;
      if (status === 'In Progress') return `<span class="badge badge-in-progress"><span class="indicator-dot bg-warning"></span>On Safari</span>`;
      if (status === 'Completed') return `<span class="badge badge-completed">Completed</span>`;
      return `<span class="badge badge-cancelled">Cancelled</span>`;
    }

    function formatShortDate(dStr) {
      if (!dStr) return '';
      const parts = dStr.split('-');
      return `${parts[1]}/${parts[2]}`;
    }

    // Filter Bookings Master Table
    function filterBookingsTable() {
      const search = document.getElementById('bookingSearchInput').value.toLowerCase();
      const statusFilter = document.getElementById('bookingStatusFilter').value;
      const payFilter = document.getElementById('bookingPaymentFilter').value;

      const filtered = bookingsData.filter(b => {
        const matchesSearch = b.leadName.toLowerCase().includes(search) ||
                              b.id.toLowerCase().includes(search) ||
                              b.country.toLowerCase().includes(search) ||
                              b.package.toLowerCase().includes(search);
        const matchesStatus = (statusFilter === 'ALL' || b.tripStatus === statusFilter);
        const matchesPay = (payFilter === 'ALL' || b.paymentStatus === payFilter);
        return matchesSearch && matchesStatus && matchesPay;
      });

      renderBookingsTable(filtered);
    }

    function resetBookingFilters() {
      document.getElementById('bookingSearchInput').value = '';
      document.getElementById('bookingStatusFilter').value = 'ALL';
      document.getElementById('bookingPaymentFilter').value = 'ALL';
      renderBookingsTable();
    }

    // Booking CRUD Operations
    function openNewBookingModal() {
      document.getElementById('bookingModalTitle').innerHTML = `<i class="bi bi-journal-plus text-warning me-2"></i> Create Safari Booking`;
      document.getElementById('modalBookingId').value = '';
      document.getElementById('bookingModalForm').reset();
      // Auto-set dates default to tomorrow
      const tomorrow = new Date();
      tomorrow.setDate(tomorrow.getDate() + 1);
      const after3Days = new Date();
      after3Days.setDate(after3Days.getDate() + 4);
      document.getElementById('modalStartDate').value = tomorrow.toISOString().split('T')[0];
      document.getElementById('modalEndDate').value = after3Days.toISOString().split('T')[0];

      const modal = new bootstrap.Modal(document.getElementById('bookingFormModal'));
      modal.show();
    }

    function openEditBookingModal(bookingId) {
      const b = bookingsData.find(x => x.id === bookingId);
      if (!b) return;

      document.getElementById('bookingModalTitle').innerHTML = `<i class="bi bi-pencil-square text-warning me-2"></i> Edit Safari: ${b.id}`;
      document.getElementById('modalBookingId').value = b.id;
      document.getElementById('modalLeadName').value = b.leadName;
      document.getElementById('modalCountry').value = b.country;
      document.getElementById('modalPackage').value = b.package;
      document.getElementById('modalStartDate').value = b.startDate;
      document.getElementById('modalEndDate').value = b.endDate;
      document.getElementById('modalAdults').value = b.adults;
      document.getElementById('modalKids').value = b.kids;
      document.getElementById('modalPrice').value = b.priceUSD;
      document.getElementById('modalVehicle').value = b.vehicle;
      document.getElementById('modalGuide').value = b.guide;
      document.getElementById('modalPaymentStatus').value = b.paymentStatus;
      document.getElementById('modalTripStatus').value = b.tripStatus;
      document.getElementById('modalNotes').value = b.notes || '';

      const modal = new bootstrap.Modal(document.getElementById('bookingFormModal'));
      modal.show();
    }

    function handleSaveBooking(e) {
      e.preventDefault();
      const bookingId = document.getElementById('modalBookingId').value;
      const isNew = !bookingId;

      const record = {
        id: isNew ? `PWT-2026-${Math.floor(100 + Math.random() * 900)}` : bookingId,
        leadName: document.getElementById('modalLeadName').value,
        country: document.getElementById('modalCountry').value,
        package: document.getElementById('modalPackage').value,
        startDate: document.getElementById('modalStartDate').value,
        endDate: document.getElementById('modalEndDate').value,
        adults: parseInt(document.getElementById('modalAdults').value),
        kids: parseInt(document.getElementById('modalKids').value),
        priceUSD: parseFloat(document.getElementById('modalPrice').value),
        vehicle: document.getElementById('modalVehicle').value,
        guide: document.getElementById('modalGuide').value,
        paymentStatus: document.getElementById('modalPaymentStatus').value,
        tripStatus: document.getElementById('modalTripStatus').value,
        notes: document.getElementById('modalNotes').value
      };

      if (isNew) {
        bookingsData.unshift(record);
        showToast(`Safari booking ${record.id} successfully created!`, 'success');
      } else {
        const index = bookingsData.findIndex(x => x.id === bookingId);
        if (index !== -1) {
          bookingsData[index] = record;
          showToast(`Safari booking ${record.id} updated!`, 'info');
        }
      }

      // Close modal
      const modalEl = document.getElementById('bookingFormModal');
      const modalInstance = bootstrap.Modal.getInstance(modalEl);
      if (modalInstance) modalInstance.hide();

      renderBookingsTable();
      renderDashboardDepartures();
    }

    function deleteBooking(bookingId) {
      const item = bookingsData.find(x => x.id === bookingId);
      if (!item) return;

      // Custom safe in-app confirmation modal could also be used; keeping simple inline
      bookingsData = bookingsData.filter(x => x.id !== bookingId);
      showToast(`Booking ${bookingId} has been archived.`, 'warning');
      renderBookingsTable();
      renderDashboardDepartures();
    }

    // Printable Safari Voucher Dossier
    function openVoucherModal(bookingId) {
      const b = bookingsData.find(x => x.id === bookingId);
      if (!b) return;

      const voucherDiv = document.getElementById('printableVoucherArea');
      voucherDiv.innerHTML = `
        <div class="border p-4 rounded-3 bg-white">
          <div class="d-flex justify-content-between align-items-start border-bottom pb-3 mb-4">
            <div>
              <div class="d-flex align-items-center gap-2">
                <div class="bg-warning text-dark p-2 rounded fw-bold fs-4"><i class="bi bi-compass"></i></div>
                <div>
                  <h4 class="fw-bold mb-0 text-dark font-serif">PLANET WANDERS TOURS & SAFARIS</h4>
                  <small class="text-muted">Narok Town & Nairobi Hubs • Republic of Kenya</small>
                </div>
              </div>
            </div>
            <div class="text-end">
              <span class="badge bg-dark fs-6 px-3 py-2">SAFARI VOUCHER & GATE PASS</span>
              <div class="fw-bold text-warning mt-1 fs-5">${b.id}</div>
              <small class="text-muted">Issued: September 2026</small>
            </div>
          </div>

          <div class="row g-3 mb-4">
            <div class="col-md-6">
              <h6 class="text-uppercase text-muted fw-bold small">Guest Details</h6>
              <div class="fs-5 fw-bold text-dark">${b.leadName}</div>
              <div>Country: <strong>${b.country}</strong></div>
              <div>Party Size: <strong>${b.adults} Adults, ${b.kids} Children</strong></div>
            </div>
            <div class="col-md-6">
              <h6 class="text-uppercase text-muted fw-bold small">Expedition Logistics</h6>
              <div>Package: <strong>${b.package}</strong></div>
              <div>Departure Date: <strong>${b.startDate}</strong></div>
              <div>Completion Date: <strong>${b.endDate}</strong></div>
            </div>
          </div>

          <div class="row g-3 p-3 bg-light rounded-3 mb-4 border">
            <div class="col-sm-6">
              <small class="text-muted d-block">Assigned 4x4 Jeep / Vehicle</small>
              <strong><i class="bi bi-truck-front text-warning me-1"></i>${b.vehicle}</strong>
            </div>
            <div class="col-sm-6">
              <small class="text-muted d-block">Authorized Driver Guide</small>
              <strong><i class="bi bi-person-badge-fill text-success me-1"></i>${b.guide}</strong>
            </div>
            <div class="col-sm-6 mt-3">
              <small class="text-muted d-block">Financial Verification</small>
              <strong>Total: ${formatMoney(b.priceUSD)} (${b.paymentStatus})</strong>
            </div>
            <div class="col-sm-6 mt-3">
              <small class="text-muted d-block">Park Conservation Clearance</small>
              <strong class="text-success"><i class="bi bi-check-circle-fill me-1"></i> Narok County Mara Gate Validated</strong>
            </div>
          </div>

          <div class="mb-4">
            <h6 class="text-uppercase text-muted fw-bold small">Operational Notes / Ranger Brief</h6>
            <p class="small text-secondary mb-0">${b.notes || "Standard full-board itinerary with game drives and mineral water onboard."}</p>
          </div>

          <div class="border-top pt-3 d-flex justify-content-between align-items-center small text-muted">
            <span>Planet Wanders Narok Ops Radio: VHF Ch 14</span>
            <span>Emergency Dispatch: +254 712 345 678</span>
          </div>
        </div>
      `;

      const modal = new bootstrap.Modal(document.getElementById('voucherModal'));
      modal.show();
    }

    /* =========================================================================
       FLEET & GUIDES BOARD
       ========================================================================= */
    function renderFleetCards() {
      const container = document.getElementById('fleetCardsContainer');
      container.innerHTML = '';

      fleetData.forEach(v => {
        let statusBadge = `<span class="badge bg-success">On Safari</span>`;
        if (v.status === 'Available') statusBadge = `<span class="badge bg-warning text-dark">Available in Narok</span>`;
        if (v.status === 'Maintenance') statusBadge = `<span class="badge bg-danger">Maintenance Depot</span>`;

        const col = document.createElement('div');
        col.className = 'col-md-6 col-xl-4';
        col.innerHTML = `
          <div class="dashboard-card p-3 mb-0 h-100">
            <div class="d-flex justify-content-between align-items-start mb-2">
              <span class="badge bg-dark fw-bold">${v.plate}</span>
              ${statusBadge}
            </div>
            <h6 class="fw-bold text-dark mb-1">${v.model}</h6>
            <div class="small text-muted mb-2"><i class="bi bi-people me-1"></i>${v.seats} • ${v.popRoof}</div>
            
            <div class="p-2 bg-light rounded-3 small mb-2 border">
              <div class="d-flex justify-content-between">
                <span class="text-muted">Driver/Guide:</span>
                <strong>${v.guide}</strong>
              </div>
              <div class="d-flex justify-content-between">
                <span class="text-muted">Last Location:</span>
                <span>${v.location}</span>
              </div>
              <div class="d-flex justify-content-between">
                <span class="text-muted">Fuel Level:</span>
                <span class="text-success fw-bold">${v.fuel}</span>
              </div>
            </div>

            <div class="d-flex gap-2 mt-auto">
              <button class="btn btn-outline-secondary btn-sm flex-grow-1" onclick="showToast('GPS radio tracking signal locked on ${v.plate}', 'info')">
                <i class="bi bi-radar me-1"></i> Track
              </button>
              <button class="btn btn-light border btn-sm" onclick="showToast('Service log logged for ${v.plate}', 'success')">
                <i class="bi bi-wrench"></i>
              </button>
            </div>
          </div>
        `;
        container.appendChild(col);
      });
    }

    function renderGuidesTable() {
      const tbody = document.getElementById('guidesTableBody');
      tbody.innerHTML = '';

      guidesData.forEach(g => {
        let statusHtml = `<span class="badge bg-success">On Safari</span>`;
        if (g.status.includes('Available')) statusHtml = `<span class="badge bg-warning text-dark">Available in Narok</span>`;
        if (g.status.includes('Off-Duty')) statusHtml = `<span class="badge bg-secondary">Off Duty</span>`;

        const tr = document.createElement('tr');
        tr.innerHTML = `
          <td>
            <div class="d-flex align-items-center gap-2">
              <img src="${g.avatar}" class="rounded-circle" width="34" height="34" alt="${g.name}">
              <div>
                <strong class="text-dark">${g.name}</strong>
              </div>
            </div>
          </td>
          <td><span class="badge bg-light text-dark border">${g.cert}</span></td>
          <td><small class="text-muted">${g.langs}</small></td>
          <td><small>${g.specialty}</small></td>
          <td><small class="fw-semibold">${g.station}</small></td>
          <td>${statusHtml}</td>
          <td class="text-end">
            <button class="btn btn-sm btn-outline-secondary py-0 px-2" onclick="toggleGuideStatus('${g.name}')">Toggle Status</button>
          </td>
        `;
        tbody.appendChild(tr);
      });
    }

    function toggleGuideStatus(guideName) {
      const g = guidesData.find(x => x.name === guideName);
      if (!g) return;
      if (g.status === 'On Safari') g.status = 'Available in Narok';
      else if (g.status === 'Available in Narok') g.status = 'Off Duty';
      else g.status = 'On Safari';

      renderGuidesTable();
      showToast(`Updated duty roster status for ${g.name} to "${g.status}"`, 'info');
    }

    function showNewGuideModal() {
      showToast('Guide onboarding form opened for Narok & Nairobi recruitment', 'info');
    }

    /* =========================================================================
       QUOTE BUILDER ENGINE
       ========================================================================= */
    function runQuoteEngine() {
      const destSelect = document.getElementById('builderDest');
      const vehicleSelect = document.getElementById('builderVehicle');
      const tierSelect = document.getElementById('builderTier');

      const days = parseInt(document.getElementById('builderDays').value) || 1;
      const adults = parseInt(document.getElementById('builderAdults').value) || 1;
      const kids = parseInt(document.getElementById('builderKids').value) || 0;

      const parkRatePerAdult = parseFloat(destSelect.selectedOptions[0].getAttribute('data-parkfee')) || 100;
      const vehicleDayRate = parseFloat(vehicleSelect.selectedOptions[0].getAttribute('data-perday')) || 220;
      const lodgeNightRatePerPerson = parseFloat(tierSelect.selectedOptions[0].getAttribute('data-rate')) || 185;

      // Add-ons
      let addonsTotal = 0;
      if (document.getElementById('addBalloon').checked) addonsTotal += (450 * adults);
      if (document.getElementById('addVillage').checked) addonsTotal += (30 * (adults + kids));
      if (document.getElementById('addBushDinner').checked) addonsTotal += (60 * (adults + kids));

      const vehicleTotal = vehicleDayRate * days;
      const parkTotal = parkRatePerAdult * adults * days;
      const lodgeTotal = lodgeNightRatePerPerson * (adults + (kids * 0.5)) * Math.max(1, days - 1);

      const grandTotalUSD = Math.round(vehicleTotal + parkTotal + lodgeTotal + addonsTotal);
      const perAdultUSD = Math.round(grandTotalUSD / Math.max(1, adults));

      // Display in selected currency
      document.getElementById('quoteTotalDisplay').textContent = formatMoney(grandTotalUSD);
      document.getElementById('quotePerPaxDisplay').textContent = `Approx. ${formatMoney(perAdultUSD)} per adult`;

      document.getElementById('quoteVehicleCost').textContent = formatMoney(vehicleTotal);
      document.getElementById('quoteParkCost').textContent = formatMoney(parkTotal);
      document.getElementById('quoteLodgeCost').textContent = formatMoney(lodgeTotal);
      document.getElementById('quoteAddonsCost').textContent = formatMoney(addonsTotal);

      // Generate formatted WhatsApp / Email proposal text
      const clientName = document.getElementById('builderClientName').value.trim() || 'Safari Explorer';
      const destName = destSelect.selectedOptions[0].text;
      const vehicleName = vehicleSelect.selectedOptions[0].text;
      const tierName = tierSelect.selectedOptions[0].text.split('(')[0].trim();
      const pickupHub = document.getElementById('builderPickup').value;

      const proposal = `*Jambo ${clientName}! Safari Proposal from Planet Wanders Tours & Safaris*%0A%0A` +
        `• *Circuit:* ${destName}%0A` +
        `• *Duration:* ${days} Days / ${Math.max(1, days - 1)} Nights%0A` +
        `• *Travelers:* ${adults} Adults${kids > 0 ? `, ${kids} Children` : ''}%0A` +
        `• *Vehicle:* ${vehicleName}%0A` +
        `• *Lodge Comfort:* ${tierName}%0A` +
        `• *Pickup Point:* ${pickupHub}%0A` +
        `-----------------------------%0A` +
        `• *Total Estimated Package:* ${formatMoney(grandTotalUSD)}%0A` +
        `• *Per Adult:* ${formatMoney(perAdultUSD)}%0A%0A` +
        `*Includes:* 4x4 Jeep with pop-up roof, certified KPSGA guide, full-board accommodation, Maasai Mara park fees, and mineral water.%0A%0A` +
        `_Karibu Sana! Based in Narok Town & Nairobi._`;

      document.getElementById('quoteTextPreview').value = decodeURIComponent(proposal);
    }

    function copyQuoteToClipboard() {
      const text = document.getElementById('quoteTextPreview').value;
      const tempArea = document.createElement("textarea");
      tempArea.value = text;
      document.body.appendChild(tempArea);
      tempArea.select();
      document.execCommand('copy');
      document.body.removeChild(tempArea);
      showToast("Formatted safari quote copied to clipboard!", "success");
    }

    function sendQuoteViaWhatsApp() {
      const text = document.getElementById('quoteTextPreview').value;
      const url = `https://wa.me/?text=${encodeURIComponent(text)}`;
      window.open(url, '_blank');
    }

    /* =========================================================================
       INQUIRIES & FINANCIALS
       ========================================================================= */
    function renderInquiriesTable() {
      const tbody = document.getElementById('inquiriesTableBody');
      tbody.innerHTML = '';

      inquiriesData.forEach(inq => {
        let badge = `<span class="badge bg-danger">New Lead</span>`;
        if (inq.status === 'Quoted') badge = `<span class="badge bg-warning text-dark">Quoted</span>`;
        if (inq.status === 'Negotiating') badge = `<span class="badge bg-info text-dark">Negotiating</span>`;

        const tr = document.createElement('tr');
        tr.innerHTML = `
          <td><strong>${inq.id}</strong></td>
          <td><div class="fw-bold text-dark">${inq.name}</div></td>
          <td><small class="text-muted">${inq.contact}</small></td>
          <td><div class="small fw-semibold">${inq.dest}</div></td>
          <td><small>${inq.datesPax}</small></td>
          <td><span class="badge bg-light text-dark border">${inq.source}</span></td>
          <td>${badge}</td>
          <td class="text-end">
            <button class="btn btn-outline-warning btn-sm py-0 px-2" onclick="convertInquiryToBooking('${inq.id}')">Convert to Safari</button>
          </td>
        `;
        tbody.appendChild(tr);
      });
    }

    function openNewInquiryModal() {
      document.getElementById('inquiryModalForm').reset();
      const modal = new bootstrap.Modal(document.getElementById('inquiryFormModal'));
      modal.show();
    }

    function handleSaveInquiry(e) {
      e.preventDefault();
      const inq = {
        id: `INQ-${Math.floor(400 + Math.random() * 500)}`,
        name: document.getElementById('inqName').value,
        contact: document.getElementById('inqPhone').value,
        dest: document.getElementById('inqDest').value,
        datesPax: document.getElementById('inqDatesPax').value || 'Upcoming dates',
        source: document.getElementById('inqSource').value,
        status: "New"
      };

      inquiriesData.unshift(inq);
      renderInquiriesTable();
      updateBadgeCounts();

      const modalEl = document.getElementById('inquiryFormModal');
      const modalInstance = bootstrap.Modal.getInstance(modalEl);
      if (modalInstance) modalInstance.hide();

      showToast(`Safari inquiry from ${inq.name} recorded!`, 'success');
    }

    function convertInquiryToBooking(inqId) {
      const inq = inquiriesData.find(x => x.id === inqId);
      if (!inq) return;

      openNewBookingModal();
      document.getElementById('modalLeadName').value = inq.name;
      document.getElementById('modalNotes').value = `Converted from inquiry ${inq.id} (${inq.contact}, ${inq.source})`;
      showToast(`Inquiry ${inqId} transferred to new booking sheet.`, 'info');
    }

    function renderFinancialsTable() {
      const tbody = document.getElementById('financialsTableBody');
      tbody.innerHTML = '';

      transactionsData.forEach(t => {
        const tr = document.createElement('tr');
        tr.innerHTML = `
          <td><strong>${t.id}</strong></td>
          <td><a href="#" class="text-warning text-decoration-none fw-semibold" onclick="openVoucherModal('${t.ref}')">${t.ref}</a></td>
          <td>${t.name}</td>
          <td><span class="badge bg-light text-dark border">${t.channel}</span></td>
          <td><strong class="text-dark">${t.amount}</strong></td>
          <td><code>${t.proof}</code></td>
          <td><small class="text-muted">${t.time}</small></td>
          <td><span class="badge bg-success bg-opacity-15 text-success border border-success">${t.audit}</span></td>
        `;
        tbody.appendChild(tr);
      });
    }

    function updateBadgeCounts() {
      document.getElementById('badgeBookingsCount').textContent = bookingsData.length;
      document.getElementById('statActiveTrips').textContent = bookingsData.filter(x => x.tripStatus === 'In Progress' || x.tripStatus === 'Confirmed').length;
      document.getElementById('badgeInquiryCount').textContent = inquiriesData.length;
      document.getElementById('statPendingInquiries').textContent = inquiriesData.filter(x => x.status === 'New').length;
    }

    /* =========================================================================
       CSV EXPORT UTILITY
       ========================================================================= */
    function exportBookingsToCSV() {
      if (bookingsData.length === 0) {
        showToast("No bookings to export", "warning");
        return;
      }

      const headers = ["Reference", "Lead Traveler", "Country", "Safari Package", "Start Date", "End Date", "Adults", "Kids", "Vehicle", "Driver Guide", "Price USD", "Payment Status", "Trip Status"];
      const rows = bookingsData.map(b => [
        `"${b.id}"`,
        `"${b.leadName}"`,
        `"${b.country}"`,
        `"${b.package}"`,
        `"${b.startDate}"`,
        `"${b.endDate}"`,
        b.adults,
        b.kids,
        `"${b.vehicle}"`,
        `"${b.guide}"`,
        b.priceUSD,
        `"${b.paymentStatus}"`,
        `"${b.tripStatus}"`
      ]);

      let csvContent = "data:text/csv;charset=utf-8," + [headers.join(","), ...rows.map(e => e.join(","))].join("\n");
      const encodedUri = encodeURI(csvContent);
      const link = document.createElement("a");
      link.setAttribute("href", encodedUri);
      link.setAttribute("download", `Planet_Wanders_Safaris_Report_${new Date().toISOString().split('T')[0]}.csv`);
      document.body.appendChild(link);
      link.click();
      document.body.removeChild(link);

      showToast("Bookings CSV export downloaded successfully!", "success");
    }

    /* =========================================================================
       NOTIFICATION TOASTS
       ========================================================================= */
    function showToast(message, type = 'info') {
      const toastEl = document.getElementById('actionToast');
      const toastMsg = document.getElementById('toastMessage');

      toastEl.className = 'toast align-items-center text-white border-0 rounded-3 shadow';
      let icon = '<i class="bi bi-info-circle-fill fs-5"></i>';

      if (type === 'success') {
        toastEl.classList.add('bg-success');
        icon = '<i class="bi bi-check-circle-fill fs-5"></i>';
      } else if (type === 'warning') {
        toastEl.classList.add('bg-warning', 'text-dark');
        icon = '<i class="bi bi-exclamation-triangle-fill fs-5 text-dark"></i>';
      } else if (type === 'danger') {
        toastEl.classList.add('bg-danger');
        icon = '<i class="bi bi-x-circle-fill fs-5"></i>';
      } else {
        toastEl.classList.add('bg-dark');
      }

      toastMsg.innerHTML = `${icon} <span>${message}</span>`;
      const toast = new bootstrap.Toast(toastEl, { delay: 3500 });
      toast.show();
    }
  </script>
</body>
</html>`