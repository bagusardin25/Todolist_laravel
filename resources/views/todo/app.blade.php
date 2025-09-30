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
</head>

<body class="bg-body-tertiary">

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
    <div class="container">
      <a class="navbar-brand fw-bold" href="#">📝 To Do App</a>
    </div>
  </nav>

  <div class="container my-5">
    <!-- Title -->
    <h1 class="text-center fw-bold mb-4">To Do List</h1>

    <div class="row justify-content-center">
      <div class="col-md-8">

        <!-- Form Tambah Data -->
        <div class="card shadow-sm rounded-3 mb-4">
          <div class="card-body">
            @if (session('success'))
            <div class="alert alert-success small">{{ session('success') }}</div>
            @endif

            @if ($errors->any())
            <div class="alert alert-danger small">
              <ul class="mb-0">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
            @endif

            <form action="{{ route('todo.post') }}" method="post" class="d-flex gap-2">
              @csrf
              <input type="text" class="form-control rounded-pill" name="task" placeholder="Tambah task baru..."
                value="{{ old('task') }}" required>
              <button class="btn btn-primary rounded-pill px-4" type="submit">
                <i class="bi bi-plus-circle"></i> Simpan
              </button>
            </form>
          </div>
        </div>

        <!-- Search & Filter -->
        <div class="card shadow-sm rounded-3 mb-4">
          <div class="card-body">
            <form action="{{ route('todo') }}" method="get" class="row g-2 align-items-center">
              
              <!-- Input search -->
              <div class="col-md-6">
                <input type="text" class="form-control rounded-pill" name="search"
                      placeholder="Cari task..." value="{{ request('search') }}">
              </div>

              <!-- Dropdown filter status -->
              <div class="col-md-4">
                <select name="status" class="form-select rounded-pill">
                  <option value="">-- Semua --</option>
                  <option value="0" {{ request('status') === '0' ? 'selected' : '' }}>Belum</option>
                  <option value="1" {{ request('status') === '1' ? 'selected' : '' }}>Selesai</option>
                </select>
              </div>
              <!-- Tombol submit -->
              <div class="col-md-2 d-grid">
                <button class="btn btn-primary rounded-pill" type="submit">
                  <i class="bi bi-filter"></i> Filter
                </button>
              </div>

            </form>
          </div>
        </div>
        <!-- Daftar Task -->
        <div class="card shadow-sm rounded-3">
          <div class="card-body">
            <ul class="list-group list-group-flush">
              @foreach ($data as $item)
              <li class="list-group-item d-flex justify-content-between align-items-center">
                <div>
                  <span class="fw-medium">{{ $item->task }}</span>
                  @if($item->is_done)
                  <span class="badge bg-success ms-2">Selesai</span>
                  @else
                  <span class="badge bg-warning text-dark ms-2">Belum</span>
                  @endif
                </div>
                <div class="btn-group">
                  <form action="{{ route('todo.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin hapus task ini?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-outline-danger btn-sm rounded-pill">
                      <i class="bi bi-trash"></i>
                    </button>
                  </form>
                  <button class="btn btn-outline-primary btn-sm rounded-pill ms-2" data-bs-toggle="collapse"
                    data-bs-target="#collapse-{{ $loop->index }}">
                    <i class="bi bi-pencil"></i>
                  </button>
                </div>
              </li>

              <!-- Update Form -->
              <li class="list-group-item collapse" id="collapse-{{ $loop->index }}">
                <form action="{{ url('todo/'.$item->id) }}" method="POST" class="mt-2">
                  @csrf
                  @method('PUT')
                  <div class="input-group mb-2">
                    <input type="text" class="form-control" name="task" value="{{ $item->task }}">
                    <button class="btn btn-outline-primary" type="submit">Update</button>
                  </div>
                  <div class="d-flex gap-3">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="is_done" value="1"
                        {{ $item->is_done ? 'checked' : '' }}>
                      <label class="form-check-label">Selesai</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="is_done" value="0"
                        {{ !$item->is_done ? 'checked' : '' }}>
                      <label class="form-check-label">Belum</label>
                    </div>
                  </div>
                </form>
              </li>
              @endforeach
            </ul>
          </div>
        </div>

      </div>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
