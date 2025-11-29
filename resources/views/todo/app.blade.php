<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>To Do List</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
  
  <style>
    :root {
      --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      --card-bg: rgba(255, 255, 255, 0.95);
      --card-shadow: 0 8px 32px rgba(102, 126, 234, 0.15);
      --card-hover-shadow: 0 12px 40px rgba(102, 126, 234, 0.25);
      --border-radius: 16px;
      --transition: all 0.3s ease;
    }

    * {
      font-family: 'Inter', sans-serif;
    }

    body {
      min-height: 100vh;
      background: linear-gradient(135deg, #f5f7fa 0%, #e4e8f0 100%);
      background-attachment: fixed;
    }

    /* Navbar */
    .navbar {
      background: var(--primary-gradient) !important;
      padding: 1rem 0;
      box-shadow: 0 4px 20px rgba(102, 126, 234, 0.3);
    }

    .navbar-brand {
      font-size: 1.5rem;
      font-weight: 700;
      letter-spacing: -0.5px;
    }

    /* Cards - Glassmorphism */
    .glass-card {
      background: var(--card-bg);
      backdrop-filter: blur(10px);
      border: 1px solid rgba(255, 255, 255, 0.8);
      border-radius: var(--border-radius);
      box-shadow: var(--card-shadow);
      transition: var(--transition);
    }

    .glass-card:hover {
      box-shadow: var(--card-hover-shadow);
      transform: translateY(-2px);
    }

    /* Page Title */
    .page-title {
      font-size: 2.5rem;
      font-weight: 700;
      background: var(--primary-gradient);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
      margin-bottom: 2rem;
    }

    /* Form Inputs */
    .form-control, .form-select {
      border: 2px solid #e9ecef;
      border-radius: 12px;
      padding: 0.75rem 1.25rem;
      font-size: 0.95rem;
      transition: var(--transition);
    }

    .form-control:focus, .form-select:focus {
      border-color: #667eea;
      box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.15);
    }

    .form-control::placeholder {
      color: #adb5bd;
    }

    /* Buttons */
    .btn-primary {
      background: var(--primary-gradient);
      border: none;
      border-radius: 12px;
      padding: 0.75rem 1.5rem;
      font-weight: 600;
      transition: var(--transition);
    }

    .btn-primary:hover {
      transform: translateY(-2px);
      box-shadow: 0 6px 20px rgba(102, 126, 234, 0.4);
      background: linear-gradient(135deg, #5a6fd6 0%, #6a4190 100%);
    }

    .btn-outline-primary {
      border: 2px solid #667eea;
      color: #667eea;
      border-radius: 10px;
      font-weight: 500;
      transition: var(--transition);
    }

    .btn-outline-primary:hover {
      background: var(--primary-gradient);
      border-color: transparent;
      transform: scale(1.05);
    }

    .btn-outline-danger {
      border: 2px solid #dc3545;
      border-radius: 10px;
      font-weight: 500;
      transition: var(--transition);
    }

    .btn-outline-danger:hover {
      transform: scale(1.05);
    }

    /* Task List */
    .task-list {
      list-style: none;
      padding: 0;
      margin: 0;
    }

    .task-item {
      background: #fff;
      border-radius: 12px;
      padding: 1rem 1.25rem;
      margin-bottom: 0.75rem;
      border: 1px solid #f0f0f0;
      transition: var(--transition);
    }

    .task-item:hover {
      background: #f8f9ff;
      border-color: #667eea;
      transform: translateX(4px);
    }

    .task-item:last-child {
      margin-bottom: 0;
    }

    .task-text {
      font-weight: 500;
      color: #2d3748;
      font-size: 1rem;
    }

    .task-text.completed {
      text-decoration: line-through;
      color: #a0aec0;
    }

    /* Badges */
    .badge-done {
      background: linear-gradient(135deg, #48bb78 0%, #38a169 100%);
      color: white;
      font-weight: 600;
      padding: 0.4rem 0.8rem;
      border-radius: 20px;
      font-size: 0.75rem;
      letter-spacing: 0.5px;
    }

    .badge-pending {
      background: linear-gradient(135deg, #ecc94b 0%, #d69e2e 100%);
      color: #744210;
      font-weight: 600;
      padding: 0.4rem 0.8rem;
      border-radius: 20px;
      font-size: 0.75rem;
      letter-spacing: 0.5px;
    }

    /* Edit Panel */
    .edit-panel {
      background: #f8f9ff;
      border-radius: 12px;
      padding: 1rem;
      margin-top: 0.75rem;
      border: 1px dashed #667eea;
    }

    /* Toggle Switch */
    .toggle-group {
      display: flex;
      gap: 0.5rem;
    }

    .toggle-btn {
      padding: 0.5rem 1rem;
      border-radius: 8px;
      border: 2px solid #e9ecef;
      background: white;
      cursor: pointer;
      transition: var(--transition);
      font-size: 0.875rem;
      font-weight: 500;
    }

    .toggle-btn:hover {
      border-color: #667eea;
    }

    .toggle-btn.active-done {
      background: linear-gradient(135deg, #48bb78 0%, #38a169 100%);
      border-color: transparent;
      color: white;
    }

    .toggle-btn.active-pending {
      background: linear-gradient(135deg, #ecc94b 0%, #d69e2e 100%);
      border-color: transparent;
      color: #744210;
    }

    /* Alerts */
    .alert-success {
      background: linear-gradient(135deg, #c6f6d5 0%, #9ae6b4 100%);
      border: none;
      border-radius: 12px;
      color: #276749;
      font-weight: 500;
    }

    .alert-danger {
      background: linear-gradient(135deg, #fed7d7 0%, #feb2b2 100%);
      border: none;
      border-radius: 12px;
      color: #c53030;
      font-weight: 500;
    }

    /* Empty State */
    .empty-state {
      text-align: center;
      padding: 3rem 1rem;
      color: #a0aec0;
    }

    .empty-state i {
      font-size: 4rem;
      margin-bottom: 1rem;
      opacity: 0.5;
    }

    .empty-state p {
      font-size: 1.1rem;
      margin: 0;
    }

    /* Section Labels */
    .section-label {
      font-size: 0.75rem;
      font-weight: 600;
      text-transform: uppercase;
      letter-spacing: 1px;
      color: #667eea;
      margin-bottom: 1rem;
    }

    /* Collapse Animation */
    .collapse {
      transition: var(--transition);
    }

    /* Action Buttons */
    .action-btn {
      width: 36px;
      height: 36px;
      padding: 0;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      border-radius: 10px;
    }

    /* Filter Section */
    .filter-section .form-control,
    .filter-section .form-select {
      background: #f8f9ff;
    }
  </style>
</head>

<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
      <a class="navbar-brand" href="/">
        <i class="bi bi-check2-square me-2"></i>TaskFlow
      </a>
    </div>
  </nav>

  <div class="container my-5">
    <!-- Title -->
    <h1 class="page-title text-center">My Tasks</h1>

    <div class="row justify-content-center">
      <div class="col-lg-7 col-md-9">

        <!-- Form Tambah Data -->
        <div class="glass-card mb-4">
          <div class="card-body p-4">
            <div class="section-label">
              <i class="bi bi-plus-circle me-1"></i> Add New Task
            </div>
            
            @if (session('success'))
            <div class="alert alert-success small d-flex align-items-center" role="alert">
              <i class="bi bi-check-circle-fill me-2"></i>
              {{ session('success') }}
            </div>
            @endif

            @if ($errors->any())
            <div class="alert alert-danger small">
              <i class="bi bi-exclamation-circle-fill me-2"></i>
              <ul class="mb-0 ps-3">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
            @endif

            <form action="{{ route('todo.post') }}" method="post" class="d-flex gap-3">
              @csrf
              <input type="text" class="form-control" name="task" placeholder="What needs to be done?"
                value="{{ old('task') }}" required>
              <button class="btn btn-primary d-flex align-items-center gap-2" type="submit">
                <i class="bi bi-plus-lg"></i>
                <span>Add</span>
              </button>
            </form>
          </div>
        </div>

        <!-- Search & Filter -->
        <div class="glass-card mb-4 filter-section">
          <div class="card-body p-4">
            <div class="section-label">
              <i class="bi bi-funnel me-1"></i> Search & Filter
            </div>
            <form action="{{ route('todo') }}" method="get" class="row g-3 align-items-end">
              
              <!-- Input search -->
              <div class="col-md-5">
                <label class="form-label small text-muted fw-medium">Search</label>
                <input type="text" class="form-control" name="search"
                      placeholder="Find a task..." value="{{ request('search') }}">
              </div>

              <!-- Dropdown filter status -->
              <div class="col-md-4">
                <label class="form-label small text-muted fw-medium">Status</label>
                <select name="status" class="form-select">
                  <option value="">All Tasks</option>
                  <option value="0" {{ request('status') === '0' ? 'selected' : '' }}>Pending</option>
                  <option value="1" {{ request('status') === '1' ? 'selected' : '' }}>Completed</option>
                </select>
              </div>
              
              <!-- Tombol submit -->
              <div class="col-md-3 d-grid">
                <button class="btn btn-primary" type="submit">
                  <i class="bi bi-search me-1"></i> Search
                </button>
              </div>

            </form>
          </div>
        </div>

        <!-- Daftar Task -->
        <div class="glass-card">
          <div class="card-body p-4">
            <div class="section-label">
              <i class="bi bi-list-task me-1"></i> Task List
              <span class="badge bg-secondary ms-2 rounded-pill">{{ count($data) }}</span>
            </div>
            
            @if(count($data) > 0)
            <ul class="task-list">
              @foreach ($data as $item)
              <li class="task-item">
                <div class="d-flex justify-content-between align-items-center">
                  <div class="d-flex align-items-center gap-3">
                    @if($item->is_done)
                    <i class="bi bi-check-circle-fill text-success fs-5"></i>
                    @else
                    <i class="bi bi-circle text-muted fs-5"></i>
                    @endif
                    <span class="task-text {{ $item->is_done ? 'completed' : '' }}">{{ $item->task }}</span>
                  </div>
                  <div class="d-flex align-items-center gap-2">
                    @if($item->is_done)
                    <span class="badge-done">Completed</span>
                    @else
                    <span class="badge-pending">Pending</span>
                    @endif
                    <button class="btn btn-outline-primary action-btn" data-bs-toggle="collapse"
                      data-bs-target="#collapse-{{ $loop->index }}" title="Edit">
                      <i class="bi bi-pencil"></i>
                    </button>
                    <form action="{{ route('todo.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this task?')">
                      @csrf
                      @method('DELETE')
                      <button class="btn btn-outline-danger action-btn" title="Delete">
                        <i class="bi bi-trash"></i>
                      </button>
                    </form>
                  </div>
                </div>

                <!-- Update Form -->
                <div class="collapse" id="collapse-{{ $loop->index }}">
                  <div class="edit-panel">
                    <form action="{{ url('todo/'.$item->id) }}" method="POST">
                      @csrf
                      @method('PUT')
                      <div class="mb-3">
                        <label class="form-label small text-muted fw-medium">Task Name</label>
                        <input type="text" class="form-control" name="task" value="{{ $item->task }}">
                      </div>
                      <div class="mb-3">
                        <label class="form-label small text-muted fw-medium">Status</label>
                        <div class="toggle-group">
                          <label class="toggle-btn {{ $item->is_done ? 'active-done' : '' }}">
                            <input type="radio" name="is_done" value="1" {{ $item->is_done ? 'checked' : '' }} class="d-none">
                            <i class="bi bi-check-circle me-1"></i> Completed
                          </label>
                          <label class="toggle-btn {{ !$item->is_done ? 'active-pending' : '' }}">
                            <input type="radio" name="is_done" value="0" {{ !$item->is_done ? 'checked' : '' }} class="d-none">
                            <i class="bi bi-clock me-1"></i> Pending
                          </label>
                        </div>
                      </div>
                      <button class="btn btn-primary btn-sm" type="submit">
                        <i class="bi bi-check-lg me-1"></i> Save Changes
                      </button>
                    </form>
                  </div>
                </div>
              </li>
              @endforeach
            </ul>
            @else
            <div class="empty-state">
              <i class="bi bi-inbox"></i>
              <p>No tasks found</p>
              <small class="text-muted">Add a new task to get started!</small>
            </div>
            @endif
          </div>
        </div>

      </div>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  
  <script>
    // Toggle button interaction
    document.querySelectorAll('.toggle-btn').forEach(btn => {
      btn.addEventListener('click', function() {
        const group = this.closest('.toggle-group');
        group.querySelectorAll('.toggle-btn').forEach(b => {
          b.classList.remove('active-done', 'active-pending');
        });
        const value = this.querySelector('input').value;
        if (value === '1') {
          this.classList.add('active-done');
        } else {
          this.classList.add('active-pending');
        }
      });
    });
  </script>
</body>
</html>
