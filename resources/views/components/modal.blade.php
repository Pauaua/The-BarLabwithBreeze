<!-- Modal Bootstrap -->
<div class="modal fade" id="barLabModal" tabindex="-1" aria-labelledby="barLabModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content" style="background: linear-gradient(120deg, #380516 60%, #02110C 100%); color: #fff; border-radius: 1rem; box-shadow: 0 8px 32px rgba(0,0,0,0.15);">
      <div class="modal-body p-5">
        <div class="row align-items-center">
          <div class="col-md-6">
            <h1 class="display-4 mb-3 hero-title">¡Conviértete en un Bartender Profesional!</h1>
            <p class="lead mb-4">En <strong>The Bar Lab</strong> te ofrecemos los mejores cursos y talleres para que desarrolles tus habilidades y te destaques en el mundo de la coctelería.</p>
            <ul class="list-unstyled mb-4">
              <li>🍸 Clases prácticas y teóricas de alto nivel</li>
              <li>👨‍🏫 Instructores certificados y con experiencia internacional</li>
              <li>📜 Certificación reconocida en la industria</li>
              <li>💼 Bolsa de trabajo exclusiva para alumnos</li>
            </ul>
            <a href="#" class="btn hero-btn btn-lg shadow">Inscríbete Ahora</a>
          </div>
          <div class="col-md-6 text-center">
            <img src="{{ asset('assets/bartender7.jpg') }}" alt="Bartender profesional" class="img-fluid rounded shadow-lg" style="max-height: 350px; object-fit: cover;">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Bootstrap 5 JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Bootstrap Icons CDN -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
<style>
  .hero-title {
    font-weight: 800;
    letter-spacing: 1px;
    text-shadow: 2px 2px 8px #00000055;
  }
  .hero-btn {
    background: #02110C;
    color: #e0e0e0;
    border: none;
    font-weight: 700;
    font-size: 1.2rem;
    padding: 0.75rem 2rem;
    border-radius: 2rem;
    box-shadow: 0 4px 16px rgba(0,0,0,0.10);
    transition: background 0.2s, color 0.2s, transform 0.2s;
  }
  .hero-btn:hover {
    background: #02110C;
    color: #fff;
    transform: scale(1.05);
  }
</style>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    var myModal = new bootstrap.Modal(document.getElementById('barLabModal'));
    myModal.show();
  });
</script>